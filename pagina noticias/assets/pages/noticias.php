<?php 
session_start();
?>
<head>
    <link rel="stylesheet" href="../css/not_style.css">
</head>

<body>

    <div class="cabeçalho">
        <h1>NOTÍCIAS</h1>

        <header>
            <div class="cab">
                NOTICIAS_DEV
            </div>
            <div class="pesq">
                <a href="assets/pages/home.html">HOME</a>
                <a href="assets/pages/noticias.html">NOTICIAS</a>
                <input type="search" name="pesqui" id="" placeholder="Pesquisar" autofocus>
            </div>
            <div class="menu">
                <div class="menu-int">
                    <div class="back-1"></div>
                    <div class="back"></div>
                    <div class="back"></div>
                    <div class="back-1"></div>
                </div>

            </div>
        </header>
    </div>
    

    <div class="noti">
        <form action="../../index.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id"  /> 

            <input type="file" name="img" id="img">
            <br>
            <p>
                <?
                    if($_SESSION['aviso']){
                
                        echo $_SESSION['aviso'];
                
                    }    
                
                ?>
            </p>
            cabeçalho:
            <br>
            <input type="text" name="cabecalho"  /> 
            <br>
            informações:
            <br>
            <input type="text" name="infor"  /> 
            <br>
            <input type="submit" value="SALVAR"  /> 


        </form>
    </div>
</body>