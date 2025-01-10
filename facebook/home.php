<?php  
	
	require_once "libs/functions.php";

	$obj = new SoftBook;

	if( empty($_SESSION['soft-book-pic']) AND empty($_SESSION['soft-book-name']) ){
		header("location: index.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facebook</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">

	<link rel="shortcut icon" type="image/x-icon" href="images/favi.png">



	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body class="home-body">
	

	<!-- Topbar section start  -->
	<div class="top-bar">
		<div class="mid-home">
			<div class="top-left">
				<div class="fb-logo">
					<a class="fb-home" href="#"><img src="images/fb-sada.png" alt=""></a>
				</div>
				<div class="fb-search">
					<input type="text" placeholder="Search Facebook" >
					<button><i class="fa fa-search"></i></button>
				</div>
			</div>
			<div class="top-right">
				<div class="icon-menu">
					<ul>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li> | </li>
						<li><a href="#"></a></li>
						<li><a href="#"></a>
							
							<div class="top-menu-bar">
									<ul>
										<li><a href="#">Create Page</a></li>
									</ul>
									<hr>
									<ul>
										<li><a href="#">Create Group</a></li>
										<li><a href="#">Nwe Group</a></li>
									</ul>
									<hr>
									<ul>
										<li><a href="#">Create Adds</a></li>
										<li><a href="#">Advertising on Facebook</a></li>
									</ul>
									<hr>
									<ul>
										<li><a href="#"> Activity Log </a></li>
										<li><a href="#"> News Feed Preference </a></li>
										<li><a href="#"> Settings </a></li>
										<li><a href="inc/logout.php"> Logout </a></li>
									</ul>
									<hr>
									<ul>
										<li><a href="#">Help</a></li>
										<li><a href="#"> Support Inbox</a></li>
										<li><a href="#"> Report a Problem</a></li>
									</ul>

							</div>

						</li>
					</ul>
				</div>
				<div class="user-menu">
					<ul>
						<li><a href="#"><img src="profile-pic/<?php echo $_SESSION['soft-book-pic']; ?>" alt=""></a></li>
						<li><a href="#"><?php echo $_SESSION['soft-book-name']; ?></a></li>
						<li><a href="#">Home</a></li>
					</ul>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Top bar ends -->
	<!-- fb body -->

	<div class="main-body">
		<div class="mid-home">
			<div class="left-area">
				<div class="user">
					<a href="#"><img src="profile-pic/<?php echo $_SESSION['soft-book-pic']; ?>" alt=""> <?php echo $_SESSION['soft-book-name']; ?>  </a>
				</div>
				<div class="news-sec">
					<ul>
						<li><a href="#"><span></span> News Feed</a></li>
						<li><a href="#"><span></span> Messenger</a></li>
					</ul>
				</div>

				<div class="groups-sec">
					<p>SHORTCUTS</p>
					<ul>
						<li><a href="#"><span></span> Softtech IT Batch 92</a></li>
						<li><a href="#"><span></span> Softtech IT Batch 87</a></li>
						<li><a href="#"><span></span> Softtech IT Batch 85</a></li>
						<li><a href="#"><span></span> Softtech IT Batch 70</a></li>
						<li><a href="#"><span></span> Softtech IT Batch 66</a></li>
					</ul>
				</div>

				<div class="eve-sec">
					<p>EXPLORE</p>
					<ul>
						<li><a href="#"><span></span> Events</a></li>
						<li><a href="#"><span></span> Groups</a></li>
						<li><a href="#"><span></span> Pages</a></li>
						<li><a href="#"><span></span> Friend Lists</a></li>
					</ul>
				</div>


			</div>
			<div class="main-area">

				<!-- Post input area start -->
				<div class="post-area">
					<div class="post-top">
						<ul>
							<li><a href="#"><span></span>Create a post</a></li>
							<li>|</li>
							<li><a href="#"><span></span>Photo / Video Album</a></li>
						</ul>
					</div>


					<form id="crps" action="" method="POST" enctype="multipart/form-data">
					<div class="post-middle">
						<div class="user-image">
							<img src="profile-pic/<?php echo $_SESSION['soft-book-pic']; ?>" alt="">
						</div>
						<div class="post-input">
							<textarea name="post-content" placeholder="What's on your mind ?"></textarea>
						</div>
					</div>



					<div class="post-bottom">
						<div class="p-left">
							<ul>
								<li><a href="#"></a></li>
								<li><a href="#"></a></li>
								<li><a href="#"></a></li>
								<li> 
									<label for="poimg"><i class="fa fa-camera"></i></label> <input style="width:0px; opacity:0;" id="poimg" name="poimg" type="file">
								</li>
							</ul>
						</div>
						<div class="p-right">
							<ul>
								<li><button><span></span> Public</button></li>
								<li><button name="submit" type="submit">Post</button></li>
							</ul>
						</div>
					</div>
					</form>
				</div>
				<!-- Post input area ends -->
			<div id="postshow" class="post_box">

			</div>
			</div>
			<div class="right-area" >
				
				<div class="your-page">
					<h2>Your Page</h2>
					<hr>
					<div class="page-info">
						<div class="page-image">
							<a href="#"><img src="images/page.png" alt=""></a>
						</div>
						<div class="page-details">
							<h3>আশরাফুল হক</h3>
							<ul>
								<li><a href="#"><span></span> Message</a></li>
								<li><a href="#"><span></span> Notification</a></li>
							</ul>
						</div>
					</div>
					<hr>

					<div class="camera">
						<div class="came">
							<span></span>
							<h4>Publish</h4>
						</div>
						<div class="came">
							<span></span>
							<h4>Photo</h4>
						</div>
						<div class="came">
							<span></span>
							<h4>Event</h4>
						</div>
						<div class="came">
							<span></span>
							<h4>Promote</h4>
						</div>
					</div>
					<div class="lvp">
						<ul>
							<li><a href="#">Like</a></li>
							<li><a href="#">View</a></li>
							<li><a href="#">Post</a></li>
						</ul>
					</div>
					<img src="images/ll.png" alt="">
				</div>



			</div>
		</div>
	</div>
	

<script src="js/jquery-1.11.3.min.js"></script>

<script>
	 $(document).ready(function() {
		$('#crps').submit(function(e){
            e.preventDefault();
			$.ajax({
                url : 'ajax/post.php',
                method : 'POST',
                data : new FormData(this),
                contentType : false, 
                processData : false,
                success : function(data){
                    $('#crps')[0].reset();
					allPostsData()  
                   
                }
                
            });
		});

		allPostsData()        
        function allPostsData(){
            $.ajax({
            url : 'ajax/postshow.php',
            success : function(data){
                $('#postshow').html(data);
            }

        });

        }

	 });
</script>
										

		
	

</body>
</html>