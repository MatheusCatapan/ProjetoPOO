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

    // foreach ($humanos as $humano) {
    //     echo "Nome: " . $humano->nome . "\n";
    //     echo "Idade: " . $humano->idade . "\n";
    //     echo "Endereço: " . $humano->endereco . "\n";
    //     echo "Contato: " . $humano->contato . "\n\n";
    // }
    // foreach ($animais as $animal) {
    //     echo "Animal: " . $animal->animal . "\n";
    //     echo "Nome: " . $animal->nome . "\n";
    //     echo "Raça: " . $animal->raca . "\n";
    //     echo "Quantidade de patas: " . $animal->qPatas . "\n";
    //     echo "Cor: " . $animal->cor . "\n";
    //     echo "Peso: " . $animal->peso . "\n";
    //     echo "Tamanho: " . $animal->tamanho . "\n";
    //     echo "Dono: " . $animal->dono . "\n";
    //     echo $animal->falar() . "\n\n";
    // }
    // $funcionario = new Funcionario("Diego", "Balconista");
    // echo "Nome: " . $funcionario->nome . "\n";
    // echo "Função: " . $funcionario->funcao . "\n";
    // echo "Salário: " . $funcionario->salarioBalconista() . "\n\n";    

    // $funcionario = new Funcionario("Ana", "Veterinária");
    // echo "Nome: " . $funcionario->nome . "\n";
    // echo "Função: " . $funcionario->funcao . "\n";      
    // echo "Salário: " . $funcionario->salarioVeterinario() . "\n";


//Interace do usuário:

function realizarLogin($usuario, $senha) {
    $usuarios = file('usuarios.txt', FILE_IGNORE_NEW_LINES);

    foreach ($usuarios as $linha) {
        list($u, $s) = explode(';', $linha);
        if ($u === $usuario && $s === $senha) {
            $dataHora = date('d/m/Y H:i:s');
            $conteudo = "$dataHora $usuario\n";
            file_put_contents('sessao.txt', $conteudo, FILE_APPEND);
            return true;
        }
    }
    return false;
}

function logar($mensagem) {
    $date = date('d/m/Y H:i:s');
    $linha = "[$date] $mensagem";
    file_put_contents('log.txt', $linha . PHP_EOL, FILE_APPEND);
}

function cadastrarUsuario($usuario, $senha) {
    $arquivo = 'usuarios.txt';
    if (file_exists($arquivo)) {
        $usuarios = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    } else {
        $usuarios = [];
    }
    foreach ($usuarios as $linha) {
        list($u, $s) = explode(';', $linha);
        if ($u === $usuario) {
            return false;
        }
    }
    $linhaNova = $usuario . ';' . $senha . "\n";
    file_put_contents($arquivo, $linhaNova, FILE_APPEND);
    return true;
}

function vendaRealizada($valor, $nomedoItem) {
    file_put_contents(
        'log.txt',
        date('Y-m-d H:i:s') . " - Venda: $nomedoItem | Valor: R$ $valor" . PHP_EOL,
        FILE_APPEND
    );
}

function limparTela() {
    system('clear');
}

function pausa() {
    echo "\nPressione ENTER para continuar...";
    fgets(STDIN);
}

function login() {
    limparTela();
    echo "Fazer login";
    echo "Sair";
}

function menu() {
    limparTela();
    echo "///// MENU PRINCIPAL /////";
}

$produtos = [
    new Produto("Ração para cachorro R$50,00" . "\n", 50.00, 2),
    new Produto("Areia para gato R$20,00" . "\n", 20.00, 1),
    new Produto("Shampoo para patos R$150,00" . "\n", 150.00, 1 . "\n")
];

$venda = new Venda();
foreach ($produtos as $produto) {
    $venda->adicionarProduto($produto);
}

// $venda->listarProdutos(); 

do {
    echo "Escolha uma opção:\n";
    echo "1 - Fazer login\n";
    echo "2 - Cadastrar usuário\n";
    echo "3 - Sair\n";
    echo "Opção: ";
    $escolha = trim(fgets(STDIN));

    switch ($escolha) {
        case 1:
            echo "Insira seu usuário: ";
            $usuario = trim(fgets(STDIN));
            echo "Insira sua senha: ";
            $senha = trim(fgets(STDIN));
            if (realizarLogin($usuario, $senha)) {
                echo "Login realizado com sucesso!";
                do {
                    echo "\n### Menu Principal ###\n";
                    echo "1 - Ver catálogo de produtos\n";
                    echo "2 - Informar venda\n";
                    echo "3 - Ver pacietes atuais\n";
                    echo "4 - Sair da conta\n";
                    $menu = trim(fgets(STDIN));
                    switch ($menu) {
                            case 1:
                                limparTela();
                                echo $venda->listarProdutos();
                                pausa();
                                break;
                            case 2:
                                limparTela();
                                echo "Digite o nome do item vendido: ";
                                $item = trim(fgets(STDIN));
                                echo "Digite o valor da venda: ";
                                $valor = trim(fgets(STDIN));
                                if (is_numeric($valor)) {
                                    vendaRealizada($valor, $item);
                                    logar("Venda realizada: $item - R$ $valor");
                                    echo "Venda registrada com sucesso!\n";
                                } else {
                                    echo "Valor inválido! Tente novamente.\n";
                                }
                                pausa();
                                break;
                            case 3:
                                limparTela();
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
                                pausa();
                                break;
                            case 4:
                                break 2;
                            default:
                                echo "Opção inválida! Tente novamente.\n";
                                pausa();
                                break;
                    }
                } while (true);
            } else {
                echo "Usuário não encontrado ou senha incorreta!";
            }
            pausa();
            break;

        case 2:
            echo "Digite o nome do usuário a ser cadastrado: ";
            $usuario = trim(fgets(STDIN));
            echo "Digite a senha: ";
            $senha = trim(fgets(STDIN));
            if (cadastrarUsuario($usuario, $senha)) {
                echo "Usuário cadastrado com sucesso!\n";
            } else {
                echo "Erro: Esse usuário já foi cadastrado!\n";
            }
            pausa();
            break;

        case 3:
            echo "Saindo...\n";
            exit;

        default:
            echo "Opção inválida!\n";
            pausa();
            break;
    }
} while (true);