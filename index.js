$(document).ready(() => {
    $('#msv-div input').focus();

    $('form').submit((e) => {
        e.preventDefault();
    });

    $("input").keyup(function (e) {
        var code = e.key; // recommended to use e.key, it's normalized across devices and languages
        if (code === "Enter") {
            if($(this).parent().next().children('input').length){
                $(this).parent().next().children('input').first().focus();
            } else {
                $(this).parent().next().children('button').first().focus();
            }
            // if($(this).parent().attr('id') === 'button-div'){
            //     //chuyển sang trang SVTimKiemNhanh
            //     console.log("chuyển sang trang SVTimKiemNhanh");
            // }
        }
    });

    // $('#button-div button').click(() => {
    //     console.log("chuyển sang trang SVTimKiemNhanh");
    // });
});