<?php
include_once "../Model/Db_Connection.php";

     $heading = $_POST['heading'];
     $hidden  = $_POST['hidden'];
     if ($hidden!='paypal') {
         $editor1 = $_POST['editor1'];
     }
     
    
  //   $barclay=$_POST['barclay'];

    if($hidden=="dr"){
        $db_obj=Db_Connection::db_connect();
        $updatedr="UPDATE `deliverandreturn` SET `heading`='$heading', `content`='$editor1'";
        
        $result=$db_obj->query($updatedr);
        if($result){
             echo "<script>window.location.replace('../admin/index1.php'); alert('Successfuly Update');</script>";
        }
        else{
           echo "<script>window.location.replace('../admin/index1.php'); alert('Sorry Try again');</script>";
        }
    }
    elseif($hidden=="designer"){
        $db_obj=Db_Connection::db_connect();
        $updatedr="UPDATE `designs` SET `heading`='$heading', `content`='$editor1'";
        
        $result=$db_obj->query($updatedr);
        if($result){
            echo "<script>window.location.replace('../admin/index1.php'); alert('Successfuly Update');</script>";
        }
        else{
           echo "<script>window.location.replace('../admin/index1.php'); alert('Sorry Try again');</script>";
        }

    }
    elseif($hidden=="faq"){
        $db_obj=Db_Connection::db_connect();
        $updatedr="UPDATE `faqs` SET `heading`='$heading', `content`='$editor1'";
        
        $result=$db_obj->query($updatedr);
        if($result){
           echo "<script>window.location.replace('../admin/index1.php'); alert('Successfuly Update');</script>";
        }
        else{
           echo "<script>window.location.replace('../admin/index1.php'); alert('Sorry Try again');</script>";
        }

    }
    elseif($hidden=="lodonstore"){
        $db_obj=Db_Connection::db_connect();
        $updatedr="UPDATE `lodonstore` SET `heading`='$heading', `content`='$editor1'";
        
        $result=$db_obj->query($updatedr);
        if($result){
            echo "<script>window.location.replace('../admin/index1.php'); alert('Successfuly Update');</script>";
        }
        else{
           echo "<script>window.location.replace('../admin/index1.php'); alert('Sorry Try again');</script>";
        }

    }
    elseif($hidden=="tc"){
        $db_obj=Db_Connection::db_connect();
        $updatedr="UPDATE `termandcondition` SET `heading`='$heading', `content`='$editor1'";
        
        $result=$db_obj->query($updatedr);
        if($result){
           echo "<script>window.location.replace('../admin/index1.php'); alert('Successfuly Update');</script>";
        }
        else{
           echo "<script>window.location.replace('../admin/index1.php'); alert('Sorry Try again');</script>";
        }

    }
    elseif($hidden=="car"){
        $db_obj=Db_Connection::db_connect();
        $updatedr="UPDATE `careers` SET `heading`='$heading', `content`='$editor1'";
        
        $result=$db_obj->query($updatedr);
        if($result){
          echo "<script>window.location.replace('../admin/index1.php'); alert('Successfuly Update');</script>";
        }
        else{
           echo "<script>window.location.replace('../admin/index1.php'); alert('Sorry Try again');</script>";
        }

    }
    elseif($hidden=="catactus"){
        $db_obj=Db_Connection::db_connect();
       $updatedr="UPDATE `contactus` SET `heading`='$heading', `content`='$editor1'";
        
        $result=$db_obj->query($updatedr);
        if(!$result){
            $db_obj->error;
        }
        if($result){
             echo "<script>window.location.replace('../admin/index1.php'); alert('Successfuly Update');</script>";
        }
    
       else{
           echo "<script>window.location.replace('../admin/index1.php'); alert('Sorry Try again $db_obj->error');</script>";
        }
        

    }
    elseif($hidden=="aboutus"){
        $db_obj=Db_Connection::db_connect();
        $updatedr="UPDATE `aboutus` SET `heading`='$heading', `content`='$editor1'";
        
        $result=$db_obj->query($updatedr);
        if($result){
            echo "<script>window.location.replace('../admin/index1.php'); alert('Successfuly Update');</script>";
        }
        else{
           echo "<script>window.location.replace('../admin/index1.php'); alert('Sorry Try again');</script>";
        }

    }
    elseif($hidden=="paypal"){
        $db_obj=Db_Connection::db_connect();
        $updatedr="UPDATE `paypal` SET `paypal_email`='$heading'";
        $result=$db_obj->query($updatedr);
        if($result){
            $data['res']=array(

                'msg'=>'<span style="color:green">PayPal Email Updated Successfully </span>',
                'status'=>200,
            );
        }
        else{
            $data['res']=array(
                'msg'=>'<span style="color:red">Error: in updating form</span>',
                'status'=>300,
            );
        }
        print_r(json_encode($data));
    }

    // elseif($hidden=="barclay"){

    // $db_obj=Db_Connection::db_connect();
    //     $updatedr="UPDATE `barclay` SET `barclay_pw`='$heading',`pspid`='$editor1'";
        
    //     $result=$db_obj->query($updatedr);
        
    //     if($result){
    //       echo "<script>window.location.replace('../admin/index1.php'); alert('Successfuly Update');</script>";
    //     }
    //     else{
    //       echo "<script>window.location.replace('../admin/index1.php'); alert('Sorry Try again');</script>";
    //     }
    // }
    elseif($hidden=="barclay"){

    $db_obj=Db_Connection::db_connect();
        $updatedr="UPDATE `barclay` SET `barclay_pw`='$heading',`pspid`='$editor1'";
        
        $result=$db_obj->query($updatedr);
        
        if($result){
           echo "<script>window.location.replace('../admin/index1.php'); alert('Successfuly Update');</script>";
        }
        else{
           echo "<script>window.location.replace('../admin/index1.php'); alert('Sorry Try again');</script>";
        }
    }
    elseif($hidden=="event"){

        $db_obj=Db_Connection::db_connect();
            $updatedr="UPDATE `manageevent` SET `content`='$editor1'";
            
            $result=$db_obj->query($updatedr);
            
            if($result){
               echo "<script>window.location.replace('../admin/index1.php'); alert('Successfuly Update');</script>";
            }
        }
        else{
           echo "<script>window.location.replace('../admin/index1.php'); alert('Sorry Try again');</script>";
        }

?>