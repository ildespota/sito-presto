const { set } = require("lodash");

window.addEventListener ("scroll",function(){

    /* console.log(window.pageYOffset); */

    if (window.pageYOffset>200) {
    document.getElementById("tornasu").classList.add('visible');
    document.getElementById("tornasu").classList.remove('invisible');
    }
    
    else if (window.pageYOffset<200) {
    document.getElementById("tornasu").classList.add('invisible');
    document.getElementById("tornasu").classList.remove('visible');
    }
    
    /* val[0].innerHTML= "PageYOffset = "+window.pageYOffset */
},!1);

let tornaSu = document.querySelector('#tornasu');

tornaSu.addEventListener('click', function(){
    /* console.log(window.pageYOffset); */
    $(window).scrollTop(0);
})