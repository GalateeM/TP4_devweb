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
        include("./include/header.php");
        include("./include/menus.php");
    ?>

        <form method='post' action='FormConnexion.php'>
            <BR>
            <BR>
        <button type="submit" value="Deconnexion">Se déconnecter</button>
        </form>
		    
   


</body>
</html>