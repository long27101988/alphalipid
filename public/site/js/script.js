var general = {
    setFooterMargin: function() {
        var wWindow = $(window).width();
        if(wWindow > 1023){
            var hImg = $('.footer-bg').height();
            $('.home footer').css('margin-top', -hImg);
            $('.contact footer').css('margin-top', -hImg);
        }else{
            $('.home footer').css('margin-top', 0);
            $('.contact footer').css('margin-top', 0);
        }
        
    },
    toggleShoppingCart: function(){
        $('.shopping-icon').click(function(){
            if(!$('.your-shopping').is(':visible')){
                $('.your-shopping').fadeIn('fast');
            }else{
                $('.your-shopping').fadeOut('fast');
            }
            return false;
        });
    },
    toggleMobileMenu: function(){
        $('.menu-toggle').click(function(){
            if(!$('.main-menu').is(':visible')){
                $('.main-menu').stop().slideDown();
            }else{
                $('.main-menu').stop().slideUp();
            }
        });
    }
};

var news = {
    setMaxHeight: function() {
        $('.news-inner .item h2').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });

        $('.news-inner .item .new-text').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });
    }
};

var faqs = {
    toggleFAQs: function() {
        $('.faqs-qa li').click(function() {
            $('.faqs-q').slideUp('fast');
            if (!$(this).find('.faqs-q').is(':visible')) {
                $(this).find('.faqs-q').stop().slideDown('fast');
            }
            return false;
        });
    }
};

var productDetails = {
    slideImg: function(){
        $('.product-img-inner').owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            pagination: false,
            autoPlay: 3000
        });
    },
    toggleComponents: function(){
        $('.btn-components a').click(function(){
            if(!$('.components-inner').is(':visible')){
                $('.components-inner').stop().slideDown();
                $(this).find('i').removeClass('fa-chevron-down');
                $(this).find('i').addClass('fa-chevron-up');
            }else{
                $('.components-inner').stop().slideUp();
                $(this).find('i').removeClass('fa-chevron-up');
                $(this).find('i').addClass('fa-chevron-down');
            }
            return false;
        });
    }
};

$(document).ready(function() {
    news.setMaxHeight();
    productDetails.slideImg();
    productDetails.toggleComponents();

    faqs.toggleFAQs();

    general.toggleShoppingCart();
    general.toggleMobileMenu();

    $(window).load(function() {
        general.setFooterMargin();
    });

    $(window).resize(function() {
        general.setFooterMargin();
    });

    $('.fancybox-video').fancybox({
        padding: 0
    });

});
