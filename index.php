<?php
include_once "index.html";
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "cadastro_funcionarios";
$conn = new mysqli($host, $user, $pass, $dbname){
    if ($conn->connect_error){
        die("Erro na conexao :" . $conn->connect_error);
    } else{
        echo "Conexão estabelecida com sucesso:";
    }

    function limpar_dados($dados){
        return htmlspecialchars(trim($dados);)

    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = limpar_dados($_POST["nome"]);
        $cpf = limpar_dados($_POST["cpf"];)
        $rg = limpar_dados($_POST["rg"]);
        $email = limpar_dados($_POST["email"]);
        $telefone = limpar_dados($_POST["telefone"]);
        $cidade = limpar_dados($_POST["cidade"]);
        $data_nascimento = limpar_dados($_POST["data_nascimento"]);
        $bairro = limpar_dados($POST["bairro"]);
        $cep = limpar_dados($_POST['cep']);
        $rua = limpar_dados($POST["rua"]);
        $numero = limpar_dados($_POST["numero"]);
        $vendedor = isset($_POST["vendedor"]) ? 1 : 0;

        $query_funcionarios = "INSERT INTO funcionarios (nome,rg, cpf, email, telefone,
        cidade, data_nascimento, bairro, cep, rua, numero, vendedor) 
        VALUES ('$nome', '$rg', '$cpf', '$email', '$telefone', '$cidade', '$data_nascimento', '$bairro', '$cep', '$rua', '$numero', '$vendedor' )";

        if ($mysqli->query($query_funcionario) == true){
            if($vendedor){
                $id_funcionario = $mysqli->insert_id;
                $comissao_percentual = 10.00;
                $query_comissao = "INSERT INTO comissoes (id_funcionario, comissao_percentual)
                VALUES ('$id_funcionario', '$comissao_percentual')";
                $mysqli->query($query_comissao);
            }
        } else {
            echo "Erro ao cadastrar funcionario: " . $mysqli->error;
        }
    }

}
$mysqli->close();