<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'conexao.php';

    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if (!empty($email) && !empty($senha)) {
        
        $sql = "SELECT id, nome, senha FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            
            $usuario = $resultado->fetch_assoc();

            if (password_verify($senha, $usuario['senha'])) {
                
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                
                header("Location: dashboard.php");
                exit; 
            } else {
                $mensagem = "<div class='alert alert-danger p-2 text-center mb-4'>Senha incorreta.</div>";
            }
        } else {
            $mensagem = "<div class='alert alert-danger p-2 text-center mb-4'>E-mail não encontrado.</div>";
        }
        $stmt->close();
    } else {
        $mensagem = "<div class='alert alert-warning p-2 text-center mb-4'>Preencha todos os campos.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Grid Start Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { 
            background-color: #1a1a1a; 
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../Frontend/imagens/box.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
        .card { background-color: rgba(255, 255, 255, 0.95); }
        .bg-grid-red { background-color: #cc0000; }
        .btn-grid-red { background-color: #cc0000; color: white; border: none; }
        .btn-grid-red:hover { background-color: #990000; color: white; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-6 col-lg-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-dark text-white text-center py-3">
                        <h4 class="mb-0 fw-bold"><i class="fas fa-sign-in-alt text-danger me-2"></i>Acessar Conta</h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <?php if(isset($mensagem)) echo $mensagem; ?>

                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold small">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="exemplo@email.com">
                            </div>
                            <div class="mb-4">
                                <label for="senha" class="form-label fw-bold small">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" required placeholder="Sua senha secreta">
                            </div>
                            <button type="submit" class="btn btn-grid-red w-100 fw-bold py-2">Entrar no Paddock</button>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3 border-0" style="background-color: transparent;">
                        <p class="mb-0 small">Ainda não tem conta? <a href="cadastro.php" class="text-danger fw-bold text-decoration-none">Cadastre-se</a></p>
                        <p class="mt-2 mb-0"><a href="../frontend/index.html" class="text-secondary small text-decoration-none"><i class="fas fa-arrow-left"></i> Voltar para a loja</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>