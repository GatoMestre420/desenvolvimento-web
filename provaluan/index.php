<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prova2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

// variaveis

$nome = "";
$sobrenome = "";
$idade = "";
$cpf = "";


// error 
$nomeErr = "";
$sobrenomeErr = "";
$idadeErr = "";
$cpfErr = "";

if ( $_SERVER [ "REQUEST_METHOD"] == "POST") {

    //  validando nome 
    if ( empty( $_POST["nome"])) {
        $nomeErr = "Nome é obrigatório" ;
    }else {
        $nome =  $_POST["nome"];
    }

    //   validando sobrenome 
    if ( empty( $_POST["sobrenome"])) {
        $sobrenomeErr = "Sobrenome é obrigatório" ;
    }else {
        $sobrenome =  $_POST["sobrenome"];
    }

    //   validando idade 
     if ( empty( $_POST["idade"])) {
        $idadeErr = "idade é obrigatório" ;
    }else {
        $idade =  $_POST["idade"];
        if ($idade < 1 || $idade > 100){
            $idadeErr = "Se ta loco?";
        }
    }

    //   validando cpf 
     if ( empty( $_POST["cpf"])) {
            $cpfErr = "CPF é obrigatório" ;
    }else {
        $cpf =  $_POST["cpf"];
        if(strlen($cpf) < 11 || strlen($cpf) > 11){
            $cpfErr = "CPF inválido";
        }
         
    }

    // Verifica se não tem erros 
    if ($nomeErr == "" && $sobrenomeErr == "" && $idadeErr == "" && $cpfErr == "") {

        $data = "nome :". $nome. "; Sobrenome: " . $sobrenome. "; Idade: ". $idade. "; CPF: ". $cpf;

        
       if ( minores($data)){
           echo "CADASTRO EFETUADO E SALVO COM SUCESSO";
       } else{
        echo "Ocorreu um ERRO";

       }
        

    } else {

        echo "Cadastro não efetuado";
    }


}

function minores($dados){
    $arquivo = "banco_de_dados.txt";
    $file = fopen($arquivo, "w");
    fwrite($file, $dados);
    fclose($file);
    return true;
}
  
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<!-- nome  -->
    <input type="text" placeholder="NOME" name="nome"><br>
    <span><?php echo $nomeErr ?></span><br>
 <!-- sobrenome -->
    <input type="text" placeholder="SOBRENOME" name="sobrenome"><br>
    <span><?php echo $sobrenomeErr ?></span><br>
    <!-- idade  -->
    <input type="number" placeholder="IDADE" name="idade"><br>
    <span><?php echo $idadeErr ?></span><br>
    <!-- cpf  -->
    <input type="text" placeholder="CPF" name="cpf"><br>
    <span><?php echo $cpfErr ?></span><br>

    <input type="submit" name="submit" value="enviar">

</form>


    
</body>
</html>