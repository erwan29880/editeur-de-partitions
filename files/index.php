<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Editeur de tablature pour accord&eacute;on diatonique en ligne</title>
	<link rel="stylesheet" type="text/css" href="statique/style.css" />
	<link rel="shortcut icon" href="image/favicon.ico">  
	<script type="text/javascript" src="js/mesfonctions.js"></script>
	<META NAME="AUTHOR" CONTENT="Erwan Tanguy">
</head>
<body onload="document.getElementById('write').focus()">


<h1>Abc2diato</h1>
<h2>Programme dont le but est de transformer des fichiers Abc en tablatures (avec prise en charge partielle de la partition) pour sol/do+4 boutons, et d'optimiser les enchainements de boutons en fonction de diff&eacute;rents param&egrave;tres (harmonie, tonalit&eacute;...).</h2>
	<div id="reinitialiser">
		<div class="bouton"><a href="http://thesession.org/tunes" target="_blank" title="the session, des milliers de fichiers abc en musique irlandaise !">Thesession.org</a></div>
		<div class="bouton"><a href="http://www.tradfrance.com/matf01.txt" target="_blank" title="des liens vers des collections de fichiers abc, en Centre France, musique bretonne etc.">www.tradfrance.com</a></div>
		<div class="bouton"><a href="http://abcnotation.com/search" target="_blank" title="LE site de la notation abc.">Abcnotation.com</a></div>
		<div class="bouton" id="ecrireTruc">Testez un reel</div>
		<div class="bouton" id="ecrireTruc2">Testez une bourr&eacute;e</div>
		<div class="bouton" id="ecrireTruc3">Testez une tarentelle</div>
	</div>

	<div id="principal">

	<div id="formulairePrincipal">
	
		<form method="post" action="image.php" accept-charset="UTF-8">
	
			<textarea id="write" name="tab" rows="12" cols="60" title="Copiez-collez ici votre fichier ABC !"></textarea>   
			
			<input type="hidden" name="hiddenpost" value="ok">
			
			<div id="corgeron">
				<table style="width:100%;">
				<tr id="chk2">
					<td style="width:90%;">Tablature au syst&egrave;me rang&eacute;es (Corgeron) : </td>
					<td><input onClick="javascript:afficher_cacher2('chk1');" type=checkbox name=corg value=corgeron></td>
				</tr>
				<tr id="chk1">
					<td style="width:90%;">Tablature pour La/R&eacute; (partition d&eacute;sactiv&eacute;e) : </td>
					<td><input onClick="javascript:afficher_cacher2('chk2');" type=checkbox name=lare value=lare2></td>
				</tr>
				<tr>
					<td style="width:90%;"><span title="en cas de probl&egrave;me avec la partition (la partition n'est pas le but du programme), d&eacute;sactivez-la !">D&eacute;sactiver la partition : </span></td>
					<td><input type=checkbox name=parto value=non></td>
				</tr>
				<tr>
					<td style="width:90%;"><span title="en cas de probl&egrave;me avec le calcul de la position des basses et accords, d&eacute;sactivez la main gauche !">D&eacute;sactiver le calcul de la main gauche :</span></td>
					<td><input type=checkbox name=maing value=non></td>
				</tr>
				<tr>
					<td style="width:90%;"><span title="certaines am&eacute;liorations sont aport&eacute;es en fonction des encha�nements de notes, vous pouvez d&eacute;sactiver celles-ci !">D&eacute;sactiver l'optimisation des notes :</span></td>
					<td><input type=checkbox name=optim value=non></td>
				</tr>
				<tr>
					<td style="width:90%;"><span title="les instrumentistes non sensibils&eacute;s &agrave; l'harmonie font parfois des erreurs pour la tonalit&eacute; ; le programme tente de trouver la bonne tonalit&eacute;, d&eacute;sactivez cette fonction si vous le souhaitez !">D&eacute;sactiver la recherche de tonalit&eacute; :</span></td>
					<td><input type=checkbox name=optimTona value=non></td>
				</tr>
				</table>
						

				<span id="texte" onClick="javascript:afficheCache('corgeron2','texte')"><span style="color:blue;">Couleur : cliquer</span></span>
			
				<div id="corgeron2" style="display:none;">
					Couleur de l'arri&egrave;re-plan (blanc par d&eacute;faut) <a href="http://www.code-couleur.com/" target="_blank"><i><span style="text-decoration:underline;"> code RVB</span></i></a> :<br> 
					R<input type="text" size=1 name="R" value=255> 
					V<input type="text" size=1 name="G" value=255> 
					B<input type="text" size=1 name="B" value=255><br><br>
					Couleur de la tablature (noir par d&eacute;faut) <a href="http://www.code-couleur.com/" target="_blank"><i><span style="text-decoration:underline;">code RVB</span></i></a> :<br> 
					R<input type="text" size=1 name="R2" value=0> 
					V<input type="text" size=1 name="G2" value=0> 
					B<input type="text" size=1 name="B2" value=0>
				</div>
					
			</div>
			
			<div id="valider"><input type="submit" value="Transformer en tablature !"></div>
		</form>
	
	</div>

	<div id="imagee"><img src="image/gif.gif" alt="gif"></div>
	
	<div id="cliquer">V&eacute;rifier le fichier ABC !</div>

	<div id="resultat"></div> 	
	
</div>
	
<div id="clavier">
	<img src="image/clavier.PNG" alt="gif">
</div>
	

<script type="text/javascript" src="js/jQuery.js"></script>';


<script>

	$(function(){

		$("#ecrireTruc").click(function(){
			abc='X:1\nT: The Boys Of Portaferry\nR: reel\nM: 4/4\nL: 1/8\nK:Gmaj\nBA|:G2 BG AcBA|GABG GEDE|GABG ABce|dBgB c2 BA|\n|G2 BG AcBA|(3GGG BG GEDE|GABG ABce|1 dBAc BGGD:|2 dBAc BGGA||\n|(3Bcd gd edgd|Bdgd e2 dc|(3Bcd gd edef|gedB c2 BA|\n|(3Bcd gd edgd|Bdgd e2 dc|Bdgd (3efg fa|gedB c2 BA:||\n';
			$('#write').html(abc);
		})


		$("#ecrireTruc2").click(function(){
			abc='X:\nT:Venosc\nR:Bourr&eacute;e &agrave; 2 temps\nC:Trad.\nA:Massif Central\nO:France\nM:2/4\nL:1/8\nQ:1/4=120\nK:G\nF>E DE|F2 DA|A>B cd|c>B AG|F>E DE|F2 DA|A>B cd|A4:|\ndB BA|cA AG| B>A GF|G/2F/2G/2A/2 B/2A/2B/2c/2|dB BA|cA AG|B>AGF|G4:||';
			$('#write').html(abc);
		})


		$("#ecrireTruc3").click(function(){
			abc='X:4\nT:Tarentelle\nC:Trad.\nM:6/8\nO:Italie\nZ:Erwan Tanguy\nR:Tarentelle\nL:1/8\nK:Am\n||:"Am"EABc2c|"Dm"dcB"Am"c2c|cAc"E"B2B|dcB"Am"c2A|\n"Am"EABc2c|"Dm"dcB"Am"c2c|cAcB2B|dcB"Am"A3:||\n||:"Am"a2ae2e|a2ae2e|ede"Dm"f2f|fgf"Am"f2e|\nefe"Dm"e2d|ded"Am"d2c|cAc"E"c2B|dcB"Am"A3:||';
			$('#write').html(abc);
		})
	})



	function afficheCache(var1,var2){
		
		if(document.getElementById(var1).style.display =='none'){
			document.getElementById(var1).style.display ='block';
			document.getElementById(var2).innerHTML = '<span style="color:blue;"><u><i>Couleur : fermer</u></i></span>';
		}
		else{
			document.getElementById(var1).style.display ='none';
			document.getElementById(var2).innerHTML = '<span style="color:blue;">Couleur : cliquer</span>';
		}
		return true;			
	}


	function afficher_cacher2(id){
		if(document.getElementById(id).style.display=="none"){
			document.getElementById(id).style.display="table-row";
		}
		else{
			document.getElementById(id).style.display="none";
		}
		return true;
	}
	
	$('tr').on('mouseover', function(){
		this.style.color="blue";
	});
	$('tr').on('mouseout', function(){
		this.style.color="black";
	});

	$('.bouton a').on('mouseover', function(){
			this.style.backgroundColor="blue";
	});
	$('.bouton').on('mouseover', function(){
			this.style.backgroundColor="blue";
	});
	$('.bouton a').on('mouseout', function(){
			this.style.backgroundColor="white";
	});
	$('.bouton').on('mouseout', function(){
			this.style.backgroundColor="white";
	});


</script>

<script type="text/javascript" src="verification.js"></script>
</body>
</html>