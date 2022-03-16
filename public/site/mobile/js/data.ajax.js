var page = 1;

function paging_product(url) {
    $('.loading').show();
    //atr
    var checkbox = $('.right-property li input[type="checkbox"]:checked').map(function () {
        return this.value;
    }).get();
    var atr = checkbox.join('-');

    var sort = $('.filterTopCtgr li input[type="checkbox"]:checked').map(function () {
        return this.value;
    }).get();
    url = url + '?page=' + page + '&sort=' + sort + '&atr=' + atr;
    console.log('paging:' + url);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'html',
        success: function (data) {
            data = $(data).find('.list_item_prd').html();
            data = $.trim(data);

            if (data == '')
                $('.pagination a').hide();

            $('.list_item_prd').append(data);
            //$('.list_item_prd li').click(function () {
            //    location.href = $(this).data('url');
            //})
            $('.loading').hide();
        },
        error: function () {
        }
    });
}

$('.pagination a').click(function () {
    page++;
    paging_product($(this).data('url'));
})
;

$('.right-property li input').on('change', function () {
    $('input[type="checkbox"][name="' + $(this).attr('name') + '"]').not(this).prop('checked', false);
});

function checkout() {
    $('.loading').show();

    $.ajax({
        url: '/ajax/CheckOut.html',
        type: 'POST',
        data: $("#cart_form").serialize(),
        success: function (data) {
            var content = data.Html;
            var param = data.Params;

            if (content != '')
                location.href = '/dat-hang-thanh-cong.html?code=' + content;

            if (param != '')
                zebra_alert('ThĂ´ng bĂ¡o !', param);

            $('.loading').hide();
        },
        error: function () {
        }
    });
}

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
        error: function () {
        }
    });
}
