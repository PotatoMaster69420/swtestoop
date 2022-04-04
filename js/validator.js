$(document).ready(function() {

    //alert('Validator is loaded');

    $('#product_form').prop('autocomplete', 'off');


    $.validator.addMethod( "nospace", function( value, element ) {
        return this.optional( element ) || /^\S+$/i.test( value );
    }, "No spaces allowed" );

    $.validator.addMethod( "alphanumeric", function( value, element ) {
        return this.optional( element ) || /^[a-zA-Z0-9]+(?:[\w -]*[a-zA-Z0-9]+)*$/i.test( value );
    }, "Acceptable format is letters and numbers that can be seperated by dashes" );



    $("#product_form").validate({
        

        rules: {
            sku: {
                required: true,
                nospace: true,
                alphanumeric: true,
                minlength: 5,
                maxlength: 15,
                
                


            },
            name: {
                required: true,
                alphanumeric: true,
                minlength: 2,
                maxlength: 15
                
            },
            price: {
                required: true,
                min: 1,
                max: 99999
            },
           
            size: {
                min: 0,
                max: 50000
            },
            height: {
                min: 0,
                max: 1000
            },
            width: {
                min: 0,
                max: 1000
            },
            length: {
                min: 0,
                max: 1000
            },
            weight: {
                min: 0,
                max: 1000

            }
        },


        messages: {
            sku: {
                //alphanumeric: 'No special characters allowed'
            },

            name: {
                //alphanumeric: 'No special characters allowed'
            }
        },

        errorElement: 'label',
        wrapper: 'div',
        errorPlacement: function(error, element) {
            error.insertAfter(element.next('br')); // default function
        },
  

    });
    
 


 
    $('#submitbtn').on('click', function(event) {
        if($('#product_form').valid()) {
            $('#product_form').submit();
       } else {
           event.preventDefault();
       };
    });


    $("#sku").change(function(){
     
          let sku = $(this).val().trim();
     
          if((sku != '') && (sku.length >= 5) && (!$(this).hasClass('error'))){
     
             $.ajax({
                url: 'index.php',
                type: 'post',
                data: {sku:sku},
                success: function(response){
     
                   // Show response
                   $("#sku_response").html(response);
     
                }
             });
          }else{
             $("#sku_response").html("");
          }
     
    });
     




});