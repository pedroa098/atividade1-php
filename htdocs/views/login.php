<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script type="text/javascript" src="../public/javascript/script.js"></script>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form action="../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposLogin(event);">
            <label for="email">E-mail</label>
            <br>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="senha">Senha</label>
            <br>
            <input type="password" name="senha" id="senha" required>
            <br>
            <br>
            <input type="hidden" name="rota" id="rota" value="entrar">
            <input type="submit" value="Entrar">
        </form>
        <br>
        </main>
</body>
</html>