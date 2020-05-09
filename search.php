<?php
session_start();
include_once "View/top_file.php";
include_once "Model/Product.php";
?>
</head>
<body>
<?php include_once "View/header.php";?>
<div class="container">
<ul class="breadcrumb">
  <li><a href="index11.php">Home</a></li>
  <li><a href="search.php">Search</a></li>
</ul>
</div>
<br/>
<br/>
<main class="container-fluid showcase-catlist">
<div class="row">  
              
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                        <ul class="menu-item">
                            <li class="wd-20">
                                <div class="dropdown">
                                  <button class="drop-down-btn2 dropdown-toggle sm-wid" type="button" data-toggle="dropdown"><span id="CategoryHeading">Category</span>
                                  <span class="caret"></span></button>
                                                                      <ul class="dropdown-menu add_scroll">

                                 
                                                                          <?php 
                                                                           $obj= new Product();
                                                                           $cat=$obj->ShowCategory();
                                       
                                                                           foreach ($cat as $c) {
                                                                               
                                                                          ?>
                                                                           <li style=""><a href="Controller/SearchProduct.php?category=<?php echo $c->cat_id?>" title="" id="couturec"><?php echo $c->product_category?></a></li>
                                  
                                                                           <?php } ?>
                                    <!-- <li>2</li>
                                    <li>3</li>
                                    <li>4</li> -->
                                  </ul>
                                </div>
                            </li>
                            <li class="wd-20">
                                <div class="dropdown">
                                  <button class="drop-down-btn2 dropdown-toggle sm-wid" type="button" data-toggle="dropdown"><span id="StyleHeading">Style</span>
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu add_scroll">
                                                                     <!-- <li style=""><a href="javascript:void(0);" title="" onclick="setValuesStyle()">All</a></li> -->

                                           <?php 
                                           $obj= new Product();
                                           $styles=$obj->ShowStyle();
                                       
                                         foreach ($styles as $s) {                                                                         
                                         ?>                                    
                                       <li  style=""><a href="Controller/SearchProduct.php?style=<?php echo $s->style_id;?>" title="" id="abcst" ><?php echo $s->product_style;?></a></li>
                                         <?php } ?>
                                      
                                                                        <!-- <li>1</li>
                                    <li>2</li>
                                    <li>3</li>
                                    <li>4</li> -->
                                  </ul>
                                </div>
                            </li>
                            <li class="wd-20">
                                <div class="dropdown">
                                  <button class="drop-down-btn2 dropdown-toggle sm-wid" type="button" data-toggle="dropdown"><span id="ColorHeading">Color</span>
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu add_scroll">
                                                                <!-- <li style=""><a href="javascript:void(0);" title="" onclick="setValuesColor()">All</a></li> -->
                                                                <?php 
                                                                           $obj= new Product();
                                                                           $colors=$obj->ShowColor();
                                       
                                                                           foreach ($colors as $co) {
                                                                               
                                                                          ?>
                                                                   <li id="blackcl0" style=""><a href="Controller/SearchProduct.php?color=<?php echo $co->color_id;?>" id="blackcl"><?php echo $co->product_color;?></a></li>
                                                                           <?php }?>
                                                                        <!-- <li>1</li>
                                    <li>2</li>
                                    <li>3</li>
                                    <li>4</li> -->
                                  </ul>
                                </div>
                            </li>
                            <li class="wd-20">
                                <div class="dropdown">
                                  <button class="drop-down-btn2 dropdown-toggle sm-wid" type="button" data-toggle="dropdown"><span id="BrandHeading">Brand</span>
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu add_scroll">
  <!-- <li style=""><a href="javascript:void(0);" title="" onclick="setValuesBrand()">All</a></li> -->
  <?php 
                                                               $obj= new Product();
                                                                $brands=$obj->ShowBrand();
                                       
                                                               foreach ($brands as $b) {
                                          
                                                                          ?>
                                                              <li style=""><a href="Controller/SearchProduct.php?brand=<?php echo $b->brand_id;?>" id="fanab"><?php echo $b->product_brand;?></a></li>
                                       
                                                               <?php }?>
                                                                       <!-- <li>1</li>
                                    <li>2</li>
                                    <li>3</li>
                                    <li>4</li> -->
                                  </ul>
                                </div>
                            </li>
                            <li class="wd-20">
                                <div class="dropdown">
                                  <button class="drop-down-btn2 dropdown-toggle sm-wid" type="button" data-toggle="dropdown">Price
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu">
                                                <!--   <li id="p0" style=""><a href="javascript:void(0);" id="p" onclick="getValuesPrice(this.id)"></a></li> -->


                                       <li class="price_input_field" id="minp0; ?>" style="">Min:<input type="number" value="0" name="min" id="minp" onblur="getValuesPrice()" style="width: 100%;"></li>
                                        <li class="price_input_field" id="maxp0; ?>" style="">Max:<input type="number" value="0" name="max" id="maxp" onblur="getValuesPrice()" style="width: 100%;"></li>
                                                                      </ul>
                                </div>
                            </li>
                            <li>
                                <form action="searchproduct.php" method="get" id="serachForm" onsubmit="return validateForm()">
                                <!-- <input type="hidden" name="categoryh" id="categoryh" value=""> -->
                                <input type="hidden" name="categoryh" id="categoryh" value="shawlsc">
                                <input type="hidden" name="styleh" id="styleh" value="">
                                <input type="hidden" name="colorh" id="colorh" value="">
                                <input type="hidden" name="brandh" id="brandh" value="">
                                <input type="hidden" name="minpriceh" id="minpriceh" value="">
                                <input type="hidden" name="maxpriceh" id="maxpriceh" value="">
                                <input type="hidden" name="sortbyh" id="sortbyh" value="">
                                <!-- <button type="submit" class="menu-search-icon"><span class="float-right" ><img class="float-right" src="assets/img/searchIcon.png"/></span></button> -->
                                </form>
                            </li>   
                        </ul>
                        <!--</div>-->
                </div>
            </div>
<!--Here Product image-->
<div class="row my-4">
<?php  
  $obj= new Product();
  $name=$_POST['search'];
  $products=$obj->Search($name);

 foreach ($products as $pro) {

            ?>
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 set-wd-slider-item">
                 <div class="image img-hover-zoom">
                            <a href="Controller/DetailsProduct.php?proid=<?php echo $pro->proid;?>">
                                <img src="Product/<?php echo $pro->product_name ;?>/<?php echo $pro->product_image;?>" alt="orange-glory-shape-dress" title="orange-glory-shape-dress" class="card-img-top img-responsive" style="width: 100%;height: 100% !important;">
                            </a>
                              
                        </div>
               <div>
                   <br/><br/>
                    <p class="product-name-shop"><?php echo $pro->product_name;?></p>
                  <p class="product-name">£ <?php echo $pro->product_price;?></p>
               </div>
              
              </div>   
              
 <?php  }?>
 
                         
</main>
<div class="container">
    <?php
    
    include_once "View/productslider.php";
    ?>
</div>
<?php

include_once "View/fotter.php";
include_once "View/bottom_file.php";

?>
    <script>
        timeline(document.querySelectorAll('.timeline'), {
            forceVerticalMode: 700,
            mode: 'horizontal',
            verticalStartPosition: 'left',
            visibleItems: 4
        });
        $(function(){
            // Enables popover
            $("[data-toggle=popover]").popover();
        });
    </script>
    

<script>
//change price on size
function changePrice(sizee, s) {
  //alert(s);
     var price = $('#p_'+sizee).val();
     $('#originalPrice').html("£"+price+".00");
     $('#selected_size_id').html("<b>"+s+"</b>");
     $('#selectedPrice').val(price);
     var linkText = $('#s_'+sizee).text();
     $('#selectedSize').val(linkText);

}

//change payment method
// function paymentMethod(name) {

//      $('#paymentMethod').val(name);

//      if (name == 'visa') {
//       document.getElementById("payment1").setAttribute("style", "background-color: gray;");
//       document.getElementById("payment2").removeAttribute("style");
//       document.getElementById("payment3").removeAttribute("style");
      
//      }
//      if (name == 'master') {
//       document.getElementById("payment2").setAttribute("style", "background-color: gray;");
//       document.getElementById("payment1").removeAttribute("style");
//       document.getElementById("payment3").removeAttribute("style");
//      }
//      if (name == 'mastero') {
//       document.getElementById("payment3").setAttribute("style", "background-color: gray;");
//       document.getElementById("payment2").removeAttribute("style");
//       document.getElementById("payment1").removeAttribute("style");
//      }

// }

// quantity add/minus
$(function(){
  $('#add').click(function(e){
    e.preventDefault();
    var quantity = $('#quantity').val();
    quantity++;
    $('#quantity').val(quantity);
  });
  $('#minus').click(function(e){
    e.preventDefault();
    var quantity = $('#quantity').val();
    if(quantity > 1){
      quantity--;
    }
    $('#quantity').val(quantity);
  });

refreshFav();

});

// change thumbnail to featured image
function changeImage(x){

  document.getElementById('myimage').src = x.src;
  $(".magnifyarea").find('img').attr('src',x.src);
}

$(function(){
  $('#navbar-search-input').focus(function(){
    $('#searchBtn').show();
  });

  $('#navbar-search-input').focusout(function(){
    $('#searchBtn').hide();
  });

getCart();
getBagDetails();
getCartOnCheck();
refreshFav();

  $('#productForm').submit(function(e){
    e.preventDefault();
    var product = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'cart_add.php',
      data: product,
      dataType: 'json',
      success: function(response){
        $('#callout').show();
        $('.message').html(response.message);
        if(response.error){
          $('#callout').removeClass('alert alert-success').addClass('alert alert-danger');
        }
        else{
        $('#callout').removeClass('alert alert-danger').addClass('alert alert-success');
        
        // location.reload();
        getCart();
        getBagDetails();
        getCartOnCheck();
        refreshFav();
        }
      }
    });
  });

// function addToFav(id) {
//   alert(id);
//       $.ajax({
//       type: 'POST',
//       url: 'addFavourite.php',
//       data: id,
//       dataType: 'json',
//       success: function(response){
//         alert("added as favourite");
//         // $('#callout').show();
//         // $('.message').html(response.message);
//         // if(response.error){
//         //   $('#callout').removeClass('alert alert-success').addClass('alert alert-danger');
//         // }
//         // else{
//         // $('#callout').removeClass('alert alert-danger').addClass('alert alert-success');
//         // }
//       }
//     });
// }

  $(document).on('click', '.close', function(){
    $('#callout').hide();
  });

});

function getCart(){
  $.ajax({
    type: 'POST',
    url: 'cart_fetch.php',
    dataType: 'json',
    success: function(response){
      $('#cart_menu').html(response.list);
      $('.cart_count').html(response.count);
    }
  });
  refreshFav();
}

function getCartOnCheck(){
  $.ajax({
    type: 'POST',
    url: 'getCartOnCheck.php',
    dataType: 'json',
    success: function(response){
      //alert(response.output);
      //alert(response.outputTotal);
      $('#right123').html(response.output);
      $('.right456').html(response.outputTotal);
      $('.subright456').html(response.suboutputTotal);
      document.getElementById("total").value = response.outputPrice;
    }
  });
}

function getBagDetails(){
  $.ajax({
    type: 'POST',
    url: 'cart_bag_details.php',
    dataType: 'json',
    success: function(response)
    {
      // alert(response.output);
      // alert(response.outputTotal);
      // $('#bagproduct1').html(response.output);
      // $('#bagproductId2').html(response.outputTotal);

var yourElement = document.getElementById("chaticon");
var dataVal = yourElement.getAttribute("data-content");
var newData = response;
yourElement.setAttribute("data-content",newData);

    }
  });
  refreshFav();
}


  function refreshFav() {
    $.ajax({
      type: 'POST',
      url: 'refreshFav.php',
      dataType: 'json',
      success: function (response) {
        $('#favBadge').html(response.fav);
        $('#shoppingCartBadge').html(response.shopCart);
        // alert(response.fav);
        // alert(response.shopCart);
      }
    });
  }

  $(document).ready(function() {
  $('#media').carousel({
    pause: true,
    interval: false,
  });
});


$(".navbar-toggler").click(function(){
$("#yummyfood-nav").toggle();
});
$(".navbar-toggler2").click(function(){
$("#bottom-div").toggle();
});
$(".navbar-toggler3").click(function(){
$("#bottom-bar").toggle();
});
$('#checkoutForm').on('submit', function(e){
  $('#checkoutModal').modal('show');

   var totalprice = $('input[name=total]').val();
    //alert(totalprice);
    totalprice = totalprice.replace(/,/g, "");
   /*var fullname = $('input[name=fullname]').val();
   var email = $('input[name=email]').val();
   var country = $('input[name=country]').val();
   var state = $('input[name=state]').val();
   var zip = $('input[name=zip]').val();

   $.post("/NK_new/details.php", {"fullname": fullname,"email": email,"country": country,"state": state,"zip": zip});*/
  $('input[name=amount]').val(totalprice);
  e.preventDefault();
});


function credit_debit(name,email,country,state,zip,total){
  //var formdata = $('#checkoutForm').serialize();
  //alert(name+"+"+email+"+"+country+"+"+state+"+"+zip);
  var  queryString = "?name=" + name + "&email=" + email + "&country=" + country + "&state=" + state + "&zip=" + zip + "&total=" + total;
  window.location.href = '/NK_new/barclaycard.php' + queryString;
  /* $.ajax({
    type: 'POST',
    url: 'barclaycard.php',
    data: {name:name,email:email,country:country,state:state,zip:zip},
    dataType: 'json',
    success: function(response)
    {
      // alert(response.output);
      // alert(response.outputTotal);

    }
  });*/


}

$("#hide").click(function(){
  $("#search-form").toggle();
  $("#hide").hide();
});
/*
$(".carousel-inner > div:gt(0)").hide();

setInterval(function() { 
  $('.carousel-inner > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('.carousel-inner');
},  5000);
*/
  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 6000
    })
  });

$('.menu-search-icon').click(function() {
    $('.menu-search-icon').css({
        'border': 'none'
    });
});

</script></footer>
</body>
</html>
<script>
    function slugify(string)
    {
var preps = new Array('in', 'at', 'on', 'by', 'into', 'off', 'onto', 'from', 'to', 'with', 'a', 'an', 'the', 'using', 'for');

    var pattern = '/\b(?:' + preps.join('|') + ')\b/i';
    $string = preg_replace($pattern, '', $string);
$string = preg_replace('~[^\\pL\d]+~u', '-', $string);
$string = trim($string, '-');
$string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
$string = strtolower($string);
$string = preg_replace('~[^-\w]+~', '', $string);

return $string;

}

    function addToFav(id) {

        $.ajax({
        type: "POST",
        url: "addFavourite.php",
        data: {id: id},
        success: function(response)
        {
           // location.reload();
            if (response == '"Item marked as Favourite"')
            {
                $('#m_'+id).addClass('heart-selected');
                $('#m_'+id).removeClass('heart');
                sweetAlert("", 'Added To Favourite', "success");
            }
            if(response == '"Item unmarked as Favourite"') {
                $('#m_'+id).addClass('heart');
                $('#m_'+id).removeClass('heart-selected');
                sweetAlert("", 'Remove From Favourites', "success");
            }
            //Swal(response);
            // sweetAlert("", response, "success");
            refreshFav();
        }
        });

}

function getValuesCat(id)
{       
var text = $('#'+id).text();
var pid = $('#preCid').val();
if (pid != "") {document.getElementById(pid+'0').removeAttribute("style");}

document.getElementById(id+'0').setAttribute("style", "background-color: gray;");
// $('#categoryh').val(text);
$('#categoryh').val(id);
$('#preCid').val(id);
$('#CategoryHeading').text(text);

serachFormSubmit();
}

function setValuesCat()
{       
var pid = $('#preCid').val();
if (pid != "") {document.getElementById(pid+'0').removeAttribute("style");}

$('#categoryh').val('');
$('#preCid').val('');
$('#CategoryHeading').text('Category');

serachFormSubmit();
}

function getValuesStyle(id)
{       
var text = $('#'+id).text();
var pid = $('#preStid').val();
if (pid != "") {document.getElementById(pid+'0').removeAttribute("style");}
document.getElementById(id+'0').setAttribute("style", "background-color: gray;");
$('#styleh').val(text);
$('#preStid').val(id);
$('#StyleHeading').text(text);

serachFormSubmit();
}

function setValuesStyle()
{       
var pid = $('#preStid').val();
if (pid != "") {document.getElementById(pid+'0').removeAttribute("style");}
$('#styleh').val('');
$('#preStid').val('');
$('#StyleHeading').text('Style');

serachFormSubmit();
}

function getValuesColor(id)
{       
var text = $('#'+id).text();
var pid = $('#preClid').val();
if (pid != "") {document.getElementById(pid+'0').removeAttribute("style");}
document.getElementById(id+'0').setAttribute("style", "background-color: gray;");
$('#colorh').val(text);
$('#preClid').val(id);
$('#ColorHeading').text(text);

serachFormSubmit();
}

function setValuesColor()
{       
var pid = $('#preClid').val();
if (pid != "") {document.getElementById(pid+'0').removeAttribute("style");}
$('#colorh').val('');
$('#preClid').val('');
$('#ColorHeading').text('Color');

serachFormSubmit();
}

function getValuesBrand(id)
{       
var text = $('#'+id).text();
var pid = $('#preBid').val();
if (pid != "") {document.getElementById(pid+'0').removeAttribute("style");}
document.getElementById(id+'0').setAttribute("style", "background-color: gray;");
$('#brandh').val(text);
$('#preBid').val(id);
$('#BrandHeading').text(text);

serachFormSubmit();
}

function setValuesBrand()
{       
var pid = $('#preBid').val();
if (pid != "") {document.getElementById(pid+'0').removeAttribute("style");}
$('#brandh').val('');
$('#preBid').val('');
$('#BrandHeading').text('Brand');

serachFormSubmit();
}

function getValuesPrice()
{  
  var min , max = "";
  min = $('#minp').val();
  // min = parseInt(min);
  max = $('#maxp').val();
  // max = parseInt(max);

    // var min = document.getElementById('minp');
    // var max = document.getElementById('maxp');
    if (min == "") {$('#minp').val('0');}
    if (max == "") {$('#maxp').val('0');}
    
    if (min != "") {
      min = parseInt(min);
    }
    if (max != "") {
      max = parseInt(max);
    }

    // if ( max != 0) {

   if (min > max) {
   // alert('minimum price is not greater than maximum price');
    // $('#minp').val('0');
    // $('#minpriceh').val('0');
   }else{
    $('#minpriceh').val(min);
    $('#maxpriceh').val(max);
    serachFormSubmit();
   }

   // if (min > max) {
   // // alert('minimum price is not greater than maximum price');
   // // $('#minp').val('0');
   // // $('#minpriceh').val('0');
   // }else{
   // $('#minpriceh').val(min);
   // $('#maxpriceh').val(max);
   
   // serachFormSubmit();
   // }


    // }

   
// var text = $('#'+id).text();
// alert(text);
// var pid = $('#prePid').val();
// if (pid != "") {document.getElementById(pid+'0').removeAttribute("style");}
// document.getElementById(id+'0').setAttribute("style", "background-color: gray;");
// $('#priceh').val(text);
// $('#prePid').val(id);

}

function getValuesSort(id)
{       
var text = $('#'+id).text();

if (text == 'Today Most Viewed') {
  text = 'counter DESC';
}
if (text == 'Lowest price') {
  text = 'price ASC';
}
if (text == 'Highest price') {
  text = 'price DESC';
}
var pid = $('#preSid').val();
if (pid != "") {document.getElementById(pid+'0').removeAttribute("style");}
document.getElementById(id+'0').setAttribute("style", "background-color: gray;");
$('#sortbyh').val(text);
$('#preSid').val(id);
serachFormSubmit();

}
</script>
<script>
function validateForm() 

{
    // var preCid = $('#categoryh').val();
    // var preSti = $('#styleh').val();
    // var preCli = $('#colorh').val();
    // var preBid = $('#brandh').val();
    // // var prePid = $('#priceh').val();

    // if (preCid == "") {
    //     if (preSti == "") {
    //         if (preCli == "") {
    //             if (preBid == "") {
    //                 // if (prePid == "") {
    //                         alert("Kindly select at least one option.");
    //                         return false;
    //                 // }
    //             }
    //         }
    //     }
    // }

}
</script>
<script>
  function serachFormSubmit() {
      $('#serachForm').submit();
  }
</script>
</body>
</html>