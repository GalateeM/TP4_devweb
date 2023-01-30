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

    <div style="padding-top: 30px" id="main">
        <div style="text-align: center" class="col-md-12">
            <?php require_once("InitTableaux.php");?>
            <form method='post' action=''>
		    <fieldset><legend> Consulter les maisons par nombre de pièces </legend><BR>
		    <select name='LD_nb_pièces'>
                <?php
                    foreach($tabType as $cle => $valeur) {
                        echo "<option value='".$cle."'>".$valeur."</option>";
                    }
                    
                ?>
            </select><BR>
            <input type='submit' name='Afficher' value='Afficher'/><BR>
            </fieldset>
	        </form><BR><BR>

            <?php
                if(isset($_POST['Afficher']) and isset($_POST['LD_nb_pièces'])) {
                    echo "<p>Biens correspondant à la sélection ";
                    foreach($tabType as $cle => $valeur) {
                        if(htmlentities($_POST['LD_nb_pièces'])==$cle)
                        echo "(".$valeur.")";
                    }

                    $nb_res = 0;
                   
                    foreach($tabBien as $bien) {
                        if($bien['idType']==htmlentities($_POST['LD_nb_pièces'])) {
                            if($nb_res==0) {
                                echo "<center><table border='2'>";
                                echo "<tr><th>idBien</th><th>titreBien</th><th>prixBien</th><th>idType</th>";
                                $nb_res ++;
                            }
                            echo "<tr>";
                            foreach($bien as $caracteristique => $valeur) {
                                if($caracteristique!='detailBien') {
                                    echo "<td>".$valeur."</td>";
                                }
                                
                            }
                            echo "</tr>";
                        }
                   }
                   if($nb_res!=0) {
                        echo "</table>";
                   }else {
                    echo "<BR><BR>Aucun résultat !";
                   }
                   
                }

            ?>

            </div>
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>