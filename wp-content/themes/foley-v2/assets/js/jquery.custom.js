jQuery(document).ready(function($){

    /* Set cookie for retina displays; refresh if not set -------------------------------------------------------------*/

    if( typeof stagCookies === 'object' && !stagCookies.hasItem('retina') && 'devicePixelRatio' in window && window.devicePixelRatio === 2 ){
        stagCookies.setItem('retina', window.devicePixelRatio);
        window.location.reload();
    }


    /* Mobile Navigation Setup -------------------------------------------------------------*/

    var mobileNav = $('#primary-menu').clone().attr('id', 'mobile-primary-menu');

    $('#primary-menu').supersubs({
        minWidth: 10,
        maxWidth: 14,
        extraWidth: 1
    }).superfish({
        delay: 100,
        animation: {opacity:'show'},
        animationOut:  {opacity:'hide'},
        speed: 'fast',
        autoArrows: false,
        dropShadows: false
    });

    function stag_mobilemenu(){
        "use strict";
        var windowWidth = $(window).width();
        if( windowWidth <= 992 ) {
            if( !$('#mobile-nav').length ) {
                $('<a id="mobile-nav" href="#mobile-primary-menu"><i class="icon icon-navicon"></i></a>').prependTo('#navigation');
                mobileNav.insertAfter('#mobile-nav').wrap('<div id="mobile-primary-menu-wrap" />');
                mobile_responder();
            }
        }else{
            mobileNav.css('display', 'none');
        }
    }
    stag_mobilemenu();

    function mobile_responder(){
        $('#mobile-nav').click(function(e) {
            if( $('body').hasClass('ie8') ) {
                var mobileMenu = $('#mobile-primary-menu');
                if( mobileMenu.css('display') === 'block' ) {
                    mobileMenu.css({
                        'display' : 'none'
                    });
                } else {
                    mobileMenu.css({
                        'display' : 'block',
                        'height' : 'auto',
                        'z-index' : 999,
                        'position' : 'absolute'
                    });
                }
            } else {
                $('#mobile-primary-menu').stop().slideToggle(500);
            }
            e.preventDefault();
        });
    }

    $(window).resize(function() {
        stag_mobilemenu();
    });

    /* Portfolio Magic -------------------------------------------------------------------------*/

    $.fn.Gateway = function() {
        var gateway = $('<div class="gateway-show"></div>');
        var loading = $('<ul class="spinner"><li></li><li></li><li></li></ul><div class="portfolio-loading">Loading...</div>');

        gateway.append(loading);

        return this.each(function(){

            $('.portfolio .portfolio-trigger').on( 'click', function(e){
                e.preventDefault();
                var postid  = $(this).data('id');
                var parent = $(this).parent().parent().parent();
                var that = $(this);

                $('#gateway-portfolio .portfolio, #filterable-portfolio .portfolio').each(function(){
                    $(this).removeClass('open');
                });

                if(parent.next().hasClass('gateway-show')){
                    gateway.toggle();
                }else{
                    gateway.insertAfter(parent).css('display', 'block');
                }

                if(gateway.css('display') === 'block'){
                    gateway.prev().addClass('open');
                }

                $('html, body').animate({
                    scrollTop:gateway.offset().top - $(".grids .open").height()-40
                }, 'medium');

                gateway.html(loading);

                gateway.load(stag.gateway, {
                    id: postid
                });

            });

            $('#gateway-portfolio, #filterable-portfolio').on('click', '.gateway-close a', function(e){
                e.preventDefault();
                gateway.prev().removeClass('open');
                gateway.slideUp();
            });
        });
    };


    $('#gateway-portfolio').Gateway();

    var filterablePortfolio = $('#filterable-portfolio');
    if(filterablePortfolio.data('filter-type') !== "expandable") filterablePortfolio.Gateway();

    /* Portfolio Filter ---------------------------------------------------------------------*/
    if(filterablePortfolio.data('filter-type') === "filterable")
        $('#portfolio-filter a').on('click', function(e){
            e.preventDefault();
            var selector = $(this).data('filter');
            $('#filterable-portfolio').isotope({
                filter: selector,
                layoutMode: 'fitRows',
                hiddenStyle : {
                    opacity: 0,
                    scale : .8
                }
            });
            $(window).resize();
        });

    /* Portfolio Load More ---------------------------------------------------------------------*/
    var load = $('#load-more'),
        page = 1;

    load.on('click', function(e){
        e.preventDefault();
        page++;
        $.post(stag.ajaxurl, { action: 'stag_portfolio_load_more', nonce: stag.nonce, page: page }, function( data ) {
            var content = $(data.content);
            $('#filterable-portfolio').append(content);
            if(page >= data.pages) load.fadeOut();
        }, 'json').done(function(){
            if(filterablePortfolio.data('filter-type') !== "expandable") filterablePortfolio.Gateway();
        });
    });

    /* FitVids ------------------------------------------------------------------------------*/
    $("#primary, .entry-content").fitVids();

});

jQuery(window).load(function() {
    jQuery('.flexslider').flexslider({
        directionNav: false,
        smoothHeight: true
    });
});
