<html>
<head>
	<?php include("set.php");?>
	<link rel="stylesheet" type="text/css" href="statique/edition.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Ma tablature</title>
	<link rel="shortcut icon" href="image/favicon.ico">  
	<script type="text/javascript" src="js/mesfonctions.js"></script>
	<script type="text/javascript" src="js/jQuery.js"></script>
	<script type="text/javascript" src="js/abcbasic.js"></script>

	<META NAME="AUTHOR" CONTENT="Erwan Tanguy">

	<script>	
		window.previousonload = window.onload;
		window.onload = redimimageac;
					
		function redimimageac() {
			if (document.getElementById('imageR')){
				var coord = new Array(2);
				coord = redimimage(document.getElementById('imageR').width,document.getElementById('imageR').height,1100,1555);
				document.getElementById('imageR').setAttribute("width",coord[0]);
				document.getElementById('imageR').setAttribute("height",coord[1]);
			}					
			if (typeof window.previousonload == 'function')
				window.previousonload();
		}

		/* Redimensionnement d'une image
		* largeur et hauteur : taille courante de l'image à redimensionner
		* largeurc et hauteurc : taille du rectangle dans lequel l'image
		* doit rentrer (l'image est agrandie ou rétrécie)
		*/
		function redimimage(largeur, hauteur, largeurc, hauteurc){
			coord=new Array(2);
			ratio=hauteur/largeur;
			//si l'image réelle est plus petite en largeur et hauteur
			if (largeur < largeurc && hauteur < hauteurc) {
				while (largeur < largeurc && hauteur < hauteurc) {
					largeur++;
					hauteur=Math.round(largeur*ratio);
				}
			} else {
				while (largeur > largeurc || hauteur > hauteurc) {
					largeur--;
					hauteur=Math.round(largeur*ratio);
				}
			}
			coord[0]=largeur;
			coord[1]=hauteur;
			return(coord);
		}	
	</script>
</head>
<body>
	<br><br>
  	
	<?php
		$date2=time();
 		include($ROOT_PATH . 'statique/pdo.php');
		$reponse = $bdd->query('SELECT * FROM images ORDER by id DESC LIMIT 1'); 
		while ($donnees = $reponse->fetch()){
			if($date2>($donnees['lien']+200000)){
				echo '<p style="text-align:center;font-size:2em;margin-top:100px;">Vous n\'avez pas/plus accès à cette page<br><br><a href="javascript:history.go(-1)">Recommencer ?</a></p>';
				exit;
			}

			echo '<img id="imageR" src="enregistrement/'.$donnees['lien'].'.png">';
			echo '<br>';

			if(isset($donnees['idid'])){
				if(preg_match('#mp3#',$donnees['idid'])){
					echo '<span style="float:left;margin-right:10px;"><a href="/ecoute/'.$donnees['idid'].'" target="_blank"><img src="/gif/muslogo.gif" alt="logo mp3"><a></span>';
					echo '<p style="font-size:1.2em;">Un mp3 est disponible ! Cliquez sur l\'image ci-contre pour écouter !</p>';
					echo '<br>';
				}
			}
			
			echo '<div id="recupereABC">
			<h3>Fichier ABC</h3>
			'.$donnees['notes'].'
			</div>';

			$lien=$donnees['lien'];

		} // fin while


  	?>
  
 	<p class="retour"><a href="index.php">Retour</a></p>

	<div id="notation2"></div>

	<div id="pourCentrerMidi">
		<p class="midiMiseEnForme"><a href="#" onclick="ABCJS.renderMidi('notation2', cooleys, {}, {}, {}); return false;" >&#9835; Ecouter ou télécharger l'extrait midi &#9834;</a></p>
	</div>

	<div class="infoABC centrer">
	<?php
		echo '<p style="margin-top:110px;">Explication du système de tablature ? <a href="Abc2diatoExplication.html" target="_blank">cliquez !</a>';
		echo '<p><a href="#" onClick="window.open(\'utils/quellesBasses.php\',null,\'height=580,width=600,status=yes,toolbar=no,menubar=no,location=no\')">Quelles basses et accords mettre ? Quelques pistes !</a></p>';
		echo '<p>Note : cette tablature-image est générée automatiquement à partir d\'un fichier abc.</p>';
		
	?>

	</div>
	
	<script type="text/javascript">
		var cooleys = document.getElementById("recupereABC").innerText;
	</script>

	
</body>
</html>