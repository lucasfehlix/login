<?php   
    require_once 'classes/usuarios.php';
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
        <div id="corpo-form">
            <h1>ENTRAR</h1>
            <form method="POST">
                <input type="email"    name="email" placeholder="Usuário"> 
                <input type="password" name="senha" placeholder="Senha">
                <input type="submit"   value="ACESSAR">
                <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se!</strong></a>
            </form>
        </div>
        <?php
            if(isset($_POST['email'])){
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                if (!empty($email) && !empty($senha)) {
                    if($u->msgErro==""){
                        $u->conectar("php","localhost","root","");
                        if($u->logar($email,$senha)){
                            header("location: areaPrivada.php");                            
                        }else{
                            ?>
                                <div class="msg-erro">
                                    Erro: Email e/ou senha estão incorretos!
                                </div> 
                            <?php
                        }
                    }else{
                        ?>
                            <div class="msg-erro">
                                <?php echo "Erro: ".$u->msgErro; ?>
                            </div> 
                        <?php
                    }
                }else{
                    ?>
                        <div class="msg-erro">
                            Preencha todos os campos!
                        </div> 
                    <?php
                }
            }
        ?>
    </body>
</html>