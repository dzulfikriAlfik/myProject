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
    // 1250 adalah waktu animasi scrolling dalam mili second

    e.preventDefault();
});