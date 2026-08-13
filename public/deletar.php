<?php
require_once '../dao/ProdutoDAO.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $dao = new ProdutoDAO();
    $dao->deletar($id);
}

header('Location: index.php');
exit;