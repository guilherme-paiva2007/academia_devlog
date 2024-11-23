<?php
function createLink($destination) {
    $projectFolder = '/academia_devlog/';
    return $projectFolder . $destination;
}

function error() {
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        if ($error === 'usernotfound') {
            echo '<p class="description error center">Usuário não encontrado</p>';
        }
    }
}