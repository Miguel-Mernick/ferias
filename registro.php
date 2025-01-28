<?php
session_start();
include('conexao.php');  // Incluindo a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificando se o email já existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $erro = "Email já está em uso. Tente outro.";
    } else {
        // Criptografando a senha com bcrypt
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Inserindo o novo usuário no banco
        $sql = "INSERT INTO usuarios (email, senha) VALUES (:email, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha_hash);

        if ($stmt->execute()) {
            // Registro bem-sucedido, fazendo login automático
            $_SESSION['usuario_id'] = $pdo->lastInsertId();  // Armazena o ID do novo usuário
            header('Location: index.php');  // Redireciona para a página principal
            exit();
        } else {
            $erro = "Erro ao registrar o usuário.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registro</title>
</head>
<body>
    <nav>
        <h1>Registro</h1>
    </nav>

    <div class="form-container">
        <form method="POST" action="registro.php">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <br>
            <button type="submit">Registrar</button>
        </form>

        <?php if (isset($erro)) { echo "<p style='color: red;'>$erro</p>"; } ?>
    </div>

    <footer>
        <p>Já tem uma conta? <a href="login.php">Login</a></p>
    </footer>
</body>
</html>