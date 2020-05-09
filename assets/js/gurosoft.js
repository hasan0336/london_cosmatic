$("#place").click(function(event){
    event.preventDefault();
    var fullname=$("#fullname").val();
    var email=$("#email").val();
    var country=$("#country").val();
    var state=$("#state").val();
    var zip=$("#zip").val();
    var proid=$("#proid").val();
    var qty=$("#qty").val();
    var totalprice=$("#totalprice").val();
    
    var url1=$('#checkoutForm').attr('action');

    $.ajax
    (
    {

        type:"post",
        url:url1,
        data:{fullname:fullname,email:email,country:country,state:state,zip:zip,proid:proid,totalprice:totalprice,qty:qty},
    }
    ).done(function( response){
        
       
         
          if( response.match('thanks') ){
              $("#payment").modal();
          }
          else{
             alert(response);
          }
        

    });


});