<?php 
    class Usuario {
        private $pdo;
        public $msgErro = ""; 
        //função para se conectar com o banco....
        public function conectar($nome, $host, $usuario, $senha){
            global $pdo;
            global $msgErro;
            try{
                $pdo = new PDO("mysql:dbname=".$name.";host=".$host,$usuario,$senha);
            }
            catch(PDOException $e){
                $msgErro = $e->getMessage();
            }
        } 
        //função para cadastrar usuario no banco.....
        public function cadastrar($nome,$telefone,$email,$senha){
            global $pdo;
            //verifica se ja existe usuario no banco
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
            $sql->dindValue(":e",$email);
            $sql->execute();
            if($sql->rowCount() > 0){
                return false;
            }else{
                //se não //Cadastrar
                $sql = $pdo->prepare("INSERT INTO usuarios (nome,telefone,email,senha) VALUES (:n,:t,:e,:s)");
                $sql->bindValue(":n",$nome);
                $sql->bindValue(":t",$telefone);
                $sql->bindValue(":e",$email);
                $sql->bindValue(":s",$senha);
                $sql->execute();
                return true;
            }
        }
        //função para verificar usuario cadastrado no banco.....
        public function logar($email,$senha){
            global $pdo;
            //verificar se o email e senha estao cadastrados , se sim entrar no sistema (sessao)
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
            $sql->dindValue(":e",$email);
            $sql->dindValue(":s",$senha);
            $sql->execute();
            if($sql->rowCount() > 0){
                //se sim, entrar no sistema (sessao)
                $dado = $sql->fetch();
                session_start();
                $_SESSION['id_usuario'] = $dado['id_usuario'];
                return true;//logado com sucesso
            }else{
                //se não, nao foi possivel logar
                return false;
            }
        }
    } 
?>