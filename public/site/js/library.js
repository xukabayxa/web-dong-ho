!function (r, a, o, f) { var l = r(a); r.fn.lazyload = function (t) { var n = this, i = { threshold: 0, failure_limit: 0, event: "scroll", effect: "show", container: a, data_attribute: "src", skip_invisible: !0, appear: null, load: null, placeholder: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" }; function e() { var e = 0; n.each(function () { var t = r(this); if ((!i.skip_invisible || t.is(":visible")) && !r.abovethetop(this, i) && !r.leftofbegin(this, i)) if (r.belowthefold(this, i) || r.rightoffold(this, i)) { if (++e > i.failure_limit) return !1 } else t.trigger("appear"), e = 0 }) } return t && (f !== t.failurelimit && (t.failure_limit = t.failurelimit, delete t.failurelimit), f !== t.effectspeed && (t.effect_speed = t.effectspeed, delete t.effectspeed), r.extend(i, t)), t = i.container === f || i.container === a ? l : r(i.container), 0 === i.event.indexOf("scroll") && t.bind(i.event, e), this.each(function () { var e = this, o = r(e); e.loaded = !1, o.attr("src") !== f && !1 !== o.attr("src") || o.is("img") && o.attr("src", i.placeholder), o.one("appear", function () { var t; this.loaded || (i.appear && (t = n.length, i.appear.call(e, t, i)), r("<img />").bind("load", function () { var t = o.attr("data-" + i.data_attribute); o.hide(), o.is("img") ? o.attr("src", t) : o.css("background-image", "url('" + t + "')"), o[i.effect](i.effect_speed), e.loaded = !0; t = r.grep(n, function (t) { return !t.loaded }); n = r(t), i.load && (t = n.length, i.load.call(e, t, i)) }).attr("src", o.attr("data-" + i.data_attribute))) }), 0 !== i.event.indexOf("scroll") && o.bind(i.event, function () { e.loaded || o.trigger("appear") }) }), l.bind("resize", function () { e() }), /(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion) && l.bind("pageshow", function (t) { t.originalEvent && t.originalEvent.persisted && n.each(function () { r(this).trigger("appear") }) }), r(o).ready(function () { e() }), this }, r.belowthefold = function (t, e) { var o = e.container === f || e.container === a ? (a.innerHeight || l.height()) + l.scrollTop() : r(e.container).offset().top + r(e.container).height(); return o <= r(t).offset().top - e.threshold }, r.rightoffold = function (t, e) { var o = e.container === f || e.container === a ? l.width() + l.scrollLeft() : r(e.container).offset().left + r(e.container).width(); return o <= r(t).offset().left - e.threshold }, r.abovethetop = function (t, e) { var o = e.container === f || e.container === a ? l.scrollTop() : r(e.container).offset().top; return o >= r(t).offset().top + e.threshold + r(t).height() }, r.leftofbegin = function (t, e) { var o = e.container === f || e.container === a ? l.scrollLeft() : r(e.container).offset().left; return o >= r(t).offset().left + e.threshold + r(t).width() }, r.inviewport = function (t, e) { return !(r.rightoffold(t, e) || r.leftofbegin(t, e) || r.belowthefold(t, e) || r.abovethetop(t, e)) }, r.extend(r.expr[":"], { "below-the-fold": function (t) { return r.belowthefold(t, { threshold: 0 }) }, "above-the-top": function (t) { return !r.belowthefold(t, { threshold: 0 }) }, "right-of-screen": function (t) { return r.rightoffold(t, { threshold: 0 }) }, "left-of-screen": function (t) { return !r.rightoffold(t, { threshold: 0 }) }, "in-viewport": function (t) { return r.inviewport(t, { threshold: 0 }) }, "above-the-fold": function (t) { return !r.belowthefold(t, { threshold: 0 }) }, "right-of-fold": function (t) { return r.rightoffold(t, { threshold: 0 }) }, "left-of-fold": function (t) { return !r.rightoffold(t, { threshold: 0 }) } }) }(jQuery, window, document), $(document).ready(function () { $(".lazy0").each(function () { $(this).attr("data-src", this.src), $(this).attr("src", "") }), $(".lazy0").lazyload(), $(".lazy").lazyload() });

//Lazy load
$(window).scroll(function () {
    LazyLoadJS();
});
var isLazyLoadJS = false;
// function LazyLoadJS() {
//     if (isLazyLoadJS === false) {
//         //lazyload js thứ 3
//         var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
//         (function () {
//             var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
//             s1.async = true;
//             s1.src = 'https://embed.tawk.to/59a6835fe8b4ce6a1a6d1049/default';
//             s1.charset = 'UTF-8';
//             s1.setAttribute('crossorigin', '*');
//             s0.parentNode.insertBefore(s1, s0);
//         })();
//     }
// }
function LoadJS(file) {
    var d = window.document,
        b = d.body,
        e = d.createElement("script");

    e.async = true;
    e.src = file;
    b.appendChild(e);
}


//$('#banner-img img').css({ 'width': $('#banner-img').width(), 'height': 'auto' });
//$('.bannerHome').css({ 'width': $('.bannerHome').width(), 'height': 'auto' });
// -- js close_top_banner
$('.close_top_banner').click(function () {
    $('.er-banner-top').toggle();
})
// --  js CheckOut Page*/
$('[name="payment_method"]').on('click', function () {
    var $value = $(this).attr('value');
    $('.sub_show').slideUp();
    $('.payment_method_' + $value).slideToggle();
});
// --  js Giaohang Page*/
$('[name="gh_method"]').on('click', function () {
    var $value = $(this).attr('value');
    $('.sub_show').slideUp();
    $('.gh_method_' + $value).slideToggle();
});
// -- js khohang
$('#add-khohang').click(function () {
    $('#khohang-group').slideToggle('slow');
});
// -- js magiamgia
$('.mgg-code').click(function () {
    $('.mgg-inputcode').slideToggle(500);
});
// -- js change_pass
$('#is_change_pass').click(function () {
    $('#password-group').slideToggle(600);
});
// -- js xuathoad
$('#is_xhd').click(function () {
    $('#xhd-group').slideToggle(600);
});
// -- js menu hover
$('.menu-main-left li .menu-item').mouseover(function () {
    $('.menu-main-left li .menu-item.current').removeClass('current');
    $(this).addClass('current');
});

// -- js single-product count

$(".cart-plus-minus").prepend('<div class="dec qtybutton">-</div>');
$(".cart-plus-minus").append('<div class="inc qtybutton">+</div>');
$(".qtybutton").on("click", function () {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    var index = $button.parent().find("input").data("index");
    var returnpath = $button.parent().find("input").data("returnpath");
    if ($button.text() == "+") {
        var newVal = parseFloat(oldValue) + 1;
        update_cart(index, newVal, returnpath);
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
            update_cart(index, newVal, returnpath);
        } else {
            newVal = 0;
            delete_cart(index);
        }
    }
    $button.parent().find("input").val(newVal);
});


// -- js hover-over
$(".hover-over").mouseover(function () {
    $(".overlay").addClass("overlay-visible");
});
$(document).mouseover(function (a) {
    var n = $(".hover-over");
    n.is(a.target) || 0 !== n.has(a.target).length || $(".overlay").removeClass("overlay-visible");
});

// js rating
$('.btn-send-r').on('click', function () {
    $('.rating-send').toggle();
});
/*js click span reply*/
$("span.reply-at").click(function () {
    $(".media-at").find(".repbox-at").slideToggle("slow", function () {

    });
})



// -- js slide-product-home
$("#box_pro_special ul, #box_giasoc ul").owlCarousel({
    items: 6,
    margin: 0,
    slideSpeed: 2000,
    nav: true,
    lazyLoad: true,
    dots: false,
    loop: false,
    responsiveRefreshRate: 200,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ]
});

$(".product-cate").owlCarousel({
    items: 6,
    margin: 8,
    slideSpeed: 2000,
    nav: true,
    lazyLoad: true,
    dots: false,
    loop: false,
    responsiveRefreshRate: 200,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ]
});

$(".list-brand-cate").owlCarousel({
    items: 10,
    margin: 10,
    slideSpeed: 2000,
    nav: true,
    lazyLoad: true,
    dots: false,
    loop: false,
    responsiveRefreshRate: 200,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ]
});
$(".recently").owlCarousel({
    items: 8,
    margin: 10,
    slideSpeed: 2000,
    nav: true,
    lazyLoad: true,
    dots: false,
    loop: false,
    responsiveRefreshRate: 200,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ]
});
// -- js banner-home

$(document).ready(function () {
    /* Thêm class 'lazy' vào tất cả hình ảnh trên website
    //lazy load*/
    $("img.lazy").lazyload();
    $('#banner-img').on('initialized.owl.carousel changed.owl.carousel', function (e) {
        if (!e.namespace) {
            return;
        }
        var carousel = e.relatedTarget;
        $('.counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
    });

    var bigimage = $("#banner-img");
    var thumbs = $("#banner-txt");
    //var totalslides = 10;
    var syncedSecondary = true;

    bigimage
        .owlCarousel({
            items: 1,
            lazyLoad: true,
            slideSpeed: 2000,
            autoplayTimeout: 5000,
            smartSpeed: 800,
            nav: true,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        })
        .on("changed.owl.carousel", syncPosition);

    thumbs
        .on("initialized.owl.carousel", function () {
            thumbs
                .find(".owl-item")
                .eq(0)
                .addClass("current");
        })
        .owlCarousel({
            items: 5,
            responsive: {
                0: {
                    items: 1
                },
                320: {
                    items: 3
                },
                480: {
                    items: 4
                },
                768: {
                    items: 4
                },

            },
            dots: false,
            nav: false,
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: 4,
            responsiveRefreshRate: 100
        })
        .on("changed.owl.carousel", syncPosition2);

    function syncPosition(el) {
        //if loop is set to false, then you have to uncomment the next line
        //var current = el.item.index;

        //to disable loop, comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }
        //to this
        thumbs
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = thumbs.find(".owl-item.active").length - 1;
        var start = thumbs
            .find(".owl-item.active")
            .first()
            .index();
        var end = thumbs
            .find(".owl-item.active")
            .last()
            .index();

        if (current > end) {
            thumbs.data("owl.carousel").to(current, 100, true);
        }
        if (current < start) {
            thumbs.data("owl.carousel").to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            bigimage.data("owl.carousel").to(number, 100, true);
        }
    }

    thumbs.on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).index();
        bigimage.data("owl.carousel").to(number, 300, true);
    });
});


// -- js slide-product-home
$(".banner-cate").owlCarousel({
    items: 3,
    margin: 8,
    slideSpeed: 2000,
    autoplayTimeout: 5000,
    smartSpeed: 600,
    nav: true,
    lazyLoad: true,
    autoplay: true,
    dots: false,
    responsiveRefreshRate: 200,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ]
});

$('#js-show-more').click(function () {
    if ($('.js-content').hasClass('expand')) {
        $('.js-content').removeClass("expand");
        document.getElementById('js-show-more').innerHTML = " Thu Gọn Nội Dung";
    } else {
        $('.js-content').addClass("expand");
        document.getElementById('js-show-more').innerHTML = " Xem Thêm Nội Dung";
    }
});


$(function () {
    "use strict";
    $(window).scroll(function () {

        if ($(this).scrollTop() > 70) {
            $('.menu_main_cate').addClass('nav-fixed animated');
            //$('.btn-group-cate').addClass("hidden-btncate");
        } else {
            $('.menu_main_cate').removeClass('nav-fixed animated');
            //$('.btn-group-cate').removeClass("hidden-btncate");
        }

    });
    //scroll top
    $('.back-to-top a').click(function (n) {
        n.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 500)
    });
    $(window).scroll(function () {
        $(document).scrollTop() > 1e3 ? $('.back-to-top').addClass('display') : $('.back-to-top').removeClass('display')
    });

});
