document.getElementById('valider').style.display="none";
document.getElementById('imagee').style.display="none";

let jefais = document.getElementById('cliquer');
	
jefais.addEventListener('click',function(){	

	document.getElementById('resultat').textContent = "";
	//traitement du textarea
	let abc = document.querySelector('textarea').value;
	let reg = new RegExp("[&grave;]", "g");
	abc = abc.replace(reg,'');

	const rouge = document.forms[0].elements["R"].value;
	const jaune = document.forms[0].elements["G"].value;
	const bleu = document.forms[0].elements["B"].value;
	const rouge2 = document.forms[0].elements["R2"].value;
	const jaune2 = document.forms[0].elements["G2"].value;
	const bleu2 = document.forms[0].elements["B2"].value;

    var xhr=null;
 
    if (window.XMLHttpRequest) { 
        xhr = new XMLHttpRequest();
    }
	else if (window.ActiveXObject){
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    //on définit l'appel de la fonction au retour serveur
    xhr.onreadystatechange = function() { 
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			document.getElementById('imagee').style.display="none";
				alert_ajax(xhr); 
		}else{
			document.getElementById('imagee').style.display="block";
		}	
	};
 
	xhr.open('POST', 'reponse.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send('variable=' + abc + '&red='+rouge+'&yellow='+jaune+'&blue='+bleu + '&red2='+rouge2+'&yellow2='+jaune2+'&blue2='+bleu2);

}, false);


function alert_ajax(xhr){

	let docXML= xhr.responseXML;
	let concat = '';
	let concat2 = '';
	let afficheVal=0;
	let items = docXML.getElementsByTagName("donnee");
	let prob = docXML.getElementsByTagName("probleme");
	let nbre = (items.length) - 1;
	let nbre2 = nbre+1;
	//on fait juste une boucle sur chaque element "donnee" trouvé
	for (i=0;i<nbre2;i++){
		concat = items.item(i).firstChild.data;
		if(i<nbre){
			document.getElementById('resultat').appendChild(document.createTextNode(concat));
			document.getElementById('resultat').appendChild(document.createElement('br'));
		}
		else afficheVal=concat;
	}
	
	if(afficheVal==1){
		document.getElementById('valider').style.display="none";
		document.getElementById('cliquer').style.display="block";
		document.forms[0].elements["R"].value=255;
		document.forms[0].elements["G"].value=255;
		document.forms[0].elements["B"].value=255;
		document.forms[0].elements["R2"].value=0;
		document.forms[0].elements["G2"].value=0;
		document.forms[0].elements["B2"].value=0;	
	}
	else{
		document.getElementById('cliquer').style.display="none";
		document.getElementById('valider').style.display="block";
	}
}