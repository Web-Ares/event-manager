var mySwiper, scrollWidth;
$(function () {

    var div = document.createElement('div');

    //scroll width
    div.style.overflowY = 'scroll';
    div.style.width = '50px';
    div.style.height = '50px';
    div.style.visibility = 'hidden';

    document.body.appendChild(div);
    scrollWidth = div.offsetWidth - div.clientWidth;
    document.body.removeChild(div);
    //scroll width

    $('.search-btn').on({
        'click': function () {
            var curElem = $('.search'),
                    curBtn = $(this);

            if (curElem.hasClass('open')) {
                curElem.removeClass('open');
                curBtn.removeClass('open');
            } else {
                curElem.addClass('open');
                curBtn.addClass('open');
            }

        }
    });

    $('.menu-btn').on({
        'click': function () {
            var curElem = $('.menu'),
                    curBtn = $(this);

            if (curElem.hasClass('open')) {
                curElem.removeClass('open');
                curBtn.removeClass('open');
            } else {
                curElem.addClass('open');
                curBtn.addClass('open');
            }

        }
    });

    $('.dropdown dt').on({
        'click': function () {
            var curElem = $(this).parent();

            if (curElem.hasClass('open')) {
                curElem.removeClass('open');
                curElem.find('dd').slideUp();
            } else {
                $('.dropdown').removeClass('open');
                $('.dropdown dd').css({display: 'none'});
                curElem.addClass('open');
                curElem.find('dd').slideDown();

                if (!$(this).parent('dl').hasClass('subscribe')) {
                    setTimeout(
                            function () {
                                if (curElem.hasClass('open')) {
                                    curElem.removeClass('open');
                                    curElem.find('dd').slideUp();
                                }
                            },
                            10000);
                }
            }
        }
    });

    $('.streams dt').hoverIntent({
        over: function (e) {
            var curElem = this;
            $('.streams dt').removeClass('active');
            jQuery(this).next('dd').fadeIn('slow', function () {
                $(curElem).addClass('active');
            });
        },
        out: function (e) {
            var curElem = this;
            if (!$(this).next('dd').is(':hover')) {
                jQuery(this).next('dd').fadeOut('slow', function () {
                    $(curElem).removeClass('active');
                });
            }
        },
        timeout: 500
    });

    $('.streams dd').hoverIntent({
        out: function (e) {
            jQuery(this).fadeOut('slow');
        },
        timeout: 500
    });

    // original

    /*var curHoverElem;
     
     $('.streams dt').on({
     'mouseover': function (e) {
     var curElem = $(this);
     if (curElem.hasClass('active')) {
     if (!jQuery(e.target).parent('dt')) {
     curElem.removeClass('active');
     }
     } else {
     $('.streams dt').removeClass('active');
     curElem.addClass('active');
     }
     },
     'mouseleave': function () {
     curHoverElem = $(this);
     setTimeout(function () {
     if (!$(curHoverElem).next('dd').is(':hover')) {
     curHoverElem.removeClass('active');
     }
     }, 300);
     }
     });
     
     $('.streams dd').on({
     'mouseleave': function () {
     curHoverElem = $(this);
     setTimeout(function () {
     $(curHoverElem).prev('dt').removeClass('active');
     }, 300);
     
     }
     });*/

    if ($('.streams').length) {

        $.each($('.streams dd'), function () {
            var elems = $(this);

            var flag = true;

            $.each(elems.find('.streams__menu a'), function () {
                var curElem = $(this);

                if (curElem.hasClass('active')) {
                    flag = false;
                }

            });

            if (flag) {
                elems.find('.streams__menu a:first-child').addClass('active');
                elems.find('.streams__container li:first-child').addClass('active');
            }

        });

    }

    $('.streams__menu a').on({
        'mouseover': function () {
            var curElem = $(this),
                    curElemIndex = curElem.index(),
                    curParent = curElem.parents('.streams dd');

            if (!curElem.hasClass('active')) {
                curParent.find('.streams__menu a').removeClass('active');
                curParent.find('.streams__container li').removeClass('active');
                curParent.find('.streams__container li').eq(curElemIndex).addClass('active');
                curElem.addClass('active');
            }

            return false;

        }
    });

    $(".menu").niceScroll({
        horizrailenabled: false
    });

    if ($('.resources .swiper-container').length) {
        if ($(window).width() < 768) {
            mySwiper = new Swiper('.resources .swiper-container', {
                pagination: '.swiper-pagination',
                paginationClickable: true,
                spaceBetween: 15,
                slidesPerView: 1.5
            });
        }
    }

    if ($('.videos .swiper-container').length) {

        var sliderElem = [];

        $.each($('.videos__item'), function (i) {
            var curElem = $(this);
            sliderElem[i] = curElem;
            curElem.remove();
        });

        function random(min, max) {
            var range = max - min + 1;
            return Math.floor(Math.random() * range) + min;
        }

        function shuffle(arr) {
            var r_i;
            var v;
            for (var i = 0; i < arr.length - 1; i++) {
                r_i = random(0, arr.length - 1);
                v = arr[r_i];
                arr[r_i] = arr[arr.length - 1];
                arr[arr.length - 1] = v;
            }
            return arr;
        }

        shuffle(sliderElem);

        for (var i = 0; i < sliderElem.length; i++) {
            $('.videos .swiper-wrapper').append(sliderElem[i]);
        }

        slider = new Swiper('.videos .swiper-container', {
            slidesPerView: 4,
            centeredSlides: false,
            paginationClickable: true,
            loop: true,
            spaceBetween: 0,
            autoplay: 5000,
            speed: 600,
            nextButton: $('.videos__next'),
            prevButton: $('.videos__prev')
        });

    }

    $.each($(".your-reaction__level"), function () {
        new ShowRating($(this));
    });

    $.each($('.single-post'), function () {
        new ShowContent($(this))
    });

    $('.popup').each(function () {
        new Popup($(this));
    });

    $('.connect-with__subscribe').each(function () {
        new Subscribe($(this));
    });

    $('.filter > dt').on({
        'click': function () {
            var curElem = $(this).parent();

            if (curElem.hasClass('filter_open')) {
                curElem.removeClass('filter_open');
                curElem.find('>dd').slideUp();
            } else {
                $('.dropdown dd').css({display: 'none'});
                curElem.addClass('filter_open');
                curElem.find('dd').slideDown();
            }
        }
    });

    $('.sponsored').tooltip();
    $('.subscribe a').not('.form').on('click', function (e) {
        var nextForm = $(this).next('.form');
        if (nextForm.length) {
            e.preventDefault();
            $(this).hide();
            nextForm.css('display', 'block');
        }
    });

    $('.popup_login-FB .popup__btn').on('click', function (e) {
        e.preventDefault();
        $('.wp-social-login-provider.wp-social-login-provider-facebook').trigger('click');
    });
    $('body.logged-in').on('click', '.your-reaction__level .btn', function (e) {
        e.preventDefault();
        var control = $(this);
        $.ajax({
            url: ajax_url,
            data: {
                current_id: $(this).attr('data-id'),
                reaction: $(this).attr('data-reaction'),
                action: 'register_reaction'
            },
            dataType: 'json',
            timeout: 20000,
            type: "GET",
            success: function (data) {
                if (data != '') {
                    control.next('.your-reaction__index').find('.your-reaction__index-value').html(data[$(control).attr('data-reaction')]);
                    control.next('.your-reaction__index').attr('data-index', data['max'] > 0 ? data[$(control).attr('data-reaction')] * 100 / data['max'] : 0);
                    $.each($(".your-reaction__level"), function () {
                        new ShowRating($(this));
                    });
                }
                $('.popup_login-FB-like').addClass('popup_opened');
            },
            error: function (XMLHttpRequest) {
                if (XMLHttpRequest.statusText != "abort") {
                    alert("ERROR!");
                }
            }
        });
    });
    /*$('.streams .close-button').on('click', function () {
     $(this).closest('dd').prev('dt').click();
     });*/

    $(document.body).on('click', '.comments .comments-title', function (e) {
        e.preventDefault();
        var commentsWrap = $(this).closest('.comments').find('.comments__wrap');
        if (commentsWrap.is(':visible')) {
            commentsWrap.slideUp();
        } else {
            commentsWrap.slideDown();
        }
    });

    //search form
    $('#searchform .dropdown dd a').on('click', function (e) {
        $('#searchform [name=cat]').val('');
        $('#searchform [name=post_type]').val('post,pages');
        $('#searchform [name=webinar]').val('0');
        
        switch($(this).attr('data-search')){
            case 'webinars':
                $('#searchform [name=webinar]').val('1');
                break;
            case 'resources':
                $('#searchform [name=post_type]').val('resource');
                break;
            case 'reviews':
                $('#searchform [name=cat]').val('1565');
                break;
        }
        
        $('#searchform .dropdown dt a').text($(this).text());
        return false;
    });
});

$(window).on({
    'load': function () {
        $('.menu').css({height: $(window).outerHeight() - 60});

        if ($(window).width() > (1023 - scrollWidth)) {
            var curScroll = $(window).scrollTop(),
                    curHeaderLayout = $('.site__header-layout'),
                    curHeader = $('.site__header');

            if (curScroll < curHeader.outerHeight()) {
                curHeader.addClass('static');
                curHeaderLayout.css({top: -curScroll});
            } else {
                curHeader.removeClass('static');
                curHeaderLayout.css({top: 0});
            }
        }

    },
    'resize': function () {
        $('.menu').css({height: $(window).outerHeight() - 60});

        if ($('.swiper-container').length) {

            if ($(window).width() > 767 - scrollWidth) {

                if (typeof mySwiper != 'undefined') {
                    mySwiper.destroy();
                    mySwiper = undefined;
                    $('.swiper-wrapper').removeAttr('style');
                    $('.swiper-slide').removeAttr('style');
                }

            } else {
                if (typeof mySwiper == 'undefined') {
                    mySwiper = new Swiper('.swiper-container', {
                        pagination: '.swiper-pagination',
                        paginationClickable: true,
                        spaceBetween: 15,
                        slidesPerView: 1.5
                    });
                }
            }

        }

    },
    'scroll': function () {

        if ($(window).width() > (1023 - scrollWidth)) {
            var curScroll = $(window).scrollTop(),
                    curHeaderLayout = $('.site__header-layout'),
                    curHeader = $('.site__header');

            if (curScroll < curHeader.outerHeight()) {
                curHeader.addClass('static');
                curHeaderLayout.css({top: -curScroll});
            } else {
                curHeader.removeClass('static');
                curHeaderLayout.css({top: 0});
            }
        }


    }
});

var ShowRating = function (obj) {
    this.obj = obj;
    this.init();
};
ShowRating.prototype = {
    init: function () {
        var self = this;
        self.core = self.core();
        self.core.build();
    },
    core: function () {
        var self = this;

        return {
            build: function () {
                self.indexWrap = self.obj.find(".your-reaction__index");
                self.index = self.indexWrap.data("index");
                self.mobileWrap = self.obj.find(".your-reaction__index-mobile");
                self.val = self.obj.find(".your-reaction__index-value");
                self.tabletWrap = self.obj.find(".your-reaction__index-tablet");
                self.mobileWrap.css({
                    "width": self.index + "%"
                });
                self.tabletWrap.css({
                    "height": self.index + "%"
                });
                self.val.css({
                    "left": self.index + "%",
                    "bottom": self.index + "%"
                });
            }
        };
    }
};

var ShowContent = function (obj) {
    this.obj = obj;

    this.init();
};
ShowContent.prototype = {
    init: function () {
        var self = this;
        self.core = self.core();
        self.core.build();
    },
    core: function () {
        var request = new XMLHttpRequest(),
                self = this;

        return {
            build: function () {
                self.core.AddEvents();
            },
            AddEvents: function () {

                /*$(window).on({
                 scroll: function () {
                 var scrollPosition = $(window).scrollTop(),
                 docHeight = $(document).height(),
                 windowHeight = $(window).height();
                 if (scrollPosition > docHeight - windowHeight - 50) {
                 self.core.addContent();
                 }
                 }
                 });*/
            },
            addContent: function () {
                request.abort();
                var inner = $('.site__content-inner'),
                        preloader = inner.find('>.fa-refresh');
                request = $.ajax({
                    url: ajax_url,
                    data: {
                        current_id: $(".single-post__theme").last().attr('data-id'),
                        action: 'get_scroll_post'
                    },
                    dataType: 'json',
                    timeout: 20000,
                    type: "GET",
                    success: function (msg) {
                        if (msg != '') {
                            /* temporary fix for doubled content */
                            data_id = $(msg).eq(2).attr('data-id');
                            if ($('.single-post__theme[data-id=' + data_id + ']').size() === 0) {
                                inner.append(msg);

                                $.each($(".your-reaction__level"), function (i, el) {
                                    new ShowRating($(el));
                                });

                                // po.st initialization
                                post_init('.single-post__theme');

                                // remove comments on ajax loaded posts
                                jQuery('.comments').last().remove();

                                // google virtual view
                                _gaq.push(['_trackPageview', $('.single-post__theme[data-id=' + data_id + ']').attr('data-url')]);
                            }
                            /* --------------------------------- */
                        } else {
                            preloader.remove();
                        }
                    },
                    error: function (XMLHttpRequest) {
                        if (XMLHttpRequest.statusText != "abort") {
                            alert("ERROR!");
                        }
                    }
                });
            }
        };
    }
};

var Popup = function (obj) {
    this.popup = obj;
    this.popupWrap = this.popup.find('.popup__wrap');
    this.popupContent = this.popup.find('.popup__content');
    this.btnShow = $('.popup__open');
    this.btnClose = this.popup.find('.popup__close');
    this.wrap = this.popup.find(".popup__close");
    this.window = $(window);

    this.init();
};
Popup.prototype = {
    init: function () {
        var self = this;
        self.core = self.core();
        self.core.build();
    },
    core: function () {
        var self = this;

        return {
            build: function () {
                self.core.controls();
            },
            controls: function () {
                $('body').on('click', '.popup__open', function () {
                    var dataClass = $(this).attr('data-popup'),
                            curPopup = self.popup.filter(".popup_" + dataClass);
                    curPopup.addClass("popup_opened");
                    return false;
                });
                /*self.btnShow.on({
                 click: function () {
                 var dataClass = $(this).attr('data-popup'),
                 curPopup = self.popup.filter(".popup_" + dataClass);
                 curPopup.addClass("popup_opened");
                 return false;
                 }
                 });*/
                self.btnClose.on({
                    click: function () {
                        var curPopup = $(this).parents(".popup");
                        curPopup.removeClass("popup_opened");
                        return false;
                    }
                });
                self.popupWrap.click(function () {
                    var curPopup = $(this).parents(".popup");
                    curPopup.removeClass("popup_opened");
                    return false;
                });
                self.popupContent.on({
                    click: function (event) {
                        event = event || window.event;
                        event.stopPropagation();
                    }
                });
            }

        };
    }
};

var Subscribe = function (obj) {
    this.obj = obj;
    this.input = this.obj.find("input");
    this.emailField = this.obj.find(".connect-with__email");
    this.popupEror = $(".popup_error");
    this.popupThanks = $(".popup_thanks");

    this.init();
};
Subscribe.prototype = {
    init: function () {
        var self = this;
        self.core = self.core();
        self.core.build();
    },
    core: function () {
        var self = this;
        var request = new XMLHttpRequest();

        return {
            build: function () {
                self.core.controls();
            },
            controls: function () {
                /*self.obj.on({
                 'submit': function () {
                 var inputTextVal = self.input.val();
                 if(!(self.input.val()=='')){
                 
                 if(self.core.isValidEmailAddress(inputTextVal)){
                 self.core.ajaxRequest();
                 self.emailField.removeClass("connect-with__email_error");
                 
                 
                 }else{
                 self.emailField.addClass("connect-with__email_error");
                 self.popupEror.addClass("popup_opened");
                 setTimeout( function(){
                 self.popupEror.removeClass("popup_opened");
                 },5000 );
                 }
                 
                 }else{
                 self.emailField.addClass("connect-with__email_error");
                 self.popupEror.addClass("popup_opened");
                 setTimeout( function(){
                 self.popupEror.removeClass("popup_opened");
                 },3000 );
                 }
                 
                 return false;
                 }
                 });*/
            },
            ajaxRequest: function () {
                request.abort();
                request = $.ajax({
                    url: self.obj.attr('action'),
                    data: self.obj.serialize(), // отправляет всю форму
                    dataType: 'html',
                    timeout: 20000,
                    type: "POST",
                    success: function (msg) {
                        self.obj.trigger('reset');
                        self.popupThanks.addClass("popup_opened");
                        setTimeout(function () {
                            self.popupThanks.removeClass("popup_opened");
                        }, 4000);
                    },
                    error: function (XMLHttpRequest) {
                        if (XMLHttpRequest.statusText != "abort") {
                            alert("Error!");
                        }
                    }
                });
            },
            isValidEmailAddress: function (emailAddress) {
                var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                return pattern.test(emailAddress);
            }
        };
    }
};