$(document).ready(function () {
                    $('.slider').slick({
                        dots: false,
                        infinite: true,
                        speed: 300,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                        responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: false
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                    });
                });

                $(document).ready(function () {
                    $('.slider1').slick({
                        dots: false,
                        infinite: true,
                        speed: 300,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                        responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: false
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                    });
                });

$(document).ready(function () {
    $('.slider2').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});