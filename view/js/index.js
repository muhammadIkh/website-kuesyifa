$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        margin: 40,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }

        }
    });


    $('.plus').click(function (e) {
        e.preventDefault();
        var jumlah = $('.jumlah').val();
        var value = parseInt(jumlah, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 100) {
            value++;
            $('.jumlah').val(value);

        }
    });

    $('.minus').click(function (e) {
        e.preventDefault();
        var jumlah = $('.jumlah').val();
        var value = parseInt(jumlah, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $('.jumlah').val(value);

        }
    });

});


