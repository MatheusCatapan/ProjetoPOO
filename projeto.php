<?php 

    include 'animal.php';
    include 'humano.php';
    include 'funcionario.php';
    include 'vendas.php';

    $humanos = [
        new Humano("Matheus", 21, "Rua das Rosas 9", 42988634181),
        new Humano("Augusto", 19, "Rua das Orquídeas 3", 482372523),
        new Humano("Daniel", 30, "Rua XV", 3299837501),
        new Funcionario("diego", "balconista")
    ];

    $animais = [
        new Animal("gato", "Maia", "SRD", 4, "Cinza", 5, 25, "matheus"),
        new Animal("cachorro", "tigre", "pastor alemao", 4, "marrom", 30, 60, "augusto"),
        new Animal("pato", "donald", "normal", 2, "branco", 1, 50, "daniel"),
    ];

    foreach ($humanos as $humano) {
        echo "Nome: " . $humano->nome . "\n";
        echo "Idade: " . $humano->idade . "\n";
        echo "Endereço: " . $humano->endereco . "\n";
        echo "Contato: " . $humano->contato . "\n\n";
    }
    foreach ($animais as $animal) {
        echo "Animal: " . $animal->animal . "\n";
        echo "Nome: " . $animal->nome . "\n";
        echo "Raça: " . $animal->raca . "\n";
        echo "Quantidade de patas: " . $animal->qPatas . "\n";
        echo "Cor: " . $animal->cor . "\n";
        echo "Peso: " . $animal->peso . "\n";
        echo "Tamanho: " . $animal->tamanho . "\n";
        echo "Dono: " . $animal->dono . "\n";
        echo $animal->falar() . "\n\n";
    }
    $funcionario = new Funcionario("Diego", "Balconista");
    echo "Nome: " . $funcionario->nome . "\n";
    echo "Função: " . $funcionario->funcao . "\n";
    echo "Salário: " . $funcionario->salarioBalconista() . "\n";    
