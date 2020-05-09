<?php
session_start();
include_once "View/top_file.php";
include_once "Model/Product.php";
?>
</head>
<body>
<?php include_once "View/header.php";?>
<?php
  $proid = 0;
  $subcatid = 0;
        if(isset($_SESSION['cat'])){

            $proid=$_SESSION['cat'];

        }
        $prodetails=new Product();
        $pro=$prodetails->SelectCategory($proid);
        if(isset($_SESSION['subcat'])){
            $subcatid=$_SESSION['subcat'];
        }
        //$pro->proid;
       ?>

<style type="text/css">
  ul.breadcrumb li:last-child:after{border:0;}

.navbar1 {
  overflow: hidden;
  background-color: #f1f1f1;
}

.navbar1 a {
  float: left;
  font-size: 16px;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown1 {
  float: left;
  overflow: hidden;
}

.dropdown1 .dropbtn1 {
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

/*.navbar1 a:hover, .dropdown1:hover .dropbtn1 {
  background-color: red;
}*/

.dropdown1-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown1-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown1-content a:hover {
  background-color: #ddd;
}

.dropdown1:hover .dropdown1-content {
  display: block;
}


</style>


<main class="container-fluid showcase-catlist set-wd-slider-item-list">
<div class="container-fluid" style="padding-left:0px;">
    <ul class="breadcrumb" style="padding-left:0px;">
      <li style="padding-left:0px;"><a href="index.php">Home</a></li>
     <li><a href="Controller/SearchProduct.php?category=<?php echo $proid;?>"><?php echo $pro->product_category;?></a></li>
     <?php if($subcatid>0){?>
  <li><a href="Controller/SearchProduct.php?category=<?php echo $proid;?>&subcat=<?php echo $subcatid;?>"><?php $prodetails->getProdSubCatById($subcatid);?></a></li>
  <?php }?>
    </ul>
</div>




<div class="navbar1">
  
  <div class="dropdown1">
    <button class="dropbtn1">Category 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown1-content">
      <?php 
      $obj= new Product();
      $cat=$obj->ShowCategory();
      foreach ($cat as $c) { ?>
        <a href="Controller/SearchProduct.php?category=<?php echo $c->cat_id?>" title="" id="couturec"><?php echo $c->product_category?></a>
        <?php } ?>
    </div>
  </div> 
  <div class="dropdown1">
    <button class="dropbtn1">Style 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown1-content">
       <?php 
       $obj= new Product();
       $styles=$obj->ShowStyle();
   
     foreach ($styles as $s) {                                                                         
     ?>                                    
   <a href="Controller/SearchProduct.php?style=<?php echo $s->style_id;?>" title="" id="abcst" ><?php echo $s->product_style;?></a>
     <?php } ?>
    </div>
  </div>
  <div class="dropdown1">
    <button class="dropbtn1">Color 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown1-content">
      <?php 
       $obj= new Product();
       $colors=$obj->ShowColor();

       foreach ($colors as $co) {
           
      ?>
<a href="Controller/SearchProduct.php?color=<?php echo $co->color_id;?>" id="blackcl"><?php echo $co->product_color;?></a>
       <?php }?>
    </div>
  </div>
  <div class="dropdown1">
    <button class="dropbtn1">Brand 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown1-content">
      <?php 
     $obj= new Product();
      $brands=$obj->ShowBrand();

     foreach ($brands as $b) {

                ?>
    <a href="Controller/SearchProduct.php?brand=<?php echo $b->brand_id;?>" id="fanab"><?php echo $b->product_brand;?></a>

     <?php }?>
   
    </div>
  </div>
  <div class="dropdown1">
    <button class="dropbtn1">Price 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown1-content" style="padding: 10px">
       <li class="price_input_field" id="minp0; ?>" style="">Min:<input type="number" value="0" name="min" id="minp" onblur="getValuesPrice()" style="width: 100%; padding-left: 10px"></li>
       <li class="price_input_field" id="maxp0; ?>" style="">Max:<input type="number" value="0" name="max" id="maxp" onblur="getValuesPrice()" style="width: 100%; padding-left: 10px"></li>                     
     </div>
  </div>
</div>
                            
<!--Here Product image-->
 <div class="row my-4 ">
<?php  
$category=0;
   $subcat = 0;
   $style=0;
   $color=0;
   $brand=0;
  $obj= new Product();
  if(isset($_SESSION['cat']) || isset($_SESSION['style']) || isset($_SESSION['color']) || isset($_SESSION['brand']) || isset($_SESSION['subcat'])){
   
    $category=$_SESSION['cat'];
    $subcat = $_SESSION['subcat'];
    $style=$_SESSION['style'];
    $color=$_SESSION['color'];
    $brand=$_SESSION['brand'];
  }

  $products=$obj->SearchProduct($category,$subcat,$style,$color,$brand);

 foreach ($products as $pro) {

            ?>
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                 <div class="image img-hover-zoom">
                            <a href="Controller/DetailsProduct.php?proid=<?php echo $pro->proid;?>">
                                <img src="Product/<?php echo $pro->product_name ;?>/<?php echo $pro->product_image;?>" alt="orange-glory-shape-dress" title="orange-glory-shape-dress" class="card-img-top img-responsive" style="width: 100%; height:auto !important;">
                            </a>
                              
                        </div>
                <!--                      <div class="heartcss" id="mm_38" style="margin-top:-30px;">-->
                <!--    <a href="#">-->
                <!--    <img alt="" class="heartwidth" src="assets/img/heartsvg.svg" title="Add to Favourites"></a>-->
                     
                    <!-- <a href="javascript:void(0);"  onclick="addToFav(38)"><img alt="" class="heartwidth" src="assets/img/heartsvg.svg"></a> -->
                <!--</div>-->
               <div>
                   <br/><br/>
                    <p class="product-name-shop"><?php echo $pro->product_name;?></p>
                    <p class="product-name">£ <?php echo $pro->product_price;?></p>
               </div>
              
    </div>   
              
 <?php  }?>

                         
</main>

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