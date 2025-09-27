<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'feli0499_root'); // Substitua pelo seu usuário do MySQL
define('DB_PASS', 'Fckgw!151289');   // Substitua pela sua senha
define('DB_NAME', 'feli0499_meuvet');   // Substitua pelo nome do seu banco de dados

function conectar() {
    $conexao = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    return $conexao;
}
?>