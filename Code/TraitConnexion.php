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
        if(isset($_POST['Valider']) && isset($_POST['login']) && isset($_POST['pw'])
        && $_POST['login']=='Achille' && $_POST['pw']=='Talon') {
            if(isset($_POST['check'])) {
                setcookie("cookIdent", htmlentities($_POST['login']), time()+60);
            }
            $_SESSION['access']='oui';
            header("location:index.php");
        } else {
            header("location:FormConnexion.php?erreur=Erreur d'identification... Recommencez");
        }


    ?>


</body>
</html>
