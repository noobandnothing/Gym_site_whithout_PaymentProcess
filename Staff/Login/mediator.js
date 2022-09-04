function tell_father(child){
    $.ajax({
        type: "POST",
        url: "mediator_process.php",
        data: 'req='+child,
        dataType: "json",
        encode: true
    }).done(function (approve) {
        if(approve.trick) {
            alert(approve.message);
        }
        location.href = approve.dest;
    });
};
$(document).ready(function(){
    
    $('#fp_button').click(function (){
        tell_father($(this).attr('id'));
    });
    $('#na_button').click(function (){
        tell_father($(this).attr('id'));
    });

});