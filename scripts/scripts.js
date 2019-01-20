$(document).ready(function() { //MENU CONTROL
       $('.open-nav').click(function() {
               $('.menu').slideToggle('slow');
               $('.downarrow').toggleClass('flip');
       });
   });
