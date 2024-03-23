$(document).ready(function(){
    const menu = $("#menu");
    const ul = $("#ul-menu");
    const header =$("#header");
    const navLink = $(".navLink");
    const logoMenu = $("#logo-menu");
    const ulCliente =$("#ulCliente");
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

    //codigo para hover ul cliente
    $('#liCliente li').hide();

    $('#liCliente').on('click', function(){
      $('#liCliente li').show();
      ulCliente.addClass("activeUlCliente");
     
    });

    $(document).on('click', function(event) {
      if (!$(event.target).closest('#liCliente').length) {
        $('#ulCliente li').hide();
        ulCliente.removeClass("activeUlCliente");
      }
    });




    const swiper = new Swiper('.new-swiper', {
        // Optional parameters
        centeredSlides:true,
        slidesPerView: "auto",
        loop:true,

        autoplay: {
          delay: 5000,
        },

      


      
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