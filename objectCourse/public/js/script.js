// $(document).ready(function() {

//     $('#login').click(function() {
//         $('.login').addClass('popup');
//     });

//     $('.login form .fa-xmark').click(function() {
//         $('.login').removeClass('popup');
//     });

//     $(window).on('load scroll',function() {
//         $('#menu').removeClass('fa-solid fa-xmark');
//         $('.navbar').removeClass('nav-toggle');
//         $('.login').removeClass('popup');
//         $('section').each(function() {
//             let top = $(window).scrollTop();
//             let height = $(this).height();
//             let id = $(this).attr('id');
//             let offset = $(this).offset().top - 200;

//             if(top > offset && top < offet +height) {
//                 $('.nav ul li a').removeClass('active');
//                 $('.navbar').find(`[href="#${id}"]`).addClass('active');
//             }
//         })
//     });

// });


// open and close login button
$(document).ready(function() {

    $('#login-btn').click(function() {
        $('.login-form').addClass('popup');
    });
    
    $('#close-btn').click(function() {
        $('.login-form').removeClass('popup');
    });
})


window.onscroll = () => {
    if (window.scrollY > 80) {
        document.querySelector('.header .header2').classList.add('active');
    } else {
        document.querySelector('.header .header2').classList.remove('active');
    }
}
window.onload = () => {
    if (window.scrollY > 80) {
        document.querySelector('.header .header2').classList.add('active');
    } else {
        document.querySelector('.header .header2').classList.remove('active');
    }
}