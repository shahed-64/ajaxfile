<?php  

	require_once "config.php";
	
		
	class SoftBook {

		private $host =  HOST ;
		private $user =  USER;
		private $pass =  PASS ;
		private $db =  DB ;

		private $connection ;



		public function __construct(){

			session_start();

			$conn = new mysqli( $this -> host , $this -> user , $this -> pass, $this -> db );

			$this -> connection = $conn;

		}

		// for user registration 
		public function userRegistration($name, $email_or_cell, $pass , $upicname, $pict, $date_of_birth, $gender ) {


			 $this -> connection -> query("INSERT INTO user (name, cell_email, pass, pic,  dateof, gender) VALUES ('$name','$email_or_cell','$pass','$upicname','$date_of_birth','$gender ')");


			 move_uploaded_file( $pict , 'profile-pic/'. $upicname);

			return "<p style='color:green; text-align:center;'>User Registration ok</p>";


		}


		// for user login 
		public function userLogin($uname, $upass){


			$data = $this -> connection -> query("SELECT * FROM user WHERE cell_email = '$uname' AND pass='$upass'");


			$row = $data  -> num_rows ;


			if( $row == 1 ){


				while($ddd =  $data -> fetch_assoc() ){

					$_SESSION['soft-book-name'] = 	$ddd['name'];
					$_SESSION['soft-book-pic'] = 	$ddd['pic'];

				}



				header("location: home.php");
			}else{

				return "<p style='color:yellow; text-align:center;'>Wrong username or password</p>";

			}

		}



		// post method 

		public function data_post($post_author, $post_author_img, $post_time, $post_content, $upicname, $post_imgt ) {


			$this -> connection -> query("INSERT INTO post (post_author , post_author_img,  post_date ,  post_content,  post_img) VALUES ('$post_author','$post_author_img',' $post_time','$post_content','$upicname')");

			move_uploaded_file( $post_imgt , 'posts/'. $upicname );


		}

		// post doiya anbooo

		public function PostShow(){

			$data = $this -> connection -> query("SELECT * FROM post ORDER BY post_id DESC");

			return $data;


		}




	}


	







?>