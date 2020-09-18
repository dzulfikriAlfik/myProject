// event pada saat link di klik
$('.page-scroll').on('click', function (e) {

    // ambil isi dari href
    var tujuan = $(this).attr('href');
    // tangkap elemen yg di klik
    var elemenTujuan = $(tujuan);

    // pindahkan scroll
    $('html, body').animate({
        scrollTop: elemenTujuan.offset().top - 50
    }, 1250, 'easeInOutExpo');

    e.preventDefault();
});

// parallax
$(window).scroll(function () {
    var wScroll = $(this).scrollTop();

    // jumbotron
    $('.jumbotron img').css({
        'transform': 'translate(0px, ' + wScroll / 6 + '%)'
    });

    $('.jumbotron h1').css({
        'transform': 'translate(0px, ' + wScroll / 3 + '%)'
    });

    $('.jumbotron p').css({
        'transform': 'translate(0px, ' + wScroll / 1.5 + '%)'
    });

    // portfolio
    if (wScroll > $('.portfolio').offset().top - 300) {
        $('.portfolio .thumbnail').each(function (i) {
            setTimeout(function () {
                $('.portfolio .thumbnail').eq(i).addClass('muncul');
            }, 300 * (i+1)); 
        });
    }

});

// parallax about
$(window).on('load', function () {
    $('.pKiri').addClass('pMuncul'); 
    $('.pKanan').addClass('pMuncul'); 
});