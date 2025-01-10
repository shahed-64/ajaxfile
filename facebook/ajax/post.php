<?php
	require_once "../libs/functions.php";

	$obj = new SoftBook;

	if( empty($_SESSION['soft-book-pic']) AND empty($_SESSION['soft-book-name']) ){
		header("location: index.php");
	}



  $post_content 	= $_POST['post-content'];


    $post_img 		= $_FILES['poimg']['name'];

    $exppp 			= explode('.',  $post_img);


    $pic_format 	= end($exppp);

    $upicname		=  md5(time() . $post_img ) .'.'.$pic_format ;


    $post_imgt 		= $_FILES['poimg']['tmp_name'];


    $post_author = $_SESSION['soft-book-name'];
    $post_author_img = $_SESSION['soft-book-pic'];

    $post_time = date('F d, Y');



    if( !empty($post_content) ){
      move_uploaded_file( $post_imgt , '../posts/'.$upicname);

        $obj -> data_post($post_author, $post_author_img, $post_time, $post_content, $upicname, $post_imgt );


    }else{

        echo "<script> alert('Content must not be Empty'); </script>";
    }






