<?php
/*
Uploadify v2.1.4
Release Date: November 8, 2010

Copyright (c) 2010 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetFile =  str_replace('//','/',$targetPath). $_GET['rening'].$_FILES['Filedata']['name'];

	 $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	 $fileTypes  = str_replace(';','|',$fileTypes);
	 $typesArray = split('\|',$fileTypes);
	 $typesArray = array('gif','jpeg','jpg','png');
	
	 $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
	 if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		

		ini_set("memory_limit", "200000000"); 

		$max_upload_height = 300;
		$max_upload_width = 300;
	
		// if uploaded image was JPG/JPEG
		if($fileParts['extension'] == "jpeg" || $fileParts['extension'] == "jpg"){	
			$tempFile = imagecreatefromjpeg($_FILES['Filedata']["tmp_name"]);
		}		
		// if uploaded image was GIF
		if($fileParts['extension'] == "gif"){	
			$tempFile = imagecreatefromgif($_FILES['Filedata']["tmp_name"]);
		}			
		// if uploaded image was PNG
		if($fileParts['extension'] == "png"){
			$tempFile = imagecreatefrompng($_FILES['Filedata']["tmp_name"]);
		}
	
		imagejpeg($tempFile,$targetFile,100);
		chmod($targetFile,0644);
	

		// get width and height of original image
		list($image_width, $image_height) = getimagesize($targetFile);
	
		if($image_width>$max_upload_width || $image_height >$max_upload_height){
			$proportions = $image_width/$image_height;
			
			if($image_width>$image_height){
				$new_width = $max_upload_width;
				$new_height = round($max_upload_width/$proportions);
			}		
			else{
				$new_height = $max_upload_height;
				$new_width = round($max_upload_height*$proportions);
			}		
			
			
			$new_image = imagecreatetruecolor($new_width , $new_height);
			$tempFile = imagecreatefromjpeg($targetFile);
			
			imagecopyresampled($new_image, $tempFile, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
			imagejpeg($new_image,$targetFile,100);
			
			imagedestroy($new_image);
		}
		
		imagedestroy($tempFile);











      //  move_uploaded_file($tempFile,$targetFile);



		echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
	 } else {
	 	echo 'Invalid file type.';
	}
}
?>