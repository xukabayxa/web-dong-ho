function search(keyword) {
    $.ajax({
        url: '/ajax/GetSearch',
        type: 'GET',
        data: 'Keyword=' + keyword,
        dataType: 'json',
        success: function (data) {
            var content = data.Html;

            if (content != '') {
                $('.resuiltSearch').html(content);
                $('.resuiltSearch').show();
                $(document).on('click', function (e) {
                    if ($(e.target).closest('.resuiltSearch').length === 0) {
                        $('.resuiltSearch').hide();
                    }
                });
            }
        },
        error: function () { }
    });
}
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
// $('.buy_now').click(function () {
//     add_cart($(this).data('id'), $(this).data('returnpath'));
// });
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
/*-------------------------
    checkout one click toggle function
    --------------------------*/
var checked = $('.sin-payment input:checked')
if (checked) {
    $(checked).siblings('.payment_box').slideDown(900);
};
$('.sin-payment input').on('change', function () {
    $('.payment_box').slideUp(900);
    $(this).siblings('.payment_box').slideToggle(900);
});


//6.Chức năng bình luận

function get_comment(ProductID) {
    var PageComment = $('#PageComment').val();

    var dataString = 'ProductID=' + ProductID + '&PageComment=' + PageComment + '&PageSize=10';

    $.ajax({
        type: "get",
        url: "/ajax/GetComment.html",
        data: dataString,
        dataType: "xml",
        success: function (req) {
            $(req).find('Item').each(function () {
                var content = $(this).find('Html').text();
                var params = $(this).find('Params').text();

                if (content != '') {
                    $('#list_comment').append(content);

                    PageComment++;
                    $('#PageComment').val(PageComment);
                }
                else {
                    $('.view_more_coment').hide();
                }
            });

        },
        error: function (req) { }
    });
}



