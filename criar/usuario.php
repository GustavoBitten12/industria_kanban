<?php
require_once '../includes/config.php';

$sucesso = '';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    
    
    if (empty($nome) || empty($email)) {
        $erro = 'Todos os campos são obrigatórios!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = 'E-mail inválido!';
    } else {
        try {
            
            $sql_verifica = "SELECT id FROM usuarios WHERE email = :email";
            $stmt_verifica = $pdo->prepare($sql_verifica);
            $stmt_verifica->bindParam(':email', $email);
            $stmt_verifica->execute();
            
            if ($stmt_verifica->fetch()) {
                $erro = 'Este e-mail já está cadastrado!';
            } else {
                
                $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                
                $sucesso = 'Cadastro concluído com sucesso!';
                $_POST = []; 
            }
        } catch (PDOException $e) {
            $erro = 'Erro ao cadastrar usuário: ' . $e->getMessage();
        }
    }
}

require_once '../includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="bi bi-person-plus"></i> Cadastro de Usuário</h4>
            </div>
            <div class="card-body">
                <?php if ($sucesso): ?>
                    <div class="alert alert-success"><?= $sucesso ?></div>
                <?php endif; ?>
                
                <?php if ($erro): ?>
                    <div class="alert alert-danger"><?= $erro ?></div>
                <?php endif; ?>
                
                <form method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo *</label>
                        <input type="text" class="form-control" id="nome" name="nome" 
                               value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail *</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                        <div class="form-text">Digite um e-mail válido.</div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Cadastrar Usuário
                    </button>
                    <a href="../index.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>