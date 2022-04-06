<?php
session_start();
require "./assets/config/conect.php";

if($_SESSION['token'] == false ){
    $_SESSION['logar']="faça login para continuar o acesso!";
    header("Location:./assets/pages/login.php");
    exit;
}


$cab=filter_input(INPUT_POST,'cabecalho');
$info=filter_input(INPUT_POST,'infor');
$img= md5(time());


if($cab && $info && $_FILES){

    


    $sql=$pdo->prepare("INSERT INTO noticias (cabecalho, informacoes, img) VALUES (:cabecalho, :infor, :img)");
    $sql->bindValue(':cabecalho',$cab);
    $sql->bindValue(':infor',$info);
    $sql->bindValue(':img',$img);
    $sql->execute();

    if($_FILES ){
        
        move_uploaded_file($_FILES['img']['tmp_name'],"./assets/images/".$img);

    }else{
        $_SESSION['aviso']= "algo de errado";
        header("Location:./assets/pages/noticias.php");
    }

}

?>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Notícias</title>
</head>

<div class="corpo">
    <div class="cabeçalho">
        <h1>PRINCIPAL</h1>

        <header>
            <div class="cab">
                NOTICIAS_DEV
            </div>
            <div class="pesq">
                <a href="assets/pages/home.php">HOME</a>
                <a href="assets/pages/noticias.php">CADASTRAR</a>
                <input type="search" name="pesqui" id="" placeholder="Pesquisar" autofocus>
            </div>
            <a class="menu" href="assets/pages/login.php">
                <div class="menu-int">
                    <div class="back-1"></div>
                    <div class="back"></div>
                    <div class="back"></div>
                    <div class="back-1"></div>
                </div>

            </a>
        </header>
    </div>
    
    <div class="esq_nav">
        <div class="esquer-nav">
            <div class="infor">
                <a href="#">aqui outras postagens</a>

                
            </div>

        </div>
    </div>


<?php

$noticia=[];
$sql=$pdo->query("SELECT * FROM noticias ");

if($sql){
    $noticia=$sql->fetchAll(PDO :: FETCH_ASSOC);

    
}


?>


    <div class="meio">
        <div class="nav">
            <nav>
                <div >
                    <h3></h3>

                    <div >
                        <p></p>
                    </div>
                        
                    <div >
                        <p></p>
                    </div>
                </div>
                <?php foreach($noticia as $chave):?>

                    <div class="not1" >
                        <h3>
                            <?=$chave['cabecalho'];?>
                        </h3>
                        <div class="img">
                            <?php
                            echo "<img src='assets/images/".$chave['img']."'/>"; 
                            ?> 

                        </div>
                        <div class="inf">
                            <p><?=$chave['informacoes'];?></p>
                        </div>
                    </div>
                <?php endforeach;?>
               
            </nav>
        </div>


    </div>

</div>
