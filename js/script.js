// IMPORTADO DE https://github.com/guilherme-paiva2007/ltools;

// Errors

class OptionError extends Error {
    /**
     * Erro de opções.
     * @param {*} message 
     * @param {*} options 
     */
    constructor(message, options = undefined) {
        typeof options == "object" ? super(message, options) : super(message);
    }

    name = "OptionError";
}

class ContextError extends Error {
    constructor(message, options = undefined) {
        typeof options == "object" ? super(message, options) : super(message);
    }

    name = "ContextError";
}

class LogicalError extends Error {
    constructor(message, options = undefined) {
        typeof options == "object" ? super(message, options) : super(message);
    }

    name = "LogicalError";
}

// Value Types

class ID {
    /**
     * Identificar único.
     * @param {string} type 
     * @param {{
     *      description: string,
     *      symbol: symbol
     * }} configs 
     */
    constructor(type, configs = {}, ...params) {
        if (!ID.#types.includes(type)) throw new OptionError("tipo de ID inexistente.");
        if (configs !== undefined) {
            if (typeof configs !== "object" || configs === null) throw new TypeError("configurações precisam estar em um objeto");
            typeof configs.description == "string" ? this.#description = configs.description : this.#description = "";
            typeof configs.symbol == "symbol" ? this.#symbol = configs.symbol : this.#symbol = Symbol();
        } else {
            this.#symbol = Symbol();
            this.#description = "";
        }

        this.#id = ID[type](...params)
    }

    #id;
    #symbol;
    #description;

    get id() {
        return this.#id;
    }

    get symbol() {
        return this.#symbol;
    }

    get description() {
        return this.#description;
    }

    static #types = [
        this.date.name
    ];

    /**
     * @param {Date} date 
     * @returns {string}
     */
    static date(date) {
        if (!(date instanceof Date)) date = new Date(date);
        if (isNaN(date.valueOf())) date = new Date();

        let fillNLength = (value, length = 2, fill = '0') => {
            return value.toString().padStart(length, fill).slice(0, length);
        }

        return [
            [
                fillNLength(date.getFullYear(), 4),
                fillNLength(date.getMonth() + 1),
                fillNLength(date.getDate())
            ],
            [
                fillNLength(date.getHours()),
                fillNLength(date.getMinutes()),
                fillNLength(date.getSeconds()),
                fillNLength(date.getMilliseconds(), 3)
            ]
        ].map(subarr => subarr.join('.')).join('-')
    }
}

// Collections

class TypedMap extends Map {
    /**
     * Cria um Map limitado a tipo específico.
     * @param {Function} type 
     * @param {Function|undefined} keytype 
     * @param {boolean} includeAllInstances 
     */
    constructor(type, keytype = undefined, includeAllInstances = false) {
        super();
        if (typeof type !== "function") throw new TypeError("type precisa ser uma função construtora");
        this.#type = type;
        if (typeof keytype !== "function" && keytype !== undefined) throw new TypeError("keytype precisa ser uma função construtora");
        this.#keytype = keytype;
        this.#includeAllInstances = Boolean(includeAllInstances);
    }

    /** @type {Function} */
    #type;
    #keytype = undefined;
    #includeAllInstances = false;

    /**
     * Verifica se um valor é válido para ser inserido na coleção.
     * @param {any} value 
     * @param {"key"|"value"} type 
     * @returns {boolean}
     */
    checkType(value, type) {
        if (!["key", "value"].includes(type)) type = "value";
        if (type == "key" && this.#keytype == undefined) return true;
        if (value == undefined || value == null) return false;
        switch (type) {
            case "value":
                if (this.#includeAllInstances) {
                    if (!(value instanceof this.#type) && value.constructor !== this.#type) return false;
                } else {
                    if (value.constructor !== this.#type) return false;
                }
                break;
            case "key":
                if (this.#includeAllInstances) {
                    if (!(value instanceof this.#keytype) && value.constructor !== this.#keytype) return false;
                } else {
                    if (value.constructor !== this.#keytype) return false;
                }
                break;
        }
        return true;
    }

    set(key, value) {
        if (!this.checkType(key, "key")) throw new TypeError(`chave inválida para coleção Map de tipo ${this.#type.name}`);
        if (!this.checkType(value, "value")) throw new TypeError(`valor inválido para coleção Map de tipo ${this.#type.name}`);

        super.set(key, value);
    }
}

class TypedSet extends Set {
    /**
     * Cria um Set limitado a tipo específico.
     * @param {Function} type 
     */
    constructor(type, includeAllInstances = false) {
        super();
        if (typeof type !== "function") throw new TypeError("type precisa ser uma função construtora");
        this.#type = type;
        this.#includeAllInstances = Boolean(includeAllInstances);
    }

    /** @type {Function} */
    #type;
    #includeAllInstances = false;
    
    checkType(value) {
        if (value == undefined || value == null) return false;
        if (this.#includeAllInstances) {
            if (!(value instanceof this.#type)) return false;
        } else {
            if (value.constructor !== this.#type) return false;
        }
        return true;
    }

    add(value) {
        if (!this.checkType(value)) throw new TypeError(`valor inválido para coleção Set de tipo ${this.#type.name}`);

        super.add(value);
    }
}

// Searchs

/**
 * Procura por um elemento.
 * @param {string} target Alvo de busca.
 * @param {"id"|"class"|"tag"|"name"|"query"|"queryAll"} method Meio de busca.
 * @returns {HTMLElement|HTMLCollection|NodeList|null}
 * @throws {TypeError} Caso o alvo não seja uma string.
 * @throws {OptionError} Caso selecione métodos inválidos.
 */
function searchElement(target, method = 'id') {
    if (typeof window == "undefined") throw new ContextError("não é possível utilizar este método fora de um ambiente navegador");
    target = String(target);
    if (!['id', 'class', 'tag', 'name', 'query', 'queryAll'].includes(method)) throw new OptionError("method precisa ser \"id\", \"class\", \"tag\", \"name\", \"query\" ou \"queryAll\"");

    switch (method) {
        case "id":
            return document.getElementById(target);
        case "class":
            return document.getElementsByClassName(target);
        case "tag":
            return document.getElementsByTagName(target);
        case "name":
            return document.getElementsByName(target);
        case "query":
            return document.querySelector(target);
        case "queryAll":
            return document.querySelectorAll(target);
    }
}

class CatchProperty {
    static search(type, obj, property) {
        if (!this.#searchTypes.includes(type)) throw new OptionError("tipo de pesquisa inválida");
        if (typeof obj !== "object") throw new TypeError("impossível pesquisar fora de objeto");
        if (typeof property !== "string" && typeof property !== "symbol") throw new TypeError("nome de propriedade inválida");

        return Object.getOwnPropertyDescriptor(obj, property)[type];
    }

    static #searchTypes = [ "get", "set", "value", "writable", "enumerable", "configurable" ]
}

// Storage Management

if (typeof module !== "undefined") {
    const { TypedMap, OptionError } = require( "./script" );
}

class WebStorageManager {
    constructor(prefix, storage) {
        if (!String.testValidConversion(prefix)) throw new TypeError("prefixo com valor inválido para conversão em string");
        prefix = String(prefix);
        if (storage == "session") storage = window.sessionStorage;
        if (storage == "local") storage = window.localStorage;

        if (!prefix.length.isBetween(1, 50, true)) throw new RangeError("prefixo de tamanho inválido (entre 1 e 50)");
        if (!(storage instanceof Storage)) throw new TypeError("armazenamento não encontrado");

        this.#storage = storage;
        this.#prefix = prefix;
    }

    #prefix;
    #storage;
    #values = new TypedMap(WebStorageManager.#Data, String);
    #data_types = new TypedMap(String, String);

    get prefix() {
        return this.#prefix;
    }

    get storage() {
        return this.#storage;
    }

    key(key) {
        if (!String.testValidConversion(key)) throw new TypeError("chave inválida para conversão em string");
        return `${this.prefix}:${key}`;
    }

    unkey(key) {
        if (!String.testValidConversion(key)) throw new TypeError("chave inválida para conversão em string");
        key = String(key);
        let regexp = new RegExp(`${this.#prefix}:.+`);
        if (regexp.test(key)) {
            return key.slice((this.#prefix + ":").length);
        } else {
            return undefined;
        }
    }

    static #illegal_values = ["storage_data_types"];

    static #Data = class WebStorageManagerData {
        /**
         * 
         * @param {string} key
         * @param {any} value
         * @param {"string"|"number"|"boolean"|"json"|"raw"} type
         */
        constructor(key, value, type) {
            if (!String.testValidConversion(key)) throw new TypeError("chave inválida para conversão em string");
            key = String(key);
            const DataConstructor = WebStorageManager.#Data
            if (!DataConstructor.#dataTypes.includes(type)) throw new TypeError(`tipo de valor inválido (${DataConstructor.#dataTypes.join(', ')})`);

            let unmatchError = (type) => new TypeError(`valor inválido para ${type}`);

            this.set(value, type);

            this.#key = key;
        }

        #key;
        #value;
        #rawValue;
        #type;

        get key() {
            return this.#key;
        }

        get value() {
            return this.#value;
        }

        get rawValue() {
            return this.#rawValue;
        }

        set value(newValue) {
            this.set(newValue, this.#type);
        }

        get type() {
            return this.#type;
        }

        set(value, type) {
            switch (type) {
                case "boolean":
                    if (typeof value !== "boolean") throw unmatchError(type);
                    break;
                case "json":
                    if (typeof value !== "object" || value === null) throw unmatchError(type);
                    break;
                case "number":
                    if (typeof value !== "number") throw unmatchError(type);
                    break;
                case "string":
                    if (typeof value !== "string") throw unmatchError(type);
                    break;
            }

            if (type === "raw") {
                this.#value = String(value);
                this.#rawValue = String(value);
            } else {
                this.#value = value;
                this.#rawValue = JSON.stringify(value)
            }

            this.#type = type;
        }

        static #dataTypes = [ "string", "number", "boolean", "json", "raw" ];
    }

    get #dataTypesObject() {
        return JSON.stringify(Object.fromEntries(this.#data_types.entries()));
    }

    set(key, value, type = "raw") {
        if (WebStorageManager.#illegal_values.includes(key)) throw new TypeError("chave ilegal");
        if (!String.testValidConversion(key)) throw new TypeError("chave inválida para conversão em string");
        key = String(key);

        if (this.#values.has(key)) {
            const data = this.#values.get(key);
            data.set(value, type);
        } else {
            this.#values.set(key, new WebStorageManager.#Data(key, value, type));
        }

        const data = this.#values.get(key);
        let prefixKey = this.key(data.key);
        this.#storage.setItem(prefixKey, data.rawValue);
        this.#data_types.set(key, data.type);
        this.#storage.setItem(this.key('storage_data_types'), this.#dataTypesObject);
    }

    get(key) {
        if (this.#values.has(key)) {
            return this.#values.get(key).value;
        } else {
            return undefined;
        }
    }

    remove(key) {
        if (this.#values.has(key)) {
            this.#values.delete(key);
            this.#data_types.delete(key);
            let prefixKey = this.key(key);
            this.#storage.removeItem(prefixKey);
            this.#storage.setItem(this.key('storage_data_types'), this.#dataTypesObject);
        }
    }

    clear() {
        [...this.#values.keys()].forEach(key => {
            this.remove(key);
        });
    }

    *dataObjects() {
        for (const value of this.#values.values()) {
            yield {
                key: value.key,
                value: value.value,
                rawValue: value.rawValue,
                type: value.type
            };
        }
    }

    *values() {
        for (const value of this.#values.values()) {
            yield value.value;
        }
    }

    *keys() {
        for (const key of this.#values.keys()) {
            yield key;
        }
    }

    *entries(dataObjects = false) {
        dataObjects = Boolean(dataObjects);
        for (const [key, value] of this.#values.entries()) {
            if (dataObjects) {
                yield [
                    key,
                    {
                        key: value.key,
                        value: value.value,
                        rawValue: value.rawValue,
                        type: value.type
                    }
                ];
            } else {
                yield [
                    key,
                    value.value
                ];
            }
        }
    }

    *[Symbol.iterator]() {
        yield* this.entries(false);
    }

    #loaded = false;

    load() {
        if (this.#loaded) return;
        this.#loaded = true;

        let types = JSON.parse(this.#storage.getItem(this.key('storage_data_types')));
        if (!types) types = {};
        
        for (let i = 0; i < this.#storage.length; i++) {
            const key = this.#storage.key(i);
            const value = this.#storage.getItem(key);
            
            const unkey = this.unkey(key);
            const type = types[unkey];
            if (unkey) {
                if (WebStorageManager.#illegal_values.includes(unkey)) continue;
                if (type == undefined || type == "raw") {
                    this.set(unkey, value, type);
                } else {
                    this.set(unkey, JSON.parse(value), type);
                }
            }
        }
    }
}

// Visual Control

class PageTheme {}

// Interactive Elements

class DynamicInput {
    constructor(input, events = {}) {
        if (!(input instanceof HTMLElement)) throw new TypeError("é necessário utilizar um elemento HTML");
        if (typeof events !== "object" || events === null) throw new TypeError("eventos precisam estar armazenados num objeto <event, callback>");
        this.#input = input;

        DynamicInput.#validEvents.forEach(event => {
            if (events[event] == undefined) return;
            const eventCallback = events[event];
            if (typeof eventCallback !== "function") throw new TypeError("um evento precisa ser uma função");
            this.#events.set(event, eventCallback);
            this.#input.addEventListener(event, eventCallback);
        });
    }

    #input;
    #events = new TypedMap(Function, String);
    
    static #validEvents = [ "input", "change", "focus", "blur" ];
}

class DynamicSearch {
    constructor(searchLink, join = "?") {
        if (!String.testValidConversion(searchLink)) throw new TypeError("URL de pesquisa inválido para conversão em string");
        searchLink = String(searchLink);

        if (join !== "?" || join !== "&") throw new TypeError("junção pode ser apenas ? e &");

        this.#join = join;
        this.#link = searchLink;
    }

    #link;
    #join = "?";

    link(search = "") {
        if (!String.testValidConversion(search)) throw new TypeError("pesquisa inválida para conversão em string");
        search = encodeURI(String(search));

        return `${this.#link}${this.#join}search=${search}`;
    }

    async search(search, callback = (search) => {}) { {}
        const link = this.link(search);
        if (typeof callback !== "function") throw new TypeError("callback precisa ser uma função");
        
        search = await fetch(link).then(resp => resp.json());

        callback(search);
        return search;
    }
}