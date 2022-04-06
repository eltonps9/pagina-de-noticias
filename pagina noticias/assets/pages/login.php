<?php
session_start();
require "../config/conect.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <div class="container">
        <div>
            <p>
                <?php
                    if($_SESSION['logar']){
                        echo $_SESSION['logar'];
                        $_SESSION['logar']="";
                    }
                ?>
            </p>
        </div>
        <div class="form">
            <form action="../config/login_action.php" method="post">
            <br>

            <div>
                <?php
                    if($_SESSION['aviso']){
                        echo $_SESSION['aviso'];
                        $_SESSION['aviso'] = "";
                        echo "<br>";

                    }                
                ?>
            </div>

            <label for="">   
            EMAIL:
            <br>
                <input type="email" name="email" placeholder="seu email" required>

            </label>

            <br>
            <label for="">
            SENHA:
            <br>
                <input type="text" name="senha" placeholder="sua senha" required>

            </label>
            <br>
            <br>
            
            <input type="submit" value="logar">

            </form>
        </div>
    </div>
</body>
</html>
