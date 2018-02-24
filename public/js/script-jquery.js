/* JS pour affichage des formulaires des lieux avec menu déroulant si dodo/coworking/les 2 */

/* JS pour les tooltips du menu de navigation | BOOTSTRAP: data-toggle="tooltip" data-placement="top" title="Tooltip on top"*/

/* application d'un offset sur le header en fonction de la taille de l'écran */
var largeurEcran = $(window).width();

if(largeurEcran >= 992){
    $('#modif-recherche').addClass('offset-1');
    $('#modif-recherche').css('margin-top', 80); 
};