/* INICIO SCROLL IMAGENES SERVICIOS */

ScrollReveal().reveal('.headline');
ScrollReveal().reveal('.pricuadro', { delay: 250 });
ScrollReveal().reveal('.segcuadro', { delay: 500 });
ScrollReveal().reveal('.tercuadro', { delay: 250 });
ScrollReveal().reveal('.cuarcuadro', { delay: 500 });
ScrollReveal().reveal('.quincuadro', { delay: 250 });
ScrollReveal().reveal('.sexcuadro', { delay: 500 });
ScrollReveal().reveal('.septicuadro', { delay: 250 });
ScrollReveal().reveal('.octcuadro', { delay: 500 });
ScrollReveal().reveal(target, options);

/* FINAL SCROLL IMAGENES SERVICIOS */



/* INICIO SCROLL PARALLAX */

$(window).scroll(function() {
    var position = $(this).scrollTop();
    $('.imgHolder img').css({ top: position / 2 });
});

$('.header').on('click', '', function() {
    var top = $('section').first().position().top;
    $("html, body").animate({
        scrollTop: top
    }, {
        easing: "swing",
        duration: 800
    });
});

/* FINAL SCROLL PARALLAX */



/* prueba acceder al sistema primera imagen */
function(a) {
    "mousemove" == a.type && (e.x = a.pageX, e.y = a.pageY), "mouseleave" == a.type && (e.x = experience.canvas.width / 2, e.y = experience.canvas.height / 2)
}

function(a) {
    "mousemove" == a.type && (e.x = a.pageX, e.y = a.pageY), "mouseleave" == a.type && (e.x = experience.canvas.width / 2, e.y = experience.canvas.height / 2)
}