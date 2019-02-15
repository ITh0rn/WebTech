/*$(document).ready(function(){
    var baseUrl = window.location.pathname;
    console.log(baseUrl+'/reviewed');
    var numeroReview = 0;
    var itemid = 0;
    var divApp = '';
    var totfive = $('#fiveSum').text();
    var totfour = $('#fourSum').text();
    var totthree = $('#threeSum').text();
    var tottwo = $('#twoSum').text();
    var totone = $('#oneSum').text();

    $('.star').each(function(){
        var prova = $(this).children().text();
    }),

        $('.totalist').each(function(){
            numeroReview = numeroReview + 1;
            itemid = $(this).attr('itemid');
        });

    divApp = $('.totalist').attr(itemid);
    $('#pubblicaReview').click(function(){ //nome bottone
        var testo = $('#text').val(); //nome commento
        var iduser = $('#userid').attr('title');


        $('#first').siblings().each( function () {
            var prova1 = $(this).attr('class');
            if (prova1[10] == 'f')
            {
                full = full+1;
            }
        });
        var completeUrl = baseUrl+"/reviewed";
        $.get('product-detail/44/reviewed', {testo: testo, full: full, iduser:iduser, idshoe:idshoe},//view da ricaricare argomenti da passare ad una request
            function(response)
            {
        //nome div della include
    });
});*/
//script al primo caricamento per gestire la visualizzazione del voto in formato stella
$(document).ready(function () {
    $('.js-comments').find('.js-comment-div-start').each(function () {
        $num = $(this).find('.js-startcomment').attr('value');
        console.log($num);
        var i = 0;
        $(this).find('.js-startcomment').children('i').each(function () {
            if (i < $num) {
                $(this).addClass('zmdi zmdi-star');
                i++;
            }
        });
    });
});

//Script Jquery/Ajax che gestiste la paginate dei commenti;
$(document).on('click', '.pagination a', function (e) {
    e.preventDefault();
    $url = $(this).attr('href').split('page=')[1];
    $.ajax({
        url: '/ajax?page=' +$url

    }).done(function (data) {
        $('.js-comments').hide().html(data).fadeIn(1000);
        $('.js-comments').find('.js-comment-div').each(function () {
            $num = $(this).find('.js-star-comm').attr('value');
            console.log($num);
            var i = 0;
            $(this).find('.js-star-comm').children('i').each(function () {
                if (i < $num) {
                    $(this).addClass('zmdi zmdi-star');
                    i++;
                }
            });
        });
    });
});

$(document).ready(function () {
    $('.js-add-review').on('click', function (e) {
        e.preventDefault();
        $idarticolo = $('.js-add-review').attr('value');
        $idcommento = $('#review').val();
        $voto = 0;
        $('.js-addstarreview').children('i').each(function () {
            if ($(this).attr('class') == 'item-rating pointer zmdi zmdi-star') {
                $voto += 1;
            }
        });
        console.log($idarticolo, $idcommento, $voto);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            url : '/addReviewBlog',
            data : {'idarticolo': $idarticolo, 'comment': $idcommento, 'voto': $voto},
            success: function (data) {
                if($.isEmptyObject(data.error)){
                    $(".print-error-msg-review").css('visibility', 'hidden');
                    swal({
                        title: "Commento Inserito",
                        text: "Grazie per la collaborazione",
                        icon: "success",
                        button: false,
                        timer: 1500
                    }).then(() => {
                        location.reload();
                    });
                }
                else {
                    $(".print-error-msg-review").find("ul").html('');
                    $.each(data.error, function (key, value) {
                        $('.print-error-msg-review').find('ul').append('<li>' + value + '</li>');
                        $('.print-error-msg-review').css('visibility', 'visible');
                    });
                }
            },
            error: function () {
                console.log('errore');
            }
        });
    });
});