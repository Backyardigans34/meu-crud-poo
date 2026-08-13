<?php
require_once '../dao/ProdutoDAO.php';

$dao = new ProdutoDAO();
$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

if ($_POST) {
    $p = new Produto($id, $_POST['nome'], (float)$_POST['preco']);
    $dao->atualizar($p);
    header('Location: index.php');
    exit;
}

$produto = $dao->buscarPorId($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>
    <h2>Editar Produto</h2>
    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required><br><br>
        
        <label>Preço:</label><br>
        <input type="number" step="0.01" name="preco" value="<?= $produto['preco'] ?>" required><br><br>
        
        <button type="submit">Atualizar</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>