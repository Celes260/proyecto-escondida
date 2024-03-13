$(document).ready(function(){
    const menu = $("#menu");
    const ul = $("#ul-menu");
    const header =$("#header");
    const navLink = $(".navLink");
    const logoMenu = $("#logo-menu");
    var windowWidth = $(window).width();
  
  

     menu.click(function(){
         header.toggleClass("headerActive");
         ul.toggleClass("menuActive");
         ul.removeClass("hidden-menu")
         logoMenu.toggleClass("ocultar");
         menu.removeClass("bx-menu");
         menu.toggleClass("bx bx-x");
         menu.addClass("bx bx-menu ");

    });
   

    
    // navLink.click(function(){
    //     nav.removeClass("menu-active");
    //     menu.removeClass("bx bx-x");
    //     menu.addClass("bx bx-menu ");
    // });


 


    const swiper = new Swiper('.new-swiper', {
        // Optional parameters
        centeredSlides:true,
        slidesPerView: "auto",
        loop:true,

      


      
        // If we need pagination
        pagination: {
          el: '.swiper-pagination',
        },
      
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }
       
      });


});