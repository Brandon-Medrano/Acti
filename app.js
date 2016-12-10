/////////////////////////////
// Asynchronous scripts load.
/////////////////////////////

/**
 * Super basic function to load scripts asynchronously.
 * 
 * @param d <document> Document object.
 * @param s <string> Insert the new script tag before the first element with tagname = s.
 * @param src <string> Script URL.
 * @param id <string> Script element ID.
 */
function async_script(d, s, src, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = src;
    fjs.parentNode.insertBefore(js, fjs);
}

//Load scripts.
async_script(document, 'script', '//platform.twitter.com/widgets.js', 'twitter-jssdk');
async_script(document, 'script', '//connect.facebook.net/es_LA/all.js#xfbml=1', 'facebook-jssdk');
////////////////////////////////////
// End of Asynchronous scripts load.
////////////////////////////////////


jQuery.extend({
    parseQuerystring: function() {
        var nvpair = {};
        var qs = window.location.search.replace('?', '');
        var pairs = qs.split('&');
        $.each(pairs, function(i, v) {
            var pair = v.split('=');
            nvpair[pair[0]] = pair[1];
        });
        return nvpair;
    }
});

jQuery.email_verify = function(email) {
    return /^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/.test(email);
};


jQuery.fn.slider = function(args) {
    if (!args)
        args = {};

    var $slider = $(this)
            , $window = $slider.find('.slider-slider')
            , $slides = $window.children('.slide')
            , $nav = $slider.find('.slider-nav a')
            , $navdots = $slider.find('.slider-dots')
            , count = $slides.length
            , current = 1
            , slide_width = $slides.outerWidth()
            , total_width = slide_width * count
            , timer = false
            , interval = args.interval || 4000;

    $window.css({'width': total_width});
    $slides.css({'float': 'left'});

    $slider.bind('mouseenter', function(e) {
        stop_timer();
    }).bind('mouseleave', function(e) {
        start_timer();
    });

    $(window).load(function() {
        $slides.each(function() {
            var $div = $(this).find('.title > div')
                    , $a = $div.find('a');
            if ($a.width() > $div.width()) {
                $div.css({maxWidth: $a.width()});
            }
        });
    });

    function slide(d, freeze) {
        current += d;
        if (current < 1)
            current = count;
        if (current > count)
            current = 1;

        $window.stop().animate({'marginLeft': (current - 1) * slide_width * -1});

        $navdots.children().removeClass('selected');
        $navdots.children().eq(current - 1).addClass('selected');

        if (!freeze)
            start_timer();
    }

    function stop_timer() {
        clearTimeout(timer);
        timer = false;
    }

    function start_timer() {
        if (timer)
            stop_timer();
        timer = setTimeout(function() {
            slide(1);
        }, interval);
    }

    $nav.bind('click', function(e) {
        e.preventDefault();
        if ($(this).hasClass('arrow-left')) {
            current--;
            if (current < 1)
                current = count;
        } else {
            current++;
            if (current > count)
                current = 1;
        }
        slide(0);
    });

    if ($navdots.length) {
        for (var i = 0; i < count; i++) {
            $('<a/>', {href: '#'}).appendTo($navdots);
        }
    }
    $navdots.delegate('a', 'click', function(e) {
        e.preventDefault();
        current = $(this).index() + 1;
        slide(0);
    });

    slide(0);
};

jQuery(document).ready(function($) {

    $('.audio-lightbox').bind('click', function(e) {
        var src = $(this).attr('href');
        var $audio = $('<audio/>', {src: src, width: 300, height: 32});
        e.preventDefault();
        $.fancybox({content: $audio, width: 300, height: 32, autoDimensions: false, scrolling: 'no', overlayColor: '#000000'});
        $audio.mediaelementplayer(/* Options */);
    });

    $('#main-slider').slider();

    $('.whole-click')
            .bind('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        document.location = $(this).find('a:first').attr('href');
    })
            .css({cursor: 'pointer'})
            .find('a').css({textDecoration: 'none'});

    $('a[rel=youtube-big]').bind('click', function(e) {
        e.preventDefault();
        $(this).replaceWith('<iframe width="974" height="548" src="' + $(this).attr('href') + '?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>')
    });

    $(window).load(function() {

        $('.match-children-height').each(function() {
            var $t = $(this)
                    , groups = []
                    , h = 0
                    , re = /\bmatch-group-([\d]+)\b/
                    , $children = $t.children()
                    , matches = $t.attr('class').match(re)
                    , count = $children.length
                    , g_size = count;

            if (matches && matches.length > 1)
                g_size = matches[1];

            for (var i = 0; i < Math.ceil(count / g_size); i++) {
                groups.push($children.slice(i * g_size, (i + 1) * g_size));
            }

            $.each(groups, function(i, $group) {
                h = 0;
                $group.each(function() {
                    var th = $(this).height();
                    if (th > h)
                        h = th;
                }).css({height: h});
            });
        });

        $('.center-from-parent').each(function() {
            var ph = $(this).parent().height()
                    , th = $(this).outerHeight();
            if (th >= ph && $(this).hasClass('ifsmaller'))
                return;
            $(this).css($(this).hasClass('pad') ? 'padding-top' : 'margin-top', (ph - th) / 2);
        });

        $('#menu-item-admins-popup').bind('click', function(e) {
            e.preventDefault();
            $('#past-admins').fadeIn().css({marginTop: $('#past-admins').outerWidth() / 2 * -1});
            $('#black-bg').fadeIn();
        });

        $('#past-admins a[rel=close]').bind('click', function(e) {
            e.preventDefault();
            $('#past-admins').fadeOut();
            $('#black-bg').fadeOut();
        });

        var $window = $(window);
        $window.bind('resize', function() {
            $('#black-bg').css({width: $window.width(), height: $window.height()});
        }).trigger('resize');
    });

    function find_date(d) {
        var found = false;
        $.each(cal_dates, function(i, date) {
            if (found)
                return;
            if (date.meta_value == d.getFullYear() + '' + (d.getMonth() + 1) + (d.getDate() < 10 ? '0' : '') + d.getDate())
                found = date.link;
        });
        return found;
    }

    var cal_render_cb = function($td, thisDate, month, year) {
        var enabled = find_date(thisDate);
        if (!enabled) {
            $td.unbind('click mouseover mouseenter').addClass('disabled').css({cursor: 'default'});
        } else {
            $td.addClass('enabled').removeClass('disabled').data({url: enabled});
        }
    }
    $('#calendar').datePicker({inline: true, renderCallback: cal_render_cb});
    $('#calendar').delegate('.enabled', 'click', function() {
//		document.location = $( this ).data( 'url' );
    });

    $('#site-nav #nav-bar ul > li').hover(function() {
        $(this).children('.submenu').show();
    }, function() {
        $(this).children('.submenu').hide();
    });

    (function() {
        $('.major-state-page h1 a').each(function() {
            var open = false;

            $(this).bind('click', function(e) {
                e.preventDefault();
                open = !open;

                var $content = $(this).parent().next();
                if (!open) {
                    $content.slideUp();
                    $(this).removeClass('expanded');
                } else {
                    $content.slideDown();
                    $(this).addClass('expanded');
                }
            });
        });
    })();

    $('.lightbox').fancybox({overlayColor: '#000000'});
    $('.with-epn-iframe').fancybox({overlayColor: '#000000', height: 430, padding: 0});
    $('.lightbox-video').fancybox({overlayColor: '#000000', width: '90%', height: '90%'});

    $('.featured-media .thumbs a').hover(function() {
        $(this).siblings().stop().animate({opacity: 0.5});
    }, function() {
        $(this).siblings().stop().animate({opacity: 1});
    });

    $('.blog-post .gallery').each(function() {
        var id = $(this).attr('id');
        $(this).find('a').attr({rel: id});
    });
    $('.gallery-lightbox-item a').fancybox({titlePosition: 'inside', overlayColor: '#000000'});

    $('#with-epn-state').bind('change', function() {
        with_epn_filter('estado', $(this).val());
    });
    $('#with-epn-date').bind('change', function() {
        with_epn_filter('fecha', $(this).val());
    });

    function with_epn_filter(key, val) {
        var base = document.location.href.split('?').shift()
                , qs = $.parseQuerystring()
                , s = [];

        if ('all' == val)
            delete(qs[ key ]);
        else {
            qs[ key ] = val;
        }

        $.each(qs, function(k, v) {
            if (!k || !v)
                return;
            s.push(k + '=' + encodeURIComponent(v.split(' ').join('-')));
        });
        document.location = base + (s.length ? ('?' + s.join('&')) : '');
    }

    $('select.style-placeholder').bind('change keydown keyup click', function(e) {
        e.preventDefault();
        if (!($(this).val()))
            $(this).addClass('placeholder');
        else
            $(this).removeClass('placeholder');
    }).trigger('change');


    // Turn links to .mp3 files into HTML5 <audio/> elements.
    $('#content a[href$=mp3]').each(function() {
        var src = $(this).attr('href');
        var $audio = $('<audio/>', {src: src, width: 484, height: 32});
        $(this).replaceWith($audio);
    });

    // Initialize Media Element Player plugin.
    $('video,audio').mediaelementplayer();


    storify.init($('.storify'), 'undefined' != typeof(items) ? items : []);
}); //jQuery( document ).ready()


(function() {
    $('.people-item').each(function() {
        var $this = $(this)
                , $card = $this.find('.people-card')
                , $over = $this.find('.people-over')
                , $left = $over.find('.left')
                , $right = $over.find('.right');

        var mh = $card.height()
                , mw = $card.width();

        $left.css({paddingTop: mh + 20, minWidth: mw});
        $right.css({minHeight: $left.outerHeight()});
//		$over.css( { minWidth : $left.outerWidth( true ) + $right.outerWidth( true ) } );

    });
    $('.people-item').hover(function() {
        $(this).find('.people-over').show();
    }, function() {
        $(this).find('.people-over').hide();
    })
})();



//Neswletter form
(function() {
    var sending = false
            , $form = $('#subscribe-box')
            , $submit = $form.find('button[type=submit]');

    $form.bind('submit', function(e) {
        e.preventDefault();

        if (sending)
            return;

        var email = $form.find('input[name=email]').val();

        if (!email) {
            alert(config.locale.forms.missing_email);
            return;
        }
        if (!$.email_verify(email)) {
            alert(config.locale.forms.invalid_email);
            return;
        }

        sending = true;
        $form.addClass('loading');

        $.ajax({
            url: config.ajax_url,
            type: 'post',
            data: {action: 'subscribe_box', email: email}
            , success:
                    function(res) {
                        $form.removeClass('loading');

                        if (1 != res) {
                            sending = false;
                            alert(config.locale.generic_error);
                            return false;
                        }

                        $submit.remove();
                        $form.parent().append('<div>' + config.locale.subscription.thanks + '</div>');
                        $form.slideUp();
                    }
            , error:
                    function() {
                        sending = false;
                        $form.removeClass('loading');
                        alert(config.locale.generic_error);
                    }
        })
    });
})();


//Ask form
(function() {
    var sending = false
            , $form = $('#ask-box')
            , $submit = $form.find('button[type=submit]');

    $form.find('textarea[name=question]')
            .bind('focus', function(e) {
        if (config.locale.ask.question_placeholder == $(this).val())
            $(this).val('');
    })
            .bind('blur', function(e) {
        if ('' == $(this).val())
            $(this).val(config.locale.ask.question_placeholder);
    });

    $form.bind('submit', function(e) {
        e.preventDefault();

        if (sending)
            return;

        var email = $form.find('input[name=email]').val()
                , name = $form.find('input[name=name]').val()
                , zipcode = $form.find('input[name=zipcode]').val()
                , question = $form.find('textarea[name=question]').val()
                , person_id = $form.find('input[name=person_id]').val();

        if (!person_id) {
            alert(config.locale.generic_error);
            return;
        }
        if (!name) {
            alert(config.locale.forms.missing_name);
            return;
        }
        if (!email) {
            alert(config.locale.forms.missing_email);
            return;
        }
        if (!$.email_verify(email)) {
            alert(config.locale.forms.invalid_email);
            return;
        }
        if (!zipcode) {
            alert(config.locale.forms.missing_zip);
            return;
        }
        if (!question || config.locale.ask.question_placeholder == question) {
            alert(config.locale.forms.missing_question);
            return;
        }

        sending = true;
        $form.addClass('loading');

        $.ajax({
            url: config.ajax_url
                    , type: 'post'
                    , data: {action: 'ask_box', email: email, name: name, zipcode: zipcode, question: question, person_id: person_id}
            , success:
                    function(res) {
                        $form.removeClass('loading');

                        if (1 != res) {
                            sending = false;
                            alert(config.locale.generic_error);
                            return false;
                        }

                        $submit.remove();
                        $form.parent().append('<div>' + config.locale.ask.thanks + '</div>');
                        $form.slideUp();
                    }
            , error:
                    function() {
                        sending = false;
                        $form.removeClass('loading');
                        alert(config.locale.generic_error);
                    }
        })
    });
})();


(function() {
    var $form = $('#contact-form')
            , step = 1;

    $form.find('select')
            .bind('focus', function() {
        $(this).parent().addClass('focus');
    })
            .bind('blur', function() {
        $(this).parent().removeClass('focus');
    });
    $form.find('input, select, textarea').bind('keydown keyup change', function() {
        var $this = ('SELECT' != this.tagName) ? $(this) : $(this).parent();
        $this.removeClass('error');
    });

    var fields = [
        {
            first_name:
                    {
                        req: true
                                , msg: config.locale.forms.missing_fname
                    }
            , last_name:
                    {
                        req: true
                                , msg: config.locale.forms.missing_lname
                    }
            , m_last_name:
                    {
                        req: false
                    }
            , gender:
                    {
                        req: true
                                , msg: config.locale.forms.missing_gender
                    }
            , marriage:
                    {
                        req: false
                    }
            , birth_day:
                    {
                        req: true
                                , msg: config.locale.forms.missing_bdate
                    }
            , birth_month:
                    {
                        req: true
                                , msg: config.locale.forms.missing_bdate
                    }
            , birth_year:
                    {
                        req: true
                                , msg: config.locale.forms.missing_bdate
                    }
            , nationality:
                    {
                        req: true
                                , msg: config.locale.forms.missing_nationality
                    }
            , ocupation:
                    {
                        req: true
                                , msg: config.locale.forms.missing_occupation
                    }
        }
        , {
            street:
                    {
                        req: true
                                , msg: config.locale.forms.missing_street
                    }
            , street_number:
                    {
                        req: true
                                , msg: config.locale.forms.missing_housenumber
                    }
            , country:
                    {
                        req: true
                                , msg: config.locale.forms.missing_country
                    }
            , zipcode:
                    {
                        req: false
                    }
            , state:
                    {
                        req: true
                                , msg: config.locale.forms.missing_state
                    }
            , municipality:
                    {
                        req: true
                                , msg: config.locale.forms.missing_municipality
                    }
            , col:
                    {
                        req: true
                                , msg: config.locale.forms.missing_colony
                    }
            , city:
                    {
                        req: false
                    }
            , phone:
                    {
                        req: false
                    }
            , fax:
                    {
                        req: false
                    }
        }
        , {
            subject:
                    {
                        req: true
                                , msg: config.locale.forms.missing_subject
                    }
            , topic:
                    {
                        req: true
                                , msg: config.locale.forms.missing_topic
                    }
            , email:
                    {
                        req: true
                                , msg: config.locale.forms.missing_email
                                , email: true
                    }
            , request:
                    {
                        req: true
                                , msg: config.locale.forms.missing_request
                    }
            , extra:
                    {
                        req: false
                    }
        }
    ];

    $form.bind('submit', function(e) {
        return validate(step);
    });

    function validate(i) {
        var error = false;

        for (h = 0; h < i; h++) {
            $.each(fields[ h ], function(id, args) {
                if (error)
                    return;

                var $field = $('#' + id);
                if (args.req && !$field.val()) {
                    alert(args.msg);
                    error = true;
                } else if (args.email && !$.email_verify($field.val())) {
                    alert(config.locale.forms.invalid_email);
                    error = true;
                }

                if (error) {
                    $field.focus().scroll_to(-80);
                    if ('SELECT' == $field[0].tagName)
                        $field.parent().addClass('error')
                    else
                        $field.addClass('error');
                    return;
                }
            });
        }
        if (error)
            return false;

        $form.find('fieldset.selected').find('button').hide();
        $form.find('fieldset.selected').removeClass('selected').next().slideDown().addClass('selected').find('input,select,textarea').first().focus().scroll_to(-80);
        step++;
        if (step > 3) {
            return true;
        }

        return false;
    }

    $form.find('fieldset:first').addClass('selected');
})();

jQuery.fn.scroll_to = function(offset) {
    var t = $(this).offset().top;
    if (!offset)
        offset = 0;
    $('html, body').stop().animate({scrollTop: t + offset});
}




// BEGIN Storify
var storify = (function() {
    var $container = null,
            $window = null,
            _items = null,
            loading = false;


    function load_items() {
        if (loading)
            return;

        var group = items.splice(0, 9);
        if (!group.length) {
            unbind_events();
            return;
        }

        loading = true;

        var $content = $(group.join(''));
        $container.append($content);
        $content.css({opacity: 0});
        $container.addClass('loading');
        $container.imagesLoaded(function() {
            loading = false;
            $content.animate({opacity: 1});
            $container.masonry('appended', $content);
            $container.removeClass('loading');
        });

    }


    function scroll(e) {
        var line = $container.position().top + $container.height(),
                scroll = $window.scrollTop();

        if (scroll >= line * 0.8) {
            load_items();
        }
    }


    function bind_events() {
        $window.bind('scroll', scroll);
    }


    function unbind_events() {
        $window.unbind('scroll', scroll);
    }


    return {
        init: function($_container, _items) {
            if (!$.fn.masonry || !$_container.length || !_items.length)
                return false;

            $container = $_container;
            items = _items;
            $window = $(window);

            $container.masonry({
                // options
                itemSelector: '.item',
                columnWidth: 323
            });

            load_items();
            bind_events();
        },
        load_items: function() {
            load_items();
        }
    };
})();

// END Storify
