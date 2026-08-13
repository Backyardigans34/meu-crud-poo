PHP
<?php
class Produto {
    public function __construct(
        public ?int $id = null,
        public string $nome = '',
        public float $preco = 0.0
    ) {}
}