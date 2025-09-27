<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <Title> Meu VET - desenvolvimento BDSOFT </Title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MeuVET</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="login-container">
        
        <img src="images/MeuVET-Logo.png" alt="Logo MeuVET" class="logo">

        <h2>Acesso ao Sistema</h2>

        <?php
        if (isset($_GET['erro'])) {
            echo '<p class="error-message">' . htmlspecialchars($_GET['erro']) . '</p>';
        }
        ?>

        <form action="auth" method="POST">
            <div class="input-group">
                <label for="email">Email</label>
                <!-- A MÁGICA ACONTECE AQUI com o "autofocus" -->
                <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required autofocus>
            </div>
            
            <div class="input-group">
                <label for="senha">Senha</label>
                <div class="password-wrapper">
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                    <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
                </div>
            </div>

            <button type="submit">Entrar</button>
        </form>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#senha');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>