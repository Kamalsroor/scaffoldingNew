require('./bootstrap');


// $(document).ready(function() {
//     /*================
//      / General Functions /
//     ================*/

//     /* general variables */

//     // html
//     const html = document.querySelector('html');

//     // navbar
//     const navbar = document.querySelector('.main-navbar');

//     // sidebar
//     const sidebar = document.querySelector('.side-bar');

//     // sidebar btn in left of page
//     const sidebarCollapse = document.querySelector('.sidebar-collapse');

//     // sidebar close btn
//     const closeSidebarBtn = document.querySelector('.side-bar__close');

//     // sidebar btn in narvar
//     const navCollapse = document.querySelector('.nav-collapse');

//     // menu in small screen
//     const navMenu = document.querySelector('.hidden-menu');

//     // close menu in small screen
//     const closeNavMenu = document.querySelector('.hidden-menu__close');

//     // closr sidebar btn
//     const collapseBtn = document.querySelector('.collapse-sidebar');

//     // all element that contain data scroll
//     const elementData = document.querySelectorAll('*[data-scroll]');

//     // button open and close form add comment
//     const addCommentBtn = document.querySelector('.add-comment-btn');

//     // search box
//     const openSearchBox = document.querySelector('.main-navbar__links__menu__item.search-link a');

//     // search box close
//     const closeSearchBox = document.querySelector('.search-box__content__block__btn button');


//     // // function add rtl option to element that contain slider
//     // function fixSliderRtl() {
//     //     if (html.dir === 'rtl') {
//     //          console.log(html.dir , html.dir === 'rtl');
//     //         const allSliderBoxes = $('.header__content');
//     //         allSliderBoxes.slick('slickSetOption', 'rtl', true);
//     //     }
//     // }

//     // fixSliderRtl();

//     // function fixed navbar when scroll
//     function fixedElement() {
//         if (window.scrollY > 300) {
//             navbar.classList.add('fixed-navbar');
//         } else {
//             navbar.classList.remove('fixed-navbar');
//         }
//     }

//     // fixed navbar when scroll
//     window.onscroll = fixedElement;

//     // fixed navbar when dom ready
//     fixedElement();

//     // function toggle classes of elements
//     function toggleClasses(element, class1, class2) {
//         if (element.classList.contains(class1)) {
//             element.classList.remove(class1)
//             element.classList.add(class2)
//         } else {
//             element.classList.add(class1)
//             element.classList.remove(class2)
//         }
//     }

//     // close search box
//     closeSearchBox.onclick = () => {
//         $('.search-box').slideUp();
//     }

//     // open search box
//     openSearchBox.onclick = (e) => {
//         e.preventDefault();
//         $('.search-box').slideDown();
//     }

//     // show sidebar when click nav collapse
//     sidebarCollapse.onclick = () => {
//         toggleClasses(sidebar, 'show-sidebar', 'hide-sidebar');
//     };

//     // open and close add comment form
//     addCommentBtn.onclick = () => {
//         $('.add-comment__box').fadeToggle();
//     };

//     // show sidebar when click left btn
//     collapseBtn.onclick = () => {
//         toggleClasses(sidebar, 'show-sidebar', 'hide-sidebar');
//     };

//     // hide sidebar when click close sidebar btn
//     closeSidebarBtn.onclick = () => {
//         toggleClasses(sidebar, 'show-sidebar', 'hide-sidebar');
//     };

//     // show nav menu
//     navCollapse.onclick = () => {
//         toggleClasses(navMenu, 'show-sidebar', 'hide-sidebar');
//     };

//     // hide nav menu
//     closeNavMenu.onclick = () => {
//         toggleClasses(navMenu, 'show-sidebar', 'hide-sidebar');
//     };

//     // nicescroll Plugin
//     $('html').niceScroll({
//         cursorcolor: '#BA2D92',
//         cursorwidth: '6px',
//         zindex: 30,
//         cursorborder:"0",
//     });


//     // preload of page
//     $('.preload .loader').fadeOut(1500, function() {
//         $('.preload').fadeOut(1000);
//     });

//     // general function scroll to element
//     function scrollElement(event) {
//         // disable prevent behavior of element
//         event.preventDefault();

//         // get current data scroll of this element
//         const element = this.dataset.scroll;

//         // get related element with thame data scroll
//         const relatedBox = document.querySelector(`*[data-scroll-target="${element}"]`);

//         if (relatedBox) {
//             // scroll to current element
//             $("html, body").animate({scrollTop: relatedBox.offsetTop}, 'slow');
//         }

//         // return false
//         return false;
//     }

//     elementData.forEach((element) => {
//         element.addEventListener('click', scrollElement);
//     });


//     /*================
//      / Home Page /
//     ================*/

//     /* workFlow */
//     const workFlow = $('.work-flow__process');
//     if (workFlow.length) {
//         workFlow.slick({
//             slidesToShow: 4,
//             slidesToScroll: 1,
//             dots: false,
//             arrows: false,
//             autoplay: true,
//             rtl : html.dir === 'rtl' ,
//             autoplaySpeed: 3000,
//             responsive: [
//                 {
//                     breakpoint: 767,
//                     settings: {
//                         slidesToShow: 1,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 992,
//                     settings: {
//                         slidesToShow: 2,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 1200,
//                     settings: {
//                         slidesToShow: 3,
//                         slidesToScroll: 1,
//                     }
//                 },
//             ]
//         });


//     }

//     /* services */
//     const servicesHome = $('.services-home__cards');

//     if (servicesHome.length) {
//         if (window.outerWidth < 992) {
//             servicesHome.slick({
//                 slidesToShow: 4,
//                 slidesToScroll: 1,
//                 dots: false,
//                 arrows: false,
//                 rtl : html.dir === 'rtl' ,
//                 autoplay: true,
//                 autoplaySpeed: 3000,
//                 responsive: [
//                     {
//                         breakpoint: 767,
//                         settings: {
//                             slidesToShow: 1,
//                             slidesToScroll: 1,
//                         }
//                     },
//                     {
//                         breakpoint: 992,
//                         settings: {
//                             slidesToShow: 2,
//                             slidesToScroll: 1,
//                         }
//                     },
//                 ]
//             });
//         }
//     }

//     /* clientsText */
//     const clientsText = $('.testmonials__text');
//     if (clientsText.length) {
//         clientsText.slick({
//             slidesToShow: 1,
//             slidesToScroll: 1,
//             dots: false,
//             rtl : html.dir === 'rtl' ,
//             arrows: false,
//             autoplay: true,
//             autoplaySpeed: 3000,
//             asNavFor: '.testmonials__clients__items'
//         });
//     }

//     /* clientsImgs */
//     const clientsImgs = $('.testmonials__clients__items');
//     if (clientsImgs.length) {
//         clientsImgs.slick({
//             slidesToShow: 3,
//             slidesToScroll: 1,
//             dots: false,
//             arrows: false,
//             rtl : html.dir === 'rtl' ,
//             autoplay: true,
//             autoplaySpeed: 3000,
//             asNavFor: '.testmonials__text',
//             responsive: [
//                 {
//                     breakpoint: 767,
//                     settings: {
//                         slidesToShow: 1,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 992,
//                     settings: {
//                         slidesToShow: 2,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 1200,
//                     settings: {
//                         slidesToShow: 3,
//                         slidesToScroll: 1,
//                     }
//                 },
//             ]
//         });
//     }


//     const plans = $('.plans');

//     if (plans.length) {
//         const planControlBtn = $('.plans__heading__control a');
//         planControlBtn.on('click', function(e) {
//             e.preventDefault();
//             planControlBtn.not($(this)).removeClass('active');
//             $(this).addClass('active');
//             $(this).attr('data-plan') === 'year' ? $('.plans__heading__control').addClass('enable') : $('.plans__heading__control').removeClass('enable');
//             // $('.plans__cards__item__box__price span').text($(this).attr('data-plan'));
//             $('.plans__cards__item__box__price').hide();
//             $('.plans__cards__item__box__price.'+$(this).attr('data-plan')).show();
//         });



//         $('.plans__cards').slick({
//             slidesToShow: 3,
//             slidesToScroll: 1,
//             dots: false,
//             arrows: false,
//             rtl : html.dir === 'rtl' ,
//             // autoplay: true,
//             autoplaySpeed: 3000,
//             responsive: [
//                 {
//                     breakpoint: 767,
//                     settings: {
//                         slidesToShow: 1,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 992,
//                     settings: {
//                         slidesToShow: 2,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 1200,
//                     settings: {
//                         slidesToShow: 3,
//                         slidesToScroll: 1,
//                     }
//                 },
//             ]
//         });
//     }

//     const blog = $('.blog');

//     if (blog.length) {

//         $('.blog__cards__item__box__content__btn').on('click', function() {
//             const blogImg = $(this).parents('.blog__cards__item__box').find('img').attr('src');
//             const blogDetail = $(this).parents('.blog__cards__item__box__content').find('.blog__cards__item__box__content__detail').text();

//             $('.blog-modal img').attr('src', blogImg);
//             $('.blog-modal p').text(blogDetail);
//         });

//         $('.blog__cards').slick({
//             slidesToShow: 3,
//             slidesToScroll: 1,
//             dots: true,
//             arrows: false,
//             rtl : html.dir === 'rtl' ,
//             autoplay: true,
//             autoplaySpeed: 3000,
//             responsive: [
//                 {
//                     breakpoint: 767,
//                     settings: {
//                         slidesToShow: 1,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 992,
//                     settings: {
//                         slidesToShow: 2,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 1200,
//                     settings: {
//                         slidesToShow: 3,
//                         slidesToScroll: 1,
//                     }
//                 },
//             ]
//         });
//     }

//     const brand = $('.brand');

//     if (brand.length) {



//         $('.brand__cards').slick({
//             slidesToShow: 6,
//             slidesToScroll: 1,
//             dots: false,
//             arrows: false,
//             autoplay: true,
//             rtl : html.dir === 'rtl' ,
//             autoplaySpeed: 3000,
//             responsive: [
//                 {
//                     breakpoint: 767,
//                     settings: {
//                         slidesToShow: 2,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 992,
//                     settings: {
//                         slidesToShow: 3,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 1200,
//                     settings: {
//                         slidesToShow: 4,
//                         slidesToScroll: 1,
//                     }
//                 },
//             ]
//         });
//     }


//     /*================
//      / about Page /
//     ================*/
//     const us_best = $('.us-the-best');

//     if (us_best.length) {



//         $('.us-the-best__process').slick({
//             slidesToShow: 4,
//             slidesToScroll: 1,
//             dots: false,
//             arrows: false,
//             rtl : html.dir === 'rtl' ,
//             autoplay: true,
//             autoplaySpeed: 3000,
//             responsive: [
//                 {
//                     breakpoint: 767,
//                     settings: {
//                         slidesToShow: 1,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 992,
//                     settings: {
//                         slidesToShow: 2,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 1200,
//                     settings: {
//                         slidesToShow: 4,
//                         slidesToScroll: 1,
//                     }
//                 },
//             ]
//         });
//     }

//     /*================
//      / contact Page /
//     ================*/

//     const contactPayments = $('.contact-payments__items');
//     if (contactPayments.length) {
//         contactPayments.slick({
//             slidesToShow: 3,
//             slidesToScroll: 1,
//             dots: false,
//             arrows: false,
//             rtl : html.dir === 'rtl' ,
//             autoplay: true,
//             autoplaySpeed: 3000,
//             responsive: [
//                 {
//                     breakpoint: 767,
//                     settings: {
//                         slidesToShow: 1,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 992,
//                     settings: {
//                         slidesToShow: 2,
//                         slidesToScroll: 1,
//                     }
//                 },
//                 {
//                     breakpoint: 1200,
//                     settings: {
//                         slidesToShow: 3,
//                         slidesToScroll: 1,
//                     }
//                 },
//             ]
//         });
//     }


//     var getTouch = $('.get-touch__form');

//     if (getTouch.length) {
//         getTouch.validate({
//             rules: {
//                 name: {
//                     required: true,
//                 },

//                 email: {
//                     required: true,
//                     email: true,
//                 },
//                 phone: {
//                     required: true,
//                 },
//                 subject: {
//                     required: true,
//                 },
//                 message: {
//                     required: true
//                 },
//             },
//             errorPlacement: function (error, element) {
//                 error.appendTo(element.parent());
//             },
//         });
//     }




//     /*================
//      / register Page /
//     ================*/
//     var register = $('.register-form form');

//     register.validate({
//         rules: {
//             first_name: {
//                 required: true,
//             },
//             last_name: {
//                 required: true,
//             },
//             email: {
//                 required: true,
//                 email: true,
//             },
//             number: {
//                 required: true,
//             },
//             another_number: {
//                 required: true,
//             },
//             password: {
//                 required: true
//             },
//             confirm_password: {
//                 required: true
//             },
//         },
//         errorPlacement: function (error, element) {
//             error.appendTo(element.parent());
//         },
//     });



//    /*******************
//     * Profile Page *
//     ********************/
//    const profileUser = $('.user-profile');
//    if (profileUser.length) {
//         // select all user filter
//         var userFilter = $('.user-profile__left__cat a[data-user-filter]');

//         // edit btn
//         $('.user-profile__right__details__right .edit-btn').click(function() {
//             $('.user-profile__left__cat a[data-user-filter="user-edit"]').click();
//         });
//         $('.user-profile__right__details__right .edit-address').click(function() {
//             $('.user-profile__left__cat a[data-user-filter="address-edit"]').click();
//         });

//         // add active class to current active tab
//         userFilter.on('click', function(e) {

//             e.preventDefault();

//             userFilter.not($(this)).removeClass('active');

//             $(this).addClass('active');

//             userSet();
//         });

//         $('.user-profile__right__details__right .edit-btn').click(function() {
//             $('.user-profile__left__cat a[data-user-filter="user-edit"]').click();
//         });
//         // function control tabs
//         function userSet() {

//             var userFilterLink = $('.user-profile__left__cat a.active').attr('data-user-filter');

//             var relatedContent = $(`div[data-user="${userFilterLink}"]`);

//             allUserContent = $(`div[data-user]`);

//             allUserContent.not(relatedContent).addClass('d-none');

//             relatedContent.removeClass('d-none');
//         }

//         userSet();


//         var userEdit = $('.edit-user');


//         userEdit.validate({
//             rules: {
//                 name: {
//                     required: true,
//                 },
//                 email: {
//                     required: true,
//                     email: true,
//                 },
//                 phone: {
//                     required: true,
//                     number: true,
//                 },
//                 company: {
//                     required: true,
//                 },
//                 password: {
//                     // required: true,
//                     minlength: 8
//                 }
//             },
//             errorPlacement: function (error, element) {
//                 error.appendTo(element.parent());
//             },
//             success: function (label) {
//                 label.addClass("valid").text('success');
//             }
//         });

//         var addressEdit = $('form.edit-address');


//         addressEdit.validate({
//             rules: {
//                 name: {
//                     required: true,
//                 },
//                 government: {
//                     required: true,
//                 },
//                 area: {
//                     required: true,
//                 },
//                 street: {
//                     required: true,
//                 },
//                 'bulding-no': {
//                     required: true,
//                 },
//                 'floor-no': {
//                     required: true,
//                 },
//                 'apartment-no': {
//                     required: true,
//                 }
//             },
//             errorPlacement: function (error, element) {
//                 error.appendTo(element.parent());
//             },
//             success: function (label) {
//                 label.addClass("valid").text('success');
//             }
//         });

//     }









// });

