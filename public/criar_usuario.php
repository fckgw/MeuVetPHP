<?php
// Use isto apenas uma vez para criar seu usuário inicial
$senha_texto = 'BDSoft@1020';
$senha_hash = password_hash($senha_texto, PASSWORD_DEFAULT);

echo "Use este hash no seu comando SQL: " . $senha_hash;

// Exemplo de SQL para inserir (copie o hash gerado):
//INSERT INTO usuarios (nome, email, senha) VALUES ('Administrador', 'admin@email.com', 'COLE_O_HASH_AQUI');
?>