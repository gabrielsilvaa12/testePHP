<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'conexao.php';
    
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if (!empty($nome) && !empty($email) && !empty($senha)) {

        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sss", $nome, $email, $senha_criptografada);

        if ($stmt->execute()) {
            $mensagem = "<div class='alert alert-success p-2 text-center mb-4'>Cadastro realizado com sucesso!<br> <a href='login.php' class='alert-link'>Clique aqui para fazer login</a>.</div>";
        } else {
            $mensagem = "<div class='alert alert-danger p-2 text-center mb-4'>Erro: O e-mail já pode estar em uso.</div>";
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
    <title>Cadastro - Grid Start Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* A MÁGICA DO FUNDO ACONTECE AQUI */
        body { 
            /* Cor de fundo caso a imagem demore a carregar */
            background-color: #1a1a1a; 
            
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../Frontend/imagens/vettel.jpg');

            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
        
        /* Ajustes do Card e Botão */
        .card { background-color: rgba(255, 255, 255, 0.95); } /* Card levemente transparente */
        .bg-grid-red { background-color: #cc0000; }
        .btn-grid-red { background-color: #cc0000; color: white; border: none; }
        .btn-grid-red:hover { background-color: #990000; color: white; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-6 col-lg-4">
                <div class="card shadow border-0">
                    <div class="card-header bg-dark text-white text-center py-3">
                        <h4 class="mb-0 fw-bold"><i class="fas fa-user-plus text-danger me-2"></i>Criar Conta</h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <?php if(isset($mensagem)) echo $mensagem; ?>

                        <form action="cadastro.php" method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label fw-bold small">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" required placeholder="Digite seu nome">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold small">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="exemplo@email.com">
                            </div>
                            <div class="mb-4">
                                <label for="senha" class="form-label fw-bold small">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" required placeholder="Crie uma senha forte">
                            </div>
                            <button type="submit" class="btn btn-grid-red w-100 fw-bold py-2">Cadastrar</button>
                        </form>
                    </div>
                    <div class="card-footer text-center bg-white py-3 border-0">
                        <p class="mb-0 small">Já tem uma conta? <a href="login.php" class="text-danger fw-bold text-decoration-none">Faça Login</a></p>
                        <p class="mt-2 mb-0"><a href="../frontend/index.html" class="text-secondary small text-decoration-none"><i class="fas fa-arrow-left"></i> Voltar para a loja</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>