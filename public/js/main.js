// SCRIPT MENU TOGGLE BUTTON 
$(document).ready(function(){

  $(".sidebar-btn").click(function(){
    $(".wrapper").toggleClass("collapse_menu");
  });
 

  // SCRIPT ACTIF/INACTIF partenaires 

const elementsInactifs = document.getElementsByClassName('inactif');

const elementsActifs = document.getElementsByClassName('actif');

const elementsTout = [...elementsInactifs,...elementsActifs];

const showActifs = ()=> {

    // Iterate through the retrieved elements and add the necessary class names.
    for(var i = 0; i < elementsInactifs.length; i++)
    {
      elementsInactifs[i].classList.add('d-none');
        console.log(elementsInactifs[i].className);
    }
    for(var i = 0; i < elementsActifs.length; i++)
    {
      elementsActifs[i].classList.remove('d-none');
        console.log(elementsActifs[i].className);
    }
}

const showInactifs= ()=> {
 
    // Iterate through the retrieved elements and add the necessary class names.
    for(var i = 0; i < elementsInactifs.length; i++)
    {
      elementsInactifs[i].classList.remove('d-none');
        console.log(elementsInactifs[i].className);
    }
    for(var i = 0; i < elementsActifs.length; i++)
    {
      elementsActifs[i].classList.add('d-none');
        console.log(elementsActifs[i].className);
    }
}

const showTout= ()=> {
 
    // Iterate through the retrieved elements and add the necessary class names.
   
    for(var i = 0; i < elementsTout.length; i++)
    {
      elementsTout[i].classList.remove('d-none');
        console.log(elementsTout[i].className);
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
const boutonTout = document.getElementById('tout');
if(boutonTout) {
  boutonTout.addEventListener("click", showTout);
}

});