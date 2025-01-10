<?php
	require_once "../libs/functions.php";

	$obj = new SoftBook;

	if( empty($_SESSION['soft-book-pic']) AND empty($_SESSION['soft-book-name']) ){
		header("location: index.php");
	}

    $postt = $obj -> PostShow();

    $i = 1;
    while( $ppppp = $postt -> fetch_assoc() ) : 

?>

<!-- Post show area start -->
<div class="post-show-area">
    <div class="post-author">
        <div class="author-image">
            <a href="#"><img src="profile-pic/<?php echo $ppppp['post_author_img']; ?>" alt=""></a>
        </div>
        <div class="author-info">
            <h3><a href="#"><?php echo $ppppp['post_author']; ?></a></h3>
            <p><?php echo $ppppp['post_date']; ?></p>
        </div>
    </div>
    <div class="post-content">
        <p><?php echo $ppppp['post_content']; ?></p>
        <img src="posts/<?php echo $ppppp['post_img']; ?>" alt="">
        <div class="like">
            <hr>
            <ul>
                <li><a href="#"><span></span> Like</a></li>
                <li><a href="#"><span></span> Comment</a></li>
                <li><a href="#"><span></span> Share</a></li>
            </ul>
        </div>
    </div>
    
</div>
<div class="post-comments">


        <div class="post-comment-content">
            <div class="comment-author-image">
                <img src="profile-pic/" alt="">
            </div>
            <div class="comment-content">
                <a href="#">Shahed Islam</a>
                <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, aperiam?</span>
            </div>
        </div>


        
        <!-- post a comment -->
        <div class="post-comment-content">
            <hr>
            <div class="comment-author-image">
                <img src="profile-pic/" alt="">
            </div>
            <form id="subCom" action="" method="POST">
                <div class="comment-content">
                    <input name="comm" type="text">
                </div>
            </form>
        </div>


</div>
<!-- Full post ends from here -->

<?php endwhile; ?>



</div>

