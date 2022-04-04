$(document).ready(function(){   

   // alert('Jquery is loaded');


$("#productType").change(function() {
    $('.typeattr').hide();
    $('.typeattr').find("input").removeAttr("required");
    $("#" + $(this).val()).show();
    $("#" + $(this).val()).find("input").prop("required", true);
});


//Header Animations
$('.headerbutton').on('mouseenter', function(event)  {
    $(event.currentTarget).css({
        backgroundColor: 'white',
        color: 'black'

    });
}).on('mouseleave', function(event) {
    $(event.currentTarget).css({
        backgroundColor: "#580c04",
        color: 'white'
    });
});




});
