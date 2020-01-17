$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'top',
        html : true,
        title : 'Username <a href="#" class="close" data-dismiss="alert">&times;</a>',
    });
});