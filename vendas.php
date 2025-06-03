<?php 

    class Produto {
        public $nome;
        public $preco;
        public $quantidade;

        public function __construct($nome, $preco, $quantidade) {
            $this->nome = $nome;
            $this->preco = $preco;
            $this->quantidade = $quantidade;
        }
    }

    class Venda {
        public $produtos = [];
        public $comprador;

        public function adicionarProduto(Produto $produto) {
            $this->produtos[] = $produto;
        }
    
        public function listarProdutos(){
            foreach ($this->produtos as $produto) {
            echo "Produto: ($produto->nome}";
            } 
    }

        public function total($comprador) {
            $soma = 0;
            foreach ($this->produtos as $produto) {
                $soma += $produto->preco * $produto->quantidade;
            }
            file_put_contents('vendaslog.txt', $soma . $comprador . PHP_EOL, FILE_APPEND);
            return $soma;
        }
    }

    $produtos = [
        new Produto("Ração para cachorro", 50.00, 2),
        new Produto("Areia para gato", 20.00, 1),
        new Produto("Shampoo para patos", 150.00, 1)
    ];

    // $venda = new Venda();
    // $venda->adicionarProduto($produtos[1]);   
    // $comprador = "Matheus";    
    // $total = $venda->total($comprador);
    // echo "Total da venda: R$" . $total . " Comprador: $comprador" . "\n";
    // $venda->listarProdutos();