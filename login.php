<?php
session_start();
include('conexao.php'); 

if (isset($_SESSION['usuario_id'])) {
    header('Location: index.php'); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        header('Location: index.php'); 
        exit();
    } else {
        $erro = "Email ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

    <nav>
        <h1>Login</h1>
    </nav>

    <div class="form-container">
        <form method="POST" action="login.php">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <br>
            <button type="submit">Entrar</button>
        </form>

        <?php if (isset($erro)) { echo "<p style='color: red;'>$erro</p>"; } ?>
    </div>

    <footer>
        <p>Não tem uma conta? <a href="registro.php">Registrar-se</a></p>
    </footer>
</body>
</html>