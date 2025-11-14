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

        // Subscribe popup
        $('.btn_subscribe').on('click', function(e){
            e.preventDefault();
            $('.popup-subscribe').addClass('active');
            $('body').addClass('popup-open');
        });

        $('.popup-subscribe-close, .popup-subscribe-overlay').on('click', function(){
            $('.popup-subscribe').removeClass('active');
            $('body').removeClass('popup-open');
        }); 
        
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
                { breakpoint: 767,  settings: { slidesToShow: 1,   dots: true, } } 
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

        // Initialize Select2 for search
        if ($('#search-select').length && typeof $.fn.select2 !== 'undefined' && typeof devrixAjax !== 'undefined') {
            $('#search-select').select2({
                placeholder: 'Search...',
                allowClear: true,
                minimumInputLength: 2,
                ajax: {
                    url: devrixAjax.ajaxurl,
                    dataType: 'json',
                    delay: 300,
                    data: function(params) {
                        return {
                            q: params.term,
                            action: 'devrix_select2_search'
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.results
                        };
                    },
                    cache: true
                }
            }).on('select2:select', function(e) {
                var data = e.params.data;
                if (data.url) {
                    window.location.href = data.url;
                }
            });
        }
        
	}); //jQuery end
})(jQuery, window, document);  