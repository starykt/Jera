<?php
session_start();

if (isset($_SESSION["id_usuarios"])) {
    header("Location: /htdocs/filmes.php");
} // Verifica se foi feito login


if(isset($_POST)){ 
    include("conexao.php");
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
      // varivel = condicao ? valor verdadeiro : valor falso;

    if($email != "" && $senha != "") {
        $senha = md5($senha);

        // Prepara o SELECT
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email=? AND senha=?"); // "=?" para 
                                                                                // evitar que manipulem senha.
        $stmt->execute([$email, $senha]);
        $user = $stmt->fetch();
        // fetch = Buscar

        if (isset($user["id_usuarios"])){
            $_SESSION["id_usuarios"] = $user["id_usuarios"];
            $_SESSION["nome"] = $user["nome"];
            echo "OK";
            header("Location: /htdocs/filmes.php");
        } else {
            echo "Login ou senha incorretos.";
        } 
        
        
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
        <script defer scr="script.js"></script>
        <title>Login</title>
    </head>
    <body>
        <div class="total-login">
            <div class="esquerda-login">
                <h1>Seja bem-vindo de volta &lt;3 </h1>
                <img src="LayingDoodle.png" class="esquerda-imagem" alt = "Cliente">
            </div>
            <div class="direita-login">
          
                <div class="telinha-login">
                    <h1>LOGIN</h1>
                    <form method="POST" style="width:100%;">
                        <div class="texto">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" placeholder="E-mail" required>
                        </div>
                        <div class="texto">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" placeholder="Senha" required>
                        </div>
                        <input id="botao" type="submit" class="btn-login" value="Login">
                    </form>
                  
                    <h4>Não possui login?<a href="cadastro.php"> Cadastre-se aqui.</a></h4>
                </div>
            </div>
        </div>


    </body>
</html>
