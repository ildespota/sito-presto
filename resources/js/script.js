const { set } = require("lodash");

/* window.addEventListener ("scroll",function(){

   

    if (window.pageYOffset>200) {
    document.getElementById("tornasu").classList.add('visible');
    document.getElementById("tornasu").classList.remove('invisible');
    }
    
    else if (window.pageYOffset<200) {
    document.getElementById("tornasu").classList.add('invisible');
    document.getElementById("tornasu").classList.remove('visible');
    }
    
    
},!1);

let tornaSu = document.querySelector('#tornasu');

if(tornaSu){
    tornaSu.addEventListener('click', function(){
  
        $(window).scrollTop(0);
    }) 
} */


/* carosello */
$('#recipeCarousel').carousel({
    interval: 10000
  })
  
  $('.carousel .carousel-item').each(function(){
      var minPerSlide = 3;
      var next = $(this).next();
      if (!next.length) {
      next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));
      
      for (var i=0;i<minPerSlide;i++) {
          next=next.next();
          if (!next.length) {
            next = $(this).siblings(':first');
          }
          
          next.children(':first-child').clone().appendTo($(this));
        }
  });

  /* Redirect thankyou page */

  let thankyou = document.querySelector('#thankyou');

    if(thankyou){

        window.setTimeout(function(){

        // Vai alla nuova location
        window.location.href = "/";

    }, 3000);
}

/* Redirect not allowed */

let notallowed = document.querySelector('#notallowed');

if(notallowed){

    window.setTimeout(function(){

    // Vai alla nuova location
    window.location.href = "/";

}, 3000);
}


// gestione input search 

    let searchButton = document.querySelector('#search-btn');
    searchButton.addEventListener("click", function() {
        
        let inputSearch = document.querySelector('#input-search');
        inputSearch.classList.toggle('d-none')
    })
