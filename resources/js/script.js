const { set } = require("lodash");

window.addEventListener ("scroll",function(){

    /* console.log(window.pageYOffset); */

    if (window.pageYOffset>200) {
    document.getElementById("tornasu").classList.add('d-block');
    }
    
    else if (window.pageYOffset<200) {
    document.getElementById("tornasu").classList.add('d-none');
    }
    
    /* val[0].innerHTML= "PageYOffset = "+window.pageYOffset */
},!1);

let tornaSu = document.querySelector('#tornasu');

tornaSu.addEventListener('click', function(){
    /* console.log(window.pageYOffset); */
    $(window).scrollTop(0);
})