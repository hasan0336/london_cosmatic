<?php

 $file=$_FILES['upload']['tmp_name'];
 $file_name=$_FILES['upload']['name'];
	 $file_name_array=explode(".", $file_name);
	 $extension=end($file_name_array);
	 $new_image_name=rand(). '.'.$extension;
     $allowed_extension=array("jpg","jpeg","gif","png");
		if(in_array($extension, $allowed_extension)){
			move_uploaded_file($file,'upload/'.$new_image_name);

		}
		
    	
	 	$url='https://offthecornerstore.com/ofthecornernew/admin/upload/'.$new_image_name;
        $data = ['uploaded' =>2 , 'fileName' => $file_name, 'url' => $url];
echo json_encode($data);
?>