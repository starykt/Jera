<?php
session_start();

if(isset($_POST["cadastrar"])){ 
    include("conexao.php");
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $data = isset($_POST["data"]) ? $_POST["data"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
      // varivel = condicao ? valor verdadeiro : valor falso;


      if($nome != "" && $data != "" && $email != "" && $senha != "") {
        $senha = md5($senha);
        $sql  = "INSERT INTO usuarios(id_usuarios, nome, data_nasc, email, senha) VALUES (null, ? , ?, ?, ?)";
        $stmt= $conexao->prepare($sql);
        $stmt->execute([$nome, $data, $email, $senha]);
        header("Location: /index.php");

      }          

    }


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Cadastro</title>
    </head>
    <body>
        <div class="total-login">
            <div class="direita-login">
                <div class="telinha-login">
                    <h1>CADASTRO</h1>
                    <form method="POST" style="width:100%;">
                    <div class="texto">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome" required>
                    </div>
                    <div class="texto">
                        <label for="data_nasc">Data de nascimento</label>
                        <input type="date" name="data" id="data" placeholder="Data de nascimento" required>
                    </div>
                    <div class="texto">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="E-mail" required>
                    </div>
                    <div class="texto">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Senha" required>

                        <button class="btn-login" value="cadastrar" name="cadastrar">Cadastrar-me</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </body>
</html>