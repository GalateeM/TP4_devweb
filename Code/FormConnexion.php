<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="include/bootstrap.min.css">
    <link rel="stylesheet" href="include/styles.css">
	<title>Mon site en PHP!</title>
</head>
<body>

    <div style="padding-top: 30px; padding-left: 30px" id="main">
        <?php
            if(isset($_GET['erreur'])&&isset($_GET['erreur'])=='true') {
                echo "<h2>".htmlentities($_GET['erreur'])."</h2><BR><BR>";
            }


        ?>
        <div style="text-align: center" class="col-md-12">
            <form method='post' action='TraitConnexion.php'>
		    <fieldset><legend>Veuillez entrer les identifiants pour accéder aux données</legend><BR>
            <?php
                if(isset($_COOKIE['cookIdent'])) {
                    echo "Login <input type='text' name='login' value='".$_COOKIE['cookIdent']."'> <BR/><BR/>";
                } else {
                    echo "Login <input type='text' name='login'> <BR/><BR/>";
                }
            ?>
            Mot de passe <input type='password' name='pw'> <BR/><BR/>
            Se souvenir de moi <input type='checkbox' name='check'> <BR><BR>
            <input type='submit' name='Valider' value='Valider'/><BR>
            </fieldset></form>
            </div>
        </div>
    </div>


</body>
</html>
