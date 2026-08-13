<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Produto.php';

class ProdutoDAO {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function criar(Produto $p) {
        $sql = "INSERT INTO produtos (nome, preco) VALUES (?, ?)";
        return $this->conn->prepare($sql)->execute([$p->nome, $p->preco]);
    }

    public function listar() {
        return $this->conn->query("SELECT * FROM produtos ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(Produto $p) {
        $sql = "UPDATE produtos SET nome = ?, preco = ? WHERE id = ?";
        return $this->conn->prepare($sql)->execute([$p->nome, $p->preco, $p->id]);
    }

    public function deletar($id) {
        return $this->conn->prepare("DELETE FROM produtos WHERE id = ?")->execute([$id]);
    }
}