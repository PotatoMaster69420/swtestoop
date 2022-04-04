$(document).ready(function(){   

    //alert('Jquery Ready');


    $.fn.toggleAttr = function(attr, val) {
        var test = $(this).attr(attr);
        if ( test ) { 
          // if attrib exists with ANY value, still remove it
          $(this).removeAttr(attr);
        } else {
          $(this).attr(attr, val);
        }
        return this;
      };    

    
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
//Item div animations

$('.itemcard').on('mouseenter', function(event)  {
    $(event.currentTarget).css({
        backgroundColor: 'white',
        color: 'black'

    });
}).on('mouseleave', function(event) {
    $(event.currentTarget).css({
        backgroundColor: "black",
        color: 'white'
    });
});

$('.itemcard').on('mouseenter', function(event)  {
    $(event.currentTarget).find('.title').css({
        backgroundColor: '#580c04',
        color: 'white'

    });
}).on('mouseleave', function(event) {
    $(event.currentTarget).find('.title').css({
        backgroundColor: 'white',
        color: '#580c04'
    });
});



$('.itemcard').on('click', function(event) {
    $(event.currentTarget).find('.delete-checkbox').toggleAttr('checked', true);
});


//Less clicking

$('input[type=submit]').on('click', function(event) {
    if($('input[name="marked[]"]:checked').length > 0) {
        event.submit();
   } else {
       event.preventDefault();
   };
});



});
