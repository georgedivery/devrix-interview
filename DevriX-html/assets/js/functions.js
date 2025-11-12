; (function ($, window, document, undefined) {
	var $win = $(window);
	var $doc = $(document);

	$doc.ready(function () {

        $('.btn-burger').on('click', function(){
            $(this).toggleClass('open')
            $('.header-nav').slideToggle()
        });

        $('.btn-header-search').on('click', function(){
            $(this).toggleClass('open')
            $('.header-search').slideToggle()
        });

        // select your header or whatever element you wish
        const header = document.querySelector("#header");
        const headerNavOuter = document.querySelector('.header-nav-outer');
        const headerNav = headerNavOuter ? headerNavOuter.querySelector('.header-nav') : null;

        if (headerNavOuter && headerNav) {
            headerNavOuter.style.height = `${headerNav.offsetHeight}px`;
        }

        const headroom = new Headroom(header);
        headroom.init();

        $('.section_three-news .list-news').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            dots: false,
            autoplaySpeed: 2000,
            responsive: [
                { breakpoint: 1024, settings: { slidesToShow: 2,   dots: true, } } ,
                { breakpoint: 767, settings: { slidesToShow: 1,   dots: true, } } 
            ]
        });

        $('.section_four-news .list-news').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            dots: false,
            autoplaySpeed: 2000,
            responsive: [
                { breakpoint: 1200, settings: { slidesToShow: 3,   dots: true, } } ,
                { breakpoint: 1024, settings: { slidesToShow: 2,   dots: true, } } ,
                { breakpoint: 767, settings: { slidesToShow: 1,   dots: true, } } 
            ]
        });

        $('.list-latest-news-mobile').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            dots: false,
            autoplaySpeed: 2000,
            responsive: [ 
                { breakpoint: 480, settings: { slidesToShow: 1,   dots: true, } } 
            ]
        });

        var $fiveNews = $('.section_five-news .section-content .list-news');

        function toggleFiveNewsSlider() {
            if ($(window).width() < 767) {
                if (!$fiveNews.hasClass('slick-initialized')) {
                    $fiveNews.slick({
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        autoplay: true,
                        arrows: false,
                        dots: true,
                        autoplaySpeed: 2000,
                        responsive: [ 
                            { breakpoint: 480, settings: { slidesToShow: 1,   dots: true, } } 
                        ]
                    });
                }
            } else if ($fiveNews.hasClass('slick-initialized')) {
                $fiveNews.slick('unslick');
            }
        }

        toggleFiveNewsSlider();
        $(window).on('resize orientationchange', toggleFiveNewsSlider);

        
	}); //jQuery end
})(jQuery, window, document);  