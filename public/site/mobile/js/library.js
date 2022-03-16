//Lazy load
$(window).scroll(function () {
    LazyLoadJS();
});
var isLazyLoadJS = false;
function LazyLoadJS() {
    if (isLazyLoadJS === false) {
        //lazyload js thứ 3
        // var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        // (function () {
        //     var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        //     s1.async = true;
        //     s1.src = 'https://embed.tawk.to/59a6835fe8b4ce6a1a6d1049/default';
        //     s1.charset = 'UTF-8';
        //     s1.setAttribute('crossorigin', '*');
        //     s0.parentNode.insertBefore(s1, s0);
        // })();
    }
    isLazyLoadJS = true;
}
function LoadJS(file) {
    var d = window.document,
        b = d.body,
        e = d.createElement("script");

    e.async = true;
    e.src = file;
    b.appendChild(e);
}

$(function () {
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
    // show-hide text
    $('#js-show-more').click(function () {
        if ($('.description-content').hasClass('expand')) {
            $('.description-content').removeClass("expand");
            $(this).text("Xem thêm thông tin");
        } else {
            $('.description-content').addClass("expand");
            $(this).text("Thu Gọn");
        }
    });


    $('#js2-show-more').click(function () {
        if ($('.attribute-content').hasClass('expand')) {
            $('.attribute-content').removeClass("expand");
            $(this).text("Xem thêm thông số");
        } else {
            $('.attribute-content').addClass("expand");
            $(this).text("Thu Gọn");
        }
    });
    //Menu Mobile-----------------
    var $menu = $("#mainMenu").clone();
    $menu.attr("id", "my-mobile-menu");
    $menu.mmenu({
        extensions: ["theme-white"],
        "counters": true,
        "navbars": [
            {
                "position": "top"
            }
        ]
    });
    $('.buttonMenu').click(function () {
        $(this).toggleClass('icCloneMenu');
        $('#header').toggleClass('openMenu');
    });

    //$('#header').stick_in_parent({
    //    //offset_top: 35,
    //    parent: '.Wrapper'
    //});

    $('.btnprint_dt').click(function () {
        add_quotation($(this).data('id'), $(this).data('returnpath'));
    })

    $('.print-quotation').click(function () {
        location.href = '/in-bao-gia.html?vat=0';
    })
    $('.print-quotation-vat').click(function () {
        location.href = '/in-bao-gia.html?vat=1';
    })

    $('.slide-home').owlCarousel({
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        items: 1,
        lazyLoad: true,
        loop: true,
        margin: 0
    });

    $('.slide-brand').owlCarousel({
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        loop: true,
        margin: 10,
        nav: true,
        items: 2

    });

    $('.owlBrand-Ctgr').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        dots: false,
        navText: ["<i class=\"fa fa-chevron-left\"></i>", "<i class=\"fa fa-chevron-right\"></i>"],
        autoplay: false,
        responsive: {
            0: {
                items: 3
            },
            600: {
                items: 4
            },
            1000: {
                items: 5
            }
        }
    });

    $('.slide-file').owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        loop: true,
        margin: 10,
        nav: false,
        items: 4
    });

    $('.list-submenu').owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        loop: true,
        margin: 10,
        nav: false,
        items: 2
    });

    //hidden content
    //$('.show-more a').click(function () {
    //    if ($('.js-content').hasClass('expand')) {
    //        $('.js-content').removeClass('expand');
    //        $(this).text('Xem thêm nội dung');
    //    } else {
    //        $('.js-content').addClass('expand');
    //        $(this).text('Thu gọn nội dung');
    //    }
    //});
    // show-hide-text
    $(".show-more1").click(function () {
        var $this = $(this);
        $this.text($this.text() == "(Thu gọn)" ? "(Hiển thị thêm)" : "(Thu gọn)");
        $(".bxnote_ctgr").toggleClass("show-more-height1");

    });
})


function getPhone() {
    $('.loading').show();
    var productID = $("#ProductID").val();
    var phone = $("#PhoneRegister").val();
    $.ajax({
        url: '/ajax/GetPhone.html',
        type: 'GET',
        data: 'ProductID=' + productID + '&Phone=' + phone,
        dataType: 'json',
        success: function (data) {
            $('.loading').hide();
            var content = data.Html;
            var param = data.Params;
            if (content != '') {
                Swal.fire({
                    title: content,
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
                $("#PhoneRegister").val("");
            }
            if (param != '') {
                Swal.fire({
                    icon: 'error',
                    html: param,
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: "OK",
                })
            }

        },
        error: function () { }
    });
}

function regSurvey() {
    var ProductID = $("#ProductID").val();
    var NameSurvey = $("#Name_Survey").val();
    var PhoneSurvey = $("#Phone_Survey").val();
    var AddressSurvey = $("#Address_Survey").val();
    $('.loading').show();
    $.ajax({
        type: 'GET',
        url: '/ajax/Register.html',
        data: 'ProductID=' + ProductID + "&NameSurvey=" + NameSurvey + "&PhoneSurvey=" + PhoneSurvey + "&AddressSurvey=" + AddressSurvey,
        dataType: 'json',
        success: function (data) {
            var content = data.Html;
            var param = data.Params;
            if (param != '') {
                Swal.fire({
                    icon: 'error',
                    html: param,
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: "OK",
                })
            }
            if (content != '') {
                Swal.fire({
                    title: content,
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
            }
            $('.loading').hide();
        },
        error: function () { }
    });
}
$('#btnOrder').click(function () {
    checkout();
});
$('.buy_now').click(function () {
    add_cart($(this).data('id'), $(this).data('returnpath'));
});
function checkout() {
    $('.loading').show();

    $.ajax({
        url: '/ajax/CheckOut.html',
        type: 'GET',
        data: $("#cart_form").serialize(),
        dataType: 'json',
        success: function (data) {
            var content = data.Html;
            var param = data.Params;

            if (content != '')
                location.href = '/dat-hang-thanh-cong.html?code=' + content;

            if (param != '') {
                Swal.fire({
                    icon: 'error',
                    html: param,
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: "OK",
                })
            }

            $('.loading').hide();
        },
        error: function () { }
    });
}


function add_cart(id, returnpath) {
    location.href = '/gio-hang/Add.html?ProductID=' + id + '&Quantity=1&returnpath=' + returnpath;
}

function update_cart(index, quantity, returnpath) {
    location.href = '/gio-hang/Update.html?Index=' + index + '&Quantity=' + quantity + '&returnpath=' + returnpath;
}

function delete_cart(index) {
    location.href = '/gio-hang/Delete.html?Index=' + index;
}

function change_captcha() {
    var e = Math.floor(Math.random() * 999999); document.getElementById("imgValidCode").src = "/ajax/Security.html?Code=" + e
}
