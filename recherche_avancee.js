function recherche_avancee(id) {
    if(document.getElementById(id).style.visibility=="hidden") {
        document.getElementById(id).style.visibility="visible";
        document.getElementById('activer').innerHTML='Désactiver la recherche avancée';
    }
    else {
        document.getElementById(id).style.visibility="hidden";
        document.getElementById('activer').innerHTML='Activer la recherche avancée';
    }
    return true;
}
