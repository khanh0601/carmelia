var min_sm = 576;

$(window).on('resize',function() {
    exploration_make_slider();
    card_news_make_slider();
    card_default_make_slider();
    _scroll_back_text();
    calculate_map();
});
$(document).scroll(function () {
    _scroll_back_text();
});

function calculate_map() {

    if($('.location-map').length)
    {
        var current_width = $('.location-map').width();
        var design_width = 656;

        var ratio = current_width/design_width;

        /*attribute*/
        var design_top = -1055;
        var design_bottom = -661;
        var design_left= -1065;
        var design_right= -715;

        var curren_top = design_top*ratio;
        var curren_bottom = design_bottom*ratio;
        var curren_left = design_left*ratio;
        var curren_right = design_right*ratio;

        $('.location-map-background').css({top:curren_top,bottom:curren_bottom,left:curren_left,right:curren_right})
    }
}
function _scroll_back_text()
{
    if($('.back-text').length)
    {
        var height =$('.back-text').height();
        var parent_height = $('.back-text').parent().outerHeight();
        var max_top = (parent_height-height)/2;

        var e, a = $(window).height(), n = a / 3;
        e = $(window).scrollTop();

        $(".back-text").each(function () {

            var a = $(this), o = a.parent(), s = o.offset().top;
            var top_back_text = -(s - e) + n;
            // a.css({top: top_back_text + "px"});
            /*css opacity*/
            var percent =0;

            // parent_height = parent_height/2;
            if(top_back_text < max_top)
            {
                percent = top_back_text/max_top;
            }
            else
            {
                percent = 1-(top_back_text-max_top)/max_top;
            }


            if(percent>1)
            {
                percent = 1;
            }
            else if(percent<0)
            {
                percent =0;
            }

            if(percent>0)
            {
                a.css({color:'rgba(255,255,255,'+percent+')',display:'block'});
            }
            else
            {
                a.css({color:'rgba(255,255,255,0)',display:'none'});
            }

        });
    }
}

$(document).ready(function() {
	
	$('.modal-btn-scroll').click(function () {
        $('#pageModal').modal('hide');
    });
	

    if($("#pageModal").length)
    {
		setTimeout(function() {
			$('#pageModal').modal('show');
		}, 3000); 
    }

    $('.sub-menu').addClass(' animated fadeInLeft faster hidden');
    $('.footer-form-checkin label').addClass('active');

    $('.gallery-grid-container').lightGallery({
        selector: '.gallery-grid-item a'
    });


    $('.pagination-ajax li').click(function (e) {
        var currentelement= $(this);
        if($(this).hasClass('disabled') || $(this).hasClass('active'))
        {
            return;
        }

        var page_clicked = $(this).data('page');
        var current_page = $(this).parent().data('current');
        var total_page = $(this).parent().data('total');
        var page = page_clicked;
        if(page_clicked == "pre")
        {
            /*pre button*/
            page = current_page -1;
        }
        else if(page_clicked == "next")
        {
            page = current_page +1;
        }

        /*remove active*/
        $(this).parent().find('li').each(function () {
            $(this).removeClass('active');
        });

        $(this).parent().find('[data-page='+page+']').addClass('active');

        /*set current data*/
        $(this).parent().data('current',page);

        /*disable remove disable pre, next button*/
        if(page==1)
        {
            $(this).parent().find('[data-page=pre]').addClass('disabled');
        }
        else {
            $(this).parent().find('[data-page=pre]').removeClass('disabled');
        }

        if(page==total_page)
        {
            $(this).parent().find('[data-page=next]').addClass('disabled');
        }
        else {
            $(this).parent().find('[data-page=next]').removeClass('disabled');
        }

        $(this).parent().parent().find('.gallery-grid-container').addClass('ajax-loading');
        $(this).parent().find('li').addClass('disabled');
        var url = $(this).parent().data('url');
        var gallery_id =  $(this).parent().data('galleryid');

        /*ajax call load data*/
        $.ajax({
            type: "POST",
            // dataType : "json",
            url: url,
            data: {
                action: 'carmelina_load_grid_gallery',
                page: page,
                gallery: gallery_id
            },
            success: function(response)
            {
                if(response.success)
                {
                    currentelement.parent().parent().find('.gallery-grid-container').empty();
                    /*replace images*/
                    for(var i =0; i<response.data.length;i++)
                    {
                        var item = '<div class="gallery-grid-item">\n' +
                            '<a href="'+response.data[i].url+'"><img src="'+response.data[i].sizes.medium_large+'" alt="'+response.data[i].title+'"></a>\n' +
                            '</div>';
                        currentelement.parent().parent().find('.gallery-grid-container').append(item);
                    }
                }
            },
            error:function (jqXHR, statusText, errorThrown) {
                console.log( errorThrown );
            },

        }).done(function () {
            currentelement.parent().find('li').removeClass('disabled');
            currentelement.parent().parent().find('.gallery-grid-container').removeClass('ajax-loading');

            if(currentelement.parent().data('current')==1)
            {
                currentelement.parent().find('[data-page=pre]').addClass('disabled');
            }else if(currentelement.parent().data('current')==currentelement.parent().data('total'))
            {
                currentelement.parent().find('[data-page=next]').addClass('disabled');
            }
        });

        e.preventDefault();
    });

    $('#checkin').daterangepicker({
        "autoApply": true,
        "locale": {
            "format": "DD/MM/YY",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Su",
                "Mo",
                "Tu",
                "We",
                "Th",
                "Fr",
                "Sa"
            ],
            "monthNames": [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ],
            "firstDay": 1
        },
        "alwaysShowCalendars": true,
        "startDate": moment(),
        "endDate": moment().add(1,'day'),
        "minDate": moment(),
        "opens": "left"
    }, function(start, end, label) {
        /*change all date picker*/
        $('.check-in-date-dd').text(start.format('DD'));
        $('.check-out-date-dd').text(end.format('DD'));

        $('.check-in-date-mm').text(_switch_month(start));
        $('.check-out-date-mm').text(_switch_month(end));
    });

    _set_init_date();
    $('.check-in-date,.check-out-date').daterangepicker({
        "autoApply": true,
        "locale": {
            "format": "DD/MM/YY",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Su",
                "Mo",
                "Tu",
                "We",
                "Th",
                "Fr",
                "Sa"
            ],
            "monthNames": [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ],
            "firstDay": 1
        },
        "alwaysShowCalendars": true,
        "startDate": moment(),
        "endDate": moment().add(1,'day'),
        "minDate": moment(),
        "opens": "left"
    }, function(start, end, label) {
        /*save selection to footer*/

        $('#checkin').val( start.format('DD/MM/YY') + ' - ' + end.format('DD/MM/YY'));
        /*change all date picker*/
        $('.check-in-date-dd').text(start.format('DD'));
        $('.check-out-date-dd').text(end.format('DD'));

        $('.check-in-date-mm').text(_switch_month(start));
        $('.check-out-date-mm').text(_switch_month(end));

    });
    /*set guest number select*/
    $('.guest-number-select').change(function () {
        $('.guest-number-select').val($(this).val());
        /*set footer*/
        $('#footer-form-guest').val($(this).val());
    });

    $('#footer-form-guest').change(function () {
        $('.guest-number-select').val($(this).val());
    });

    /*set room number select*/
    $('.room-number-select').change(function () {
        $('.room-number-select').val($(this).val());
        /*set footer*/
        $('#footer-form-room').val($(this).val());
    });

    $('#footer-form-room').change(function () {
        $('.room-number-select').val($(this).val());
    });



    // Select all links with hashes
    $('.scroll')
        .click(function(event) {
            var target = $($(this).data('scroll'));

            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();

                var top = target.offset().top;
                var fixed_height = 70;

                if(target.attr('id')=="checkin-form")
                {
                    top = top - fixed_height -40;
                }
                else if(target.attr('id')=="resort-intro-content" || target.attr('id')=="dining-intro-content")
                {
                    var a = $(window).height();
                    var current_height = target.outerHeight();
                    top = top - (a-current_height)/2 ;
                }
                else if (target.attr('id')=="page-content")
                {
                    top = top -70;
                }
                $('html, body').animate({
                    scrollTop: top
                }, 1000);
            }
        });

    $('.destination-slider').each(function () {
        var dotted_id= '#'+$(this).data('dotted');
        var arrow= '#'+$(this).data('arrow');
        var arrow_pre = arrow+"-pre";
        var arrow_next = arrow+"-next";

        $(this).slick({
            dots: true,
            arrows: true,
            autoplay: true,
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow:arrow_pre,
            nextArrow:arrow_next,
            appendDots : dotted_id,
        });
    });

    $('.calendar-content-slider').slick({
        dots: false,
        arrows: true,
        autoplay: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow:'.calendar-filter-arrow-pre',
        nextArrow:'.calendar-filter-arrow-next',
        mobileFirst:true,
        responsive: [
            {
                breakpoint: 2399,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 1999,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 1599,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 1439,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 1199,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 2
                }
            }
            ,
            {
                breakpoint: 767,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1
                }
            }
        ]
    });

    if($('.home-gallery-mobile-slider').length)
    {
        $('.home-gallery-mobile-slider').slick({
            dots: false,
            arrows: true,
            autoplay: false,
            infinite: false ,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow:'.calendar-filter-arrow-pre',
            nextArrow:'.calendar-filter-arrow-next',
            mobileFirst:true,
            centerMode: true,
            initialSlide: 8,
        });
    }

    $('.calendar-content-slider').slick('slickFilter', "." + $('#calendar-filter-m').val());

    $('#calendar-filter-m').on('change', function() {
        var filterClass = $(this).val();

        $('.calendar-content-slider').slick('slickUnfilter');
        $('.calendar-content-slider').slick('slickFilter', "." + filterClass);
    });
    $(window).trigger('resize');
    $(window).trigger('scroll');


});

/*exploration*/
$('.section-resort a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    exploration_reinit_slider();
});

/*destination*/
$('.session-destination a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    destination_reinit_slider();
    /*filter room type*/
    $('#footer-form-room-type').val($(this).data('room-type'));
});

$('#footer-form-room-type').change(function () {
    var current_room =  $(this).val();
    $(".session-destination").find("[data-room-type='" + current_room + "']").click();
});
function destination_reinit_slider(){
    $('.destination-slider').slick('unslick');
    $('.destination-slider').each(function () {
        var dotted_id= '#'+$(this).data('dotted');
        var arrow= '#'+$(this).data('arrow');
        var arrow_pre = arrow+"-pre";
        var arrow_next = arrow+"-next";

        $(this).slick({
            dots: true,
            arrows: true,
            autoplay: false,
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow:arrow_pre,
            nextArrow:arrow_next,
            appendDots : dotted_id,
        });
    });

}
function exploration_reinit_slider() {

    if($(window).width()>=min_sm && $('.exploration-group-items').length)
    {
        if($('.exploration-group-items').hasClass('slick-initialized'))
        {
            $('.exploration-group-items').slick('unslick');
        }
    }
    else if($(window).width()<min_sm && $('.exploration-group-items').length)
    {
        $('.exploration-group-items').slick('unslick');
        $('.exploration-group-items').slick({
            dots: false,
            arrows: false,
            autoplay: false,
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1
        });

    }

}
function exploration_make_slider() {
    if($(window).width()>=min_sm && $('.exploration-group-items').length)
    {
        if($('.exploration-group-items').hasClass('slick-initialized'))
        {
            $('.exploration-group-items').slick('unslick');
        }
    }
    else if($(window).width()<min_sm && $('.exploration-group-items').length)
    {
        if(!$('.exploration-group-items').hasClass('slick-initialized'))
        {
            $('.exploration-group-items').slick({
                dots: false,
                arrows: false,
                autoplay: false,
                infinite: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1
            });
        }

    }
}

$('.menu-icon').click(function () {
    $("#main-menu-right-leaf").addClass("animated fadeInRight");
    $("#main-menu-right-container").addClass("animated fadeInLeft");
    $("#main-menu-left").addClass("animated fadeInLeft");

    $("#main-menu").css('width',"100%");
});

/* Close when someone clicks on the "x" symbol inside the overlay */
$('.main-menu-close').click(function () {
    $("#main-menu-right-leaf").removeClass("animated fadeInRight");
    $("#main-menu-right-container").removeClass("animated fadeInLeft");
    $("#main-menu-left").removeClass("animated fadeInLeft");
    $("#main-menu").css('width',"0");
});

/*sub menu*/
$('.main-menu-left-root .menu-item-has-children > a').click(function () {
    var parent = $(this).parent();
    if(parent.hasClass('active'))
    {
        parent.removeClass('active');
        parent.find('.sub-menu').addClass('hidden');
    }
    else
    {
        parent.addClass('active');
        parent.find('.sub-menu').removeClass('hidden');
    }
});


/*card news*/

function card_news_make_slider() {
    if($(window).width()>=768 && $('.list-card-news').length)
    {
        if($('.list-card-news').hasClass('slick-initialized'))
        {
            $('.list-card-news').slick('unslick');
        }
    }
    else if($(window).width()<768 && $('.list-card-news').length)
    {
        if(!$('.list-card-news').hasClass('slick-initialized'))
        {
            $('.list-card-news').on('init', function(event,slick){
                $('.list-card-news-info h3').text($('.slick-current .card-news-info h3').text());
                $('.list-card-news-info-date').text($('.slick-current .card-news-info .card-news-info-date').text());
                $('.list-card-news-info-description').text($('.slick-current .card-news-info .card-news-info-description').text());
                $('.list-card-news-info-container a').attr('href',$('.slick-current .card-news-info a').attr('href'));
            });
            $('.list-card-news').slick({
                dots: true,
                appendDots : '.list-card-news-dotted',
                autoplay: false,
                centerMode: true,
                centerPadding: '0px',
                infinite: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow:'.list-card-news-nav-pre',
                nextArrow:'.list-card-news-nav-next',
            });
            $('.list-card-news').on('afterChange', function(event, slick, currentSlide, nextSlide){
                $('.list-card-news-info h3').text($('.slick-current .card-news-info h3').text());
                $('.list-card-news-info-date').text($('.slick-current .card-news-info .card-news-info-date').text());
                $('.list-card-news-info-description').text($('.slick-current .card-news-info .card-news-info-description').text());
                $('.list-card-news-info-container a').attr('href',$('.slick-current .card-news-info a').attr('href'));
            });
        }
    }
}

function _switch_month(date) {
    var lang = $('body').data('language');
    if(lang == 'vi'){
        return 'T'+date.format('MM');
    }
    else
    {
        return date.format('MMM');
    }
}

function _set_init_date() {
    var date_init = moment();
    var date_init_end = moment().add(1,'day');
    /*change all date picker*/
    $('.check-in-date-dd').text(date_init.format('DD'));
    $('.check-out-date-dd').text(date_init_end.format('DD'));

    $('.check-in-date-mm').text(_switch_month(date_init));
    $('.check-out-date-mm').text(_switch_month(date_init_end));
}

function card_default_make_slider() {
    if($(window).width()>=768 && $('.list-card-default').length)
    {
        if($('.list-card-default').hasClass('slick-initialized'))
        {
            $('.list-card-default').slick('unslick');
        }
    }
    else if($(window).width()<768 && $('.list-card-default').length)
    {
        if(!$('.list-card-default').hasClass('slick-initialized'))
        {
            $('.list-card-default').on('init', function(event,slick){
                var info_mobile = $(this).data('info');
                info_mobile = '#' + info_mobile;
                $(info_mobile + ' .list-card-default-info-container').html($(this).find('.slick-current .card-default-info-container').html());
            });

            $('.list-card-default').each(function () {
                var dotted_id= '#'+$(this).data('dotted');
                var arrow= '#'+$(this).data('arrow');
                var arrow_pre = arrow+"-pre";
                var arrow_next = arrow+"-next";

                $(this).slick({
                    dots: true,
                    arrows: true,
                    autoplay: false,
                    infinite: false,
                    centerMode: true,
                    centerPadding: '0px',
                    speed: 300,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    prevArrow:arrow_pre,
                    nextArrow:arrow_next,
                    appendDots : dotted_id,
                });
            });


            $('.list-card-default').on('afterChange', function(event,slick){
                var info_mobile = $(this).data('info');
                info_mobile = '#' + info_mobile;
                $(info_mobile + ' .list-card-default-info-container').html($(this).find('.slick-current .card-default-info-container').html());
            });
        }
    }
}


$('.gallery-default').slick({
    dots: true,
    appendDots : '.gallery-default-dotted',
    autoplay: true,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow:'.gallery-default-nav-pre',
    nextArrow:'.gallery-default-nav-next',
    responsive: [
        {
            breakpoint: 575,
            settings: {
                arrows: false
            }
        }
    ]
});

$('.dining-offer-content-slider').slick({
    dots: false,
    arrows: true,
    autoplay: false,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow:'.dining-offer-filter-arrow-pre',
    nextArrow:'.dining-offer-filter-arrow-next',
    mobileFirst:true,
});




/*acomodation page*/
$('#accomodation-btn-seemore-feature').click(function () {
    var target="#" + $(this).data('target');
    if($(this).hasClass('active'))
    {
        $(this).removeClass("animated fadeInTop slower");
        $(this).removeClass('active');
        $(target).css('display',"none");
        $(this).text($(this).data('seemore'));
    }
    else
    {
        $(this).addClass("animated fadeInTop slower");
        $(this).addClass('active');
        $(target).css('display',"block");
        $(this).text($(this).data('seeless'));
    }
});

$("#footer-subcriber-form").submit(function(e) {
    var form = $(this);
    var url = form.attr('action');

    $('#email-signup-helper-text').addClass('hidden');

    $.ajax({
        type: "POST",
        dataType : "json",
        url: url,
        data: form.serialize(),
        success: function(response)
        {
            if(response.success)
            {
                $('#email_subcirbe_token').val(response.data);
                var text = $("#footer-subcriber-form").data('thanks');
                $('#email-signup-helper-text').removeClass('hidden');
                $('#email-signup-helper-text').text(text);
            }
            else
            {
                var text = $("#footer-subcriber-form").data(response.data);
                $('#email-signup-helper-text').removeClass('hidden');
                $('#email-signup-helper-text').text(text);
            }
        },
        error:function (jqXHR, statusText, errorThrown) {
            console.log( errorThrown );
        }
    });
    e.preventDefault();
});

$("#checkin-form").submit(function(e) {
    if(!$(this).hasClass('active'))
    {
        e.preventDefault();
        return false;
    }
    $(this).removeClass('active');
    $('.checkin-form-submit').addClass('loading');
    var form = $(this);
    var url = form.attr('action');

    /*remove all error*/
    $('#infoform-success').addClass('hidden');
    $('#infoform-error-fullname').addClass('hidden');
    $('#infoform-error-email').addClass('hidden');
    $('#infoform-error-phone').addClass('hidden');
    $('#infoform-error-date').addClass('hidden');
    $('#infoform-error-recaptcha').addClass('hidden');

    $.ajax({
        type: "POST",
        dataType : "json",
        url: url,
        data: form.serialize(),
        success: function(response)
        {
            if(response.success)
            {
                $("#infoform-success").removeClass('hidden');
                $("#full_name").val("");
                $("#checkin-email").val("");
                $("#phone_number").val("");
            }
            else {
                /*display error*/
                for(var key in response.data)
                {
                    var target_id = "#"+key;

                    /*check exist*/
                    if($(target_id).length)
                    {
                        /*check exist data attribute*/
                        var text = $(target_id).data(response.data[key]);
                        if(text !== undefined)
                        {
                            $(target_id).text(text);
                            $(target_id).removeClass('hidden');
                        }
                    }
                }
            }
        },
        error:function (jqXHR, statusText, errorThrown) {
            console.log( errorThrown );
        },

    }).done(function () {
        $("#checkin-form").addClass('active');
        $('.checkin-form-submit').removeClass('loading');
        grecaptcha.reset();
    });
    e.preventDefault();
});

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        document.getElementById("scrollTop").style.display = "block";
        $('.header-menu').addClass('fixed');
        $('header').addClass('fixed');
    } else {
        document.getElementById("scrollTop").style.display = "none";
        $('.header-menu').removeClass('fixed');
        $('header').removeClass('fixed');
    }
}
$(".back-to-top").click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 1000);
});
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}