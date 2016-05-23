function recherche_avancee(id) {
    if (document.getElementById(id).style.visibility=="hidden") {
        document.getElementById(id).style.visibility="visible";
        document.getElementById(id).style.height="110px";
        document.getElementById('activer').innerHTML='Désactiver la recherche avancée';
        $(function() {
        	$('#champ_recherche').attr('action',"resultats_recherche.php?avancee=true#search-btn");
        });
    }
    else {
        document.getElementById(id).style.visibility="hidden";
        document.getElementById(id).style.height="0px";
        document.getElementById('activer').innerHTML='Activer la recherche avancée';
        $(function() {
        	$('#champ_recherche').attr('action',"resultats_recherche.php?avancee=false#search-btn");
        });
    }
}
