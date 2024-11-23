HTML.classList.add('lightTheme')

const loginForm = searchElement('form-login')

const registerForm = searchElement('form-register')
if (registerForm) {
    registerForm.addEventListener('submit', async (event) => {
        event.preventDefault()
        const nome = registerForm.nome.value;
        const email = registerForm.email.value;
        const senha = registerForm.senha.value;
        const confirmarSenha = registerForm.confirmar_senha.value;
        const nascimento = registerForm.data_nascimento.value;
        const telefone = registerForm.telefone.value;
        if (senha !== confirmarSenha) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'As senhas não coincidem!'
            });
            return;
        }
        const link = `${dirbase}php/register_aluno.php`;
        const response = await fetch(link, {
            method: 'POST',
            body: JSON.stringify({ nome, email, senha, nascimento, telefone }),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(res => res.text());

        console.log(response);

        if (response === "success") {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: 'Cadastro realizado com sucesso!'
            }).then(() => {
                registerForm.reset();
            });
        }
        if (response === "missing info") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha todos os campos!'
            });
        }
        if (response === "user exists") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email já cadastrado!'
            });
        }
        if (response === "invalid request") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Requisição inválida!'
            });
        }
    })
}