<?php 

    require_once 'humano.php';

    class Funcionario extends Humano {
        public $nome;
        public $funcao;
        
        function __construct($nome, $funcao)
        {
            $this->nome = $nome;
            $this->funcao = $funcao;
        }

        public function salarioBalconista()
        {
            return 1719.62;
        }
        public function salarioVeterinario()
        {
            return 4000.00;
        }
        public function salarioVendedor()
        {
            return 2300.00;
        }
    }