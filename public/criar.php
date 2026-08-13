<?php
require_once '../dao/ProdutoDAO.php';

if ($_POST) {
    $p = new Produto(null, $_POST['nome'], (float)$_POST['preco']);
    $dao = new ProdutoDAO();
    $dao->criar($p);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Produto</title>
</head>
<body>
    <h2>Cadastrar Produto</h2>
    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>
        
        <label>Preço:</label><br>
        <input type="number" step="0.01" name="preco" required><br><br>
        
        <button type="submit">Salvar</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>