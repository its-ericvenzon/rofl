$(document).ready(function(){
    $('[data-toggle="a-popover"]').popover({
        placement : 'top',
        html : true,
        title : 'Administrator <a href="#" class="close" data-dismiss="alert">&times;</a>',
    });
});