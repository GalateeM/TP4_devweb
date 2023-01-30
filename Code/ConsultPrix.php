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
        include("./include/header.php");
        include("./include/menus.php");
    
    ?>

    <?php  ?>

    <div style="padding-top: 30px" id="main">
        <div style="text-align: center" class="col-md-12">
            <?php require_once("InitTableaux.php"); ?>

            <form method='post' action=''>
		    <fieldset><legend> Choisir une tranche de prix : </legend><BR>
			<input type='radio' name='BR_prix' value='inf' checked /> < 200.000 €<BR><BR>
			<input type='radio' name='BR_prix' value='milieu' /> de 200.000 € à 300.000 €<BR><BR>
			<input type='radio' name='BR_prix' value='sup' /> > 300.000 €<BR><BR>
			<input type='submit' name='Afficher' value='Afficher'/><BR><BR>
            </fieldset>
            </form><BR><BR>

            <?php
                if(isset($_POST["Afficher"]) and isset($_POST["BR_prix"])) {
                    echo "<p>Biens correspondant à la sélection";
                    switch (htmlentities($_POST["BR_prix"])) {
                        case 'inf':
                            echo " (< 200.000€) </p>";
                            $borne_inf = 0;
                            $born_sup = 200000;
                            break;
                        case 'milieu':
                            echo " (de 200.000€ à 300.000€) </p>";
                            $borne_inf = 200000;
                            $born_sup = 300000;
                            break;
                        case 'sup':
                            echo " (> 300.000€) </p>";
                            $borne_inf = 300000;
                            $born_sup = PHP_FLOAT_MAX;
                            break;
                    }

                    
                    echo "<center><table border='2'>";
                    echo "<tr><th>idBien</th><th>titreBien</th><th>prixBien</th><th>idType</th>";
                    foreach($tabBien as $bien) {
                        if($bien['prixBien']>=$borne_inf and $bien['prixBien']<$born_sup) {
                            echo "<tr>";
                            foreach($bien as $caracteristique => $valeur) {
                                if($caracteristique!='detailBien') {
                                    echo "<td>".$valeur."</td>";
                                }
                                
                            }
                            echo "</tr>";
                        }
                        
                   }
                   echo "</table>";
                }
            ?>

        

            </div>
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>