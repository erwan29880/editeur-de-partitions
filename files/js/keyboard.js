function PopupWindow(source, strWindowToOpen){ 
	var strWindowFeatures = "toolbar=no,resize=no,titlebar=no,"; 
	strWindowFeatures = strWindowFeatures + "menubar=no,width=560,height=300,maximize=null"; 
	window.open(strWindowToOpen, '', strWindowFeatures); 
} 

function note(arg) { //pour écrire les notes
	arg=' ' + arg ;
	var $write = $('#write');
	$write.html($write.html() + arg);
}

function duree(arg2) {     //pour la durée mais pas au point
	var $write = $('#write');
	$write.html($write.html() + arg2);
}

function efface(){
	var $write = $('#write');
    var html = $write.html(); 
    $write.html(html.substr(0, html.length - 1));
    return false;
}

function effaceOLD() {
	var $write = $('#write');
	var html = $write.html();  
	var maChaine= html.length;   
			
	nbreCara=html.charAt(html.length-2);
	if(nbreCara==' ') {
		var maChaine2 = maChaine - 1;
		var chaineASupprimer = html.substring(maChaine2,maChaine);
		html = html.replace(chaineASupprimer, "");
		$write.html(html);
		return nbreCara=0;
	}
			
	nbreCara=html.charAt(html.length-3);
	if(nbreCara==' ') {
		var maChaine2 = maChaine - 2;
		var chaineASupprimer = html.substring(maChaine2,maChaine);
		html = html.replace(chaineASupprimer, "");
		$write.html(html);
		return nbreCara=0;
	}
			
	nbreCara=html.charAt(html.length-4);
	if(nbreCara==' ') {
		var maChaine2 = maChaine - 3;
		var chaineASupprimer = html.substring(maChaine2,maChaine);
		html = html.replace(chaineASupprimer, "");
		$write.html(html);
		return nbreCara=0;
	}
			
	var nbreCara=html.charAt(html.length-5);  
	if(nbreCara==' ') {
		var maChaine2 = maChaine - 4;
		var chaineASupprimer = html.substring(maChaine2,maChaine);
		html = html.replace(chaineASupprimer, "");
		$write.html(html);
		return nbreCara=0;
	}
							
	if(maChaine <= 5) {
		$write.html("");
	}

				
}
