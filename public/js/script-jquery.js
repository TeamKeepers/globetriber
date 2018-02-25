/* JS pour affichage des formulaires des lieux avec menu déroulant si dodo/coworking/les 2 */

/* JS pour les tooltips du menu de navigation | BOOTSTRAP: data-toggle="tooltip" data-placement="top" title="Tooltip on top"*/

/* application d'un offset sur le header en fonction de la taille de l'écran */
var largeurEcran = $(window).width();

if(largeurEcran >= 992){
    $('#modif-recherche').addClass('offset-1');
    $('#modif-recherche').css('margin-top', 80); 
};


// Mettre classe hidden par défaut aux options sleep
$('#place_washingMachine').parent().addClass('hidden');
$('#place_bed').parent().addClass('hidden');


// Mettre classe hidden par défaut aux options work
$('#place_capacity').parent().addClass('hidden');
$('#place_privateDesk').parent().addClass('hidden');
$('#place_computer').parent().addClass('hidden');
$('#place_napStation').parent().addClass('hidden');
$('#place_whiteBoard').parent().addClass('hidden');
$('#place_terrace').parent().addClass('hidden');
$('#place_freeDrink').parent().addClass('hidden');
$('#place_freeSnack').parent().addClass('hidden');

//Faire apparaitre les options relatives à sleep
if($('#place_types_0').click(function(){
    $('#place_washingMachine').parent().toggleClass('hidden');
    $('#place_bed').parent().toggleClass('hidden');
}));
//Faire apparaitre les options relatives à work
if($('#place_types_1').click(function(){
    $('#place_capacity').parent().toggleClass('hidden');
    $('#place_privateDesk').parent().toggleClass('hidden');
    $('#place_computer').parent().toggleClass('hidden');
    $('#place_napStation').parent().toggleClass('hidden');
    $('#place_whiteBoard').parent().toggleClass('hidden');
    $('#place_terrace').parent().toggleClass('hidden');
    $('#place_freeDrink').parent().toggleClass('hidden');
    $('#place_freeSnack').parent().toggleClass('hidden');
}));

