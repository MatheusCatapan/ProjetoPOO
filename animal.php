<?php

    class Animal {
        public $animal;
        public $nome;
        public $raca;
        public $qPatas;
        public $cor;
        public $peso;
        public $tamanho;
        public $dono;

        public function __construct($animal, $nome, $raca, $qPatas, $cor, $peso, $tamanho, $dono) 
        {
            $this->animal = $animal;
            $this->nome = $nome;
            $this->raca = $raca;
            $this->qPatas = $qPatas;
            $this->cor = $cor;
            $this->peso = $peso;
            $this->tamanho = $tamanho;
            $this->dono = $dono;
        }    
        public function falar() 
        {
            if ($this->animal == "pato") {
                return "quack";
            }elseif ($this->animal == "cachorro") {
                return "au au";
            }elseif ($this->animal == "gato") {
                return "miau";
        }    
        }    
    }