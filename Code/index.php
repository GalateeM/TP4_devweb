<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="include/bootstrap.min.css">
    <link rel="stylesheet" href="include/styles.css">
	<title>Mon site en PHP!</title>
</head>
<body>
    <?php
        session_start(); 
        if(!isset($_SESSION['access'])||!$_SESSION['access']=='oui') {
            header("location:FormConnexion.php?erreur=Tentative d'acces interdite");
        }
        if(isset($_GET['cookie']) && htmlentities($_GET['cookie'])=='supp') {
            setcookie("cookIdent", "", time()-3600);
        }
        include("./include/header.php");
        include("./include/menus.php"); 
    ?>
    <div style="padding-top: 30px" id="main">
        <div style="text-align: center" class="col-md-12">
            <img src="villa.jpg" alt="Image d'une villa" width="80%"> <BR><BR>

            <?php
                echo "On affiche la session : <BR>";
                var_dump($_SESSION);
                echo "<BR><BR> On affiche le possible cookie : <BR>";
                var_dump($_COOKIE);
                echo "<BR><a href='index.php?cookie=supp'>Supprimer le cookie identification</a><BR><BR><BR><BR><BR>"
                
            ?>
            

            </div>
        </div>
    </div>



	<?php include("./include/footer.php"); ?>
</body>
</html>
