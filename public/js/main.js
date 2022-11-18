// SCRIPT MENU TOGGLE BUTTON 
$(document).ready(function(){

  $(".sidebar-btn").click(function(){
    $(".wrapper").toggleClass("collapse_menu");
  });
 

  // SCRIPT ACTIF/INACTIF partenaires 

const elementsInactifs = document.getElementsByClassName('inactif');

const elementsActifs = document.getElementsByClassName('actif');

const elementsAll = [...elementsInactifs,...elementsActifs];

// parcourt le tableau des éléments avec deux boucles for, et ajoutera la classe d-none (display none de Bootstrap) aux éléments  inactifs,
// ils disparaîtront de la liste, et supprimera la classe d-none pour les éléments actifs, ils seront affichés dans la liste 
const showActifs = ()=> {
    // Parcoure les éléments récupérés et ajoute le nom des classes nécessaires.
    for(var i = 0; i < elementsInactifs.length; i++)
    {
      elementsInactifs[i].classList.add('d-none');
    }
    for(var i = 0; i < elementsActifs.length; i++)
    {
      elementsActifs[i].classList.remove('d-none');
    }
}

// parcourt le tableau des éléments avec deux boucles for, et supprimera la classe d-none aux éléments inactifs, 
// ils seront affichés dans la liste, et ajoutera la classe d-none pour les éléments actifs, ils disparaîtront de la liste
const showInactifs= ()=> {
    for(var i = 0; i < elementsInactifs.length; i++)
    {
      elementsInactifs[i].classList.remove('d-none');
    }
    for(var i = 0; i < elementsActifs.length; i++)
    {
      elementsActifs[i].classList.add('d-none');
    }
}

// parcourt le tableau des éléments avec deux boucles for, et supprimera la classe d-none, 
// pour afficher tous les éléments actifs et inactifs. 
const showAll= ()=> {
    for(var i = 0; i < elementsAll.length; i++)
    {
      elementsAll[i].classList.remove('d-none');
    }
}


// sur le bouton actif cela nous montre les actifs 
const boutonActif = document.getElementById('actif');
if(boutonActif){
  boutonActif.addEventListener("click", showActifs);
}

// sur le bouton inactif cela nous montre les inactifs 
const boutonInactif = document.getElementById('inactif');
if(boutonInactif) {
  boutonInactif.addEventListener("click", showInactifs);
}


// sur le bouton tout cela nous montre tous les partenaires
const boutonAll = document.getElementById('all');
if(boutonAll) {
  boutonAll.addEventListener("click", showAll);
}

});