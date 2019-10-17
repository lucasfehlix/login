<?php   
    require_once 'classes/usuarios.php'
    $u = new Usuario;
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Projeto Login</title>
        <link rel="stylesheet" href="css/estilo.css">
        <link href="img/construcao.jpg" type="image/ico" rel="shortcut icon">
    </head>
    <body>
        <div id="corpo-form-cad">
            <h1>CADASTRE-SE</h1>
            <form method="POST">
                <input type="text"     name="nome"      placeholder="Nome Completo"   maxlength=30>
                <input type="text"     name="telefone"  placeholder="Telefone"        maxlength=30> 
                <input type="email"    name="email"     placeholder="Usuário"         maxlength=40>
                <input type="password" name="senha"     placeholder="Senha"           maxlength=15>
                <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength=15>
                <input type="submit"   value="CADASTRAR">
            </form>
        </div>
        <?php
            //verificar se clicou no botão
            isset($_POST['nome']){
                $nome = addcslashes($_POST['nome']);
                $telefone = addcslashes($_POST['telefone']);
                $email = addcslashes($_POST['email']);
                $senha = addcslashes($_POST['senha']);
                $confirmarSenha = addcslashes($_POST['confSenha']);
                //verificar se ta preenchido
                if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {
                    $u->conectar("login","http://projeto.php/login/","root","");
                }else{
                    echo "Preencha todos os campos!";
                } 
            }
        ?>
    </body>
</html>