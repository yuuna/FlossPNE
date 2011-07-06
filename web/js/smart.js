var Smart = {};
Smart.pager = {};

$('document').ready((function(){
    $('#loadmore').click(function(e){
        $.ajax(Smart.pager.ajaxOption);
    });
}));
