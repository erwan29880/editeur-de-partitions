function CacherParagraphe(id){
    if(document.getElementById('index').style.display=="none"){
        document.getElementById('index').style.display="block";
        document.getElementById('TechniqueEtTutos').style.display="none";
        document.getElementById('ErwanTanguy').style.display="none";
    }
    else{
        document.getElementById(id).style.display="none";
    }
    return true;
}


function CacherParagraphe3(id){
    if(document.getElementById('TechniqueEtTutos').style.display=="none"){
        document.getElementById('TechniqueEtTutos').style.display="block";
        document.getElementById('index').style.display="none";			
        document.getElementById('ErwanTanguy').style.display="none";
    }
    else{
        document.getElementById(id).style.display="none";
    }
    return true;
}


function CacherParagraphe5(id){
    if(document.getElementById('ErwanTanguy').style.display=="none"){
        document.getElementById('ErwanTanguy').style.display="block";
        document.getElementById('index').style.display="none";
        document.getElementById('TechniqueEtTutos').style.display="none";
	}
    else{
        document.getElementById(id).style.display="none";
    }
    return true;
}


function affiche(id){
  document.getElementById(id).style.display = '';
}


function cache(e,id){
    var relTarg = e.relatedTarget || e.toElement;
    if(!isChildOf(relTarg,document.getElementById('conteneur'))){
    document.getElementById(id).style.display = 'none';
    }
}


function isChildOf(child,par){
    while(child!=document){
        if(child==par) return true;
        child = child.parentNode;
    }
    return false;
}


function afficher_cacher(id){
    if(document.getElementById(id).style.visibility=="hidden"){
        document.getElementById(id).style.visibility="visible";
    }
    else{
        document.getElementById(id).style.visibility="hidden";
    }
    return true;
}


function afficher_cacher2(id){
    if(document.getElementById(id).style.display=="none"){
        document.getElementById(id).style.display="block";
    }
    else{
        document.getElementById(id).style.display="none";
    }
    return true;
}


function CacherParagrapheTablature(id){
    if(document.getElementById(id).style.display=="none"){
        document.getElementById(id).style.display="block";
    }
    else{
        document.getElementById(id).style.display="none";
    }
    return true;
}
	
	
function CacherParagrapheTablature1(id){
    if(document.getElementById('TablaturesMusiqueBretonne').style.display=="none"){
        document.getElementById('TablaturesMusiqueBretonne').style.display="block";
        document.getElementById('TablaturesMusiqueIrlandaise').style.display="none";
        document.getElementById('TablaturesMusiqueAutres').style.display="none";
	}
	else{
        document.getElementById(id).style.display="none";
    }
    return true;
}


function CacherParagrapheTablature2(id){
    if(document.getElementById('TablaturesMusiqueIrlandaise').style.display=="none"){
        document.getElementById('TablaturesMusiqueIrlandaise').style.display="block";
        document.getElementById('TablaturesMusiqueBretonne').style.display="none";
        document.getElementById('TablaturesMusiqueAutres').style.display="none";
	}
	else{
        document.getElementById(id).style.display="none";
    }
    return true;
}


function CacherParagrapheTablature3(id){
    if(document.getElementById('TablaturesMusiqueAutres').style.display=="none"){
        document.getElementById('TablaturesMusiqueAutres').style.display="block";
        document.getElementById('TablaturesMusiqueBretonne').style.display="none";
        document.getElementById('TablaturesMusiqueIrlandaise').style.display="none";
	}
    else{
        document.getElementById(id).style.display="none";
    }
    return true;
}