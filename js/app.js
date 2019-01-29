"use strict";

$(function () {
    $("#searcher").keyup(function (e) {
        const $form = $(e.currentTarget);
        $.ajax({
            url: 'http://michal.dev.project/',
            method: 'POST',
            data: $form.serialize(),
            success: function (res) {
                if ($('#search').val().length > 3){
                    var availableTags = [
                        $(res).find('table > tbody > tr > td').text()
                    ];
                    $('#search').autocomplete({
                        source: availableTags
                    });
                } else {
                    console.log('za mało')
                }
            },
            error: function (e) {
                console.log('nie działa');
            }
        });
        e.preventDefault();
    });
});
