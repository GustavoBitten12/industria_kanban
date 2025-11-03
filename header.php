<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Kanban - Indústria Alimentícia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .kanban-column {
            min-height: 600px;
            border-radius: 10px;
            padding: 15px;
        }
        .a-fazer { background-color: #e3f2fd; }
        .fazendo { background-color: #fff3e0; }
        .pronto { background-color: #e8f5e8; }
        .tarefa-card {
            margin-bottom: 15px;
            border-left: 4px solid;
        }
        .prioridade-baixa { border-left-color: #28a745; }
        .prioridade-media { border-left-color: #ffc107; }
        .prioridade-alta { border-left-color: #dc3545; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <i class="bi bi-kanban"></i> Sistema Kanban
            </a>
            <div class="navbar-nav">
                <a class="nav-link" href="../usuarios/criar.php">
                    <i class="bi bi-person-plus"></i> Cadastrar Usuário
                </a>
                <a class="nav-link" href="../tarefas/criar.php">
                    <i class="bi bi-plus-circle"></i> Nova Tarefa
                </a>
                <a class="nav-link" href="../tarefas/gerenciar.php">
                    <i class="bi bi-columns-gap"></i> Gerenciar Tarefas
                </a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">