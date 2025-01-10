<?php  
	
	require_once "libs/functions.php";

	$obj = new SoftBook;

	if( !empty($_SESSION['soft-book-pic']) AND !empty($_SESSION['soft-book-name']) ){
		header("location: home.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facebook - log in or sign up</title>

	<!-- ========== main style file ============ -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	

	<!-- ========== favicon like ============ -->
	<link rel="shortcut icon" type="image/x-icon" href="images/favi.png">
</head>
<body>
	

	<!-- ========== Facebook header part start ============ -->
	<div class="fb-header">
		<div class="mid">
			<div class="logo">
				<img src="images/logo.png" alt="">
			</div>

			<?php  


				if( isset($_POST['submitlog']) ){

					$uname = $_POST['uname'];
					$upass = $_POST['upass'];

					if( empty($uname) || empty($upass) ){

						$message = "<p style='color:yellow; text-align:center;'>Field Must not be Empty</p>";

					}else {

						$message = $obj -> userLogin($uname, $upass);
					}

				}






			?>

			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="login-area">
					<div class="login1">
						<label for="">Email or Phone</label>
						<input name="uname" type="text">
					</div>
					<div class="login2">
						<label for="">Password</label>
						<input name="upass" type="password">
						<a href="#">Forgotten account?</a>
					</div>
					<div class="login3">
						<input type="submit" name="submitlog" value="Log In">
					</div>
				</div>
			</form>







		</div>
	</div>
	<!-- ========== Facebook header part end ============ -->


	

	<?php  


		if( isset($_POST['submit']) ){

			$fname 			= $_POST['fname'];
			$sname 			= $_POST['sname'];

			$name = $fname .' '. $sname ;


			$email_or_cell 	= $_POST['ec'];
			$pass 			= $_POST['np'];

			$pic 			= $_FILES['ppic']['name']; 
			$pict 			= $_FILES['ppic']['tmp_name']; 

			$exppp 			= explode('.', $pic);


			$pic_format 	= end($exppp);

			$upicname		=  md5(time() . $pic) .'.'.$pic_format ;


			$day = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];


			$date_of_birth = $month .' '. $day . ', '. $year;


			$gender 	 = $_POST['gender'];



			if( empty($fname) || empty($sname) || empty($email_or_cell) || empty($pass) || empty($pic) || empty($day) || empty($month) || empty($year) || empty($gender) ){


				$message = "<p style='color:yellow; text-align:center;'>Field Must not be Empty</p>";

			}else if( in_array( $pic_format , ['jpg','png','gif','jpeg'] ) == false ){

				$message = "<p style='color:yellow; text-align:center;'>Image format is invalid</p>";

			}else {


				$data = $obj -> userRegistration($name, $email_or_cell, $pass , $upicname, $pict, $date_of_birth, $gender  );

				$message = $data;


			}




		}





	?>

	<div class="messss">
	<?php  


	if( isset($message) ){

		echo $message;

	}



	?>
	</div>


	<!-- ========== Facebook body part start ============ -->
	<div class="fb-body">
		<div class="mid">
			<div class="body-left">
				<h2>Facebook helps you connect and share with the people in your life.</h2>
				<img src="images/user.png" alt="">
			</div>



			


			<div class="body-right">
				<h1>Create an account</h1>
				<h2>It's free and always will be.</h2>




				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
					<div class="input-area">
						<input name="fname" type="text" placeholder="First name">
						<input name="sname" type="text" placeholder="Surname">
						<input name="ec" type="text" placeholder="Mobile number or email address">
						<input name="np" type="password" placeholder="New password">
					</div>
					<div class="pic">



					
					<label for="picpic"><i class="fa fa-camera"></i></label> <input id="picpic" name="ppic" type="file">


					</div>
					<div class="birth-day">
						<h3>Birthday</h3>



							<select name="day">
							     <option value="">Day</option>
							     <option value="1">1</option>
							     <option value="2">2</option>
							     <option value="3">3</option>
							     <option value="4">4</option>
							     <option value="5">5</option>
							     <option value="6">6</option>
							     <option value="7">7</option>
							     <option value="8">8</option>
							     <option value="9">9</option>
							     <option value="10">10</option>
							     <option value="11">11</option>
							     <option value="12">12</option>
							     <option value="13">13</option>
							     <option value="14">14</option>
							     <option value="15">15</option>
							     <option value="16">16</option>
							     <option value="17">17</option>
							     <option value="18">18</option>
							     <option value="19">19</option>
							     <option value="20">20</option>
							     <option value="21">21</option>
							     <option value="22">22</option>
							     <option value="23">23</option>
							     <option value="24">24</option>
							     <option value="25">25</option>
							     <option value="26">26</option>
							     <option value="27">27</option>
							     <option value="28">28</option>
							     <option value="29">29</option>
							     <option value="30">30</option>
							     <option value="31">31</option>
							</select>

						     <select name="month">
						        <option value="">Month</option>
						        <option value="January">January</option>
						        <option value="February">February</option>
						        <option value="March">March</option>
						        <option value="April">April</option>
						        <option value="May">May</option>
						        <option value="June">June</option>
						        <option value="July">July</option>
						        <option value="August">August</option>
						        <option value="September">September</option>
						        <option value="October">October</option>
						        <option value="November">November</option>
						        <option value="December">December</option>
						     </select> 
						
						    
						
						     <select name="year">
						          <option value="">Year</option>
						          <option value="2018">2018</option>
						          <option value="2017">2017</option>
						          <option value="2016">2016</option>
						          <option value="2015">2015</option>
						          <option value="2014">2014</option>
						          <option value="2013">2013</option>
						          <option value="2012">2012</option>
						          <option value="2011">2011</option>
						          <option value="2010">2010</option>
						          <option value="2009">2009</option>
						          <option value="2008">2008</option>
						          <option value="2007">2007</option>
						          <option value="2006">2006</option>
						          <option value="2005">2005</option>
						          <option value="2004">2004</option>
						          <option value="2003">2003</option>
						          <option value="2002">2002</option>
						          <option value="2001">2001</option>
						          <option value="2000">2000</option>
						          <option value="1999">1999</option>
						          <option value="1998">1998</option>
						          <option value="1997">1997</option>
						          <option value="1996">1996</option>
						          <option value="1995">1995</option>
						          <option value="1994">1994</option>
						          <option value="1993">1993</option>
						          <option value="1992">1992</option>
						          <option value="1991">1991</option>
						          <option value="1990">1990</option>
						          <option value="1989">1989</option>
						          <option value="1988">1988</option>
						          <option value="1987">1987</option>
						          <option value="1986">1986</option>
						          <option value="1985">1985</option>
						          <option value="1984">1984</option>
						          <option value="1983">1983</option>
						          <option value="1982">1982</option>
						          <option value="1981">1981</option>
						          <option value="1980">1980</option>
						          <option value="1979">1979</option>
						          <option value="1978">1978</option>
						          <option value="1977">1977</option>
						          <option value="1976">1976</option>
						          <option value="1975">1975</option>
						          <option value="1974">1974</option>
						          <option value="1973">1973</option>
						          <option value="1972">1972</option>
						          <option value="1971">1971</option>
						          <option value="1970">1970</option>
						          <option value="1969">1969</option>
						          <option value="1968">1968</option>
						          <option value="1967">1967</option>
						          <option value="1966">1966</option>
						          <option value="1965">1965</option>
						          <option value="1964">1964</option>
						          <option value="1963">1963</option>
						          <option value="1962">1962</option>
						          <option value="1961">1961</option>
						          <option value="1960">1960</option>
						          <option value="1959">1959</option>
						          <option value="1958">1958</option>
						          <option value="1957">1957</option>
						          <option value="1956">1956</option>
						          <option value="1955">1955</option>
						          <option value="1954">1954</option>
						          <option value="1953">1953</option>
						          <option value="1952">1952</option>
						          <option value="1951">1951</option>
						          <option value="1950">1950</option>
						          <option value="1949">1949</option>
						          <option value="1948">1948</option>
						          <option value="1947">1947</option>
						          <option value="1946">1946</option>
						          <option value="1945">1945</option>
						          <option value="1944">1944</option>
						          <option value="1943">1943</option>
						          <option value="1942">1942</option>
						          <option value="1941">1941</option>
						          <option value="1940">1940</option>
						          <option value="1939">1939</option>
						          <option value="1938">1938</option>
						          <option value="1937">1937</option>
						          <option value="1936">1936</option>
						          <option value="1935">1935</option>
						          <option value="1934">1934</option>
						          <option value="1933">1933</option>
						          <option value="1932">1932</option>
						          <option value="1931">1931</option>
						          <option value="1930">1930</option>
						          <option value="1929">1929</option>
						          <option value="1928">1928</option>
						          <option value="1927">1927</option>
						          <option value="1926">1926</option>
						          <option value="1925">1925</option>
						          <option value="1924">1924</option>
						          <option value="1923">1923</option>
						          <option value="1922">1922</option>
						          <option value="1921">1921</option>
						          <option value="1920">1920</option>
						          <option value="1919">1919</option>
						          <option value="1918">1918</option>
						          <option value="1917">1917</option>
						          <option value="1916">1916</option>
						          <option value="1915">1915</option>
						          <option value="1914">1914</option>
						          <option value="1913">1913</option>
						          <option value="1912">1912</option>
						          <option value="1911">1911</option>
						          <option value="1910">1910</option>
						          <option value="1909">1909</option>
						          <option value="1908">1908</option>
						          <option value="1907">1907</option>
						          <option value="1906">1906</option>
						          <option value="1905">1905</option>
						          <option value="1904">1904</option>
						          <option value="1903">1903</option>
						          <option value="1902">1902</option>
						          <option value="1901">1901</option>
						          <option value="1900">1900</option>
						     </select>
					





						<a href="#">Why do I need to provide my date of birth?</a>
					</div>
					<div class="gender">



						<input name="gender" type="radio" value="Female" id="female"> <label for="female">Female</label>
						<input name="gender" type="radio" value="Male" id="male"> <label for="male">Male</label>




						<p>By clicking Create an account, you agree to our <a href="#">Terms</a> and confirm that you have read our <a href="#">Data Policy,</a> including our <a href="#">Cookie Use Policy.</a> You may receive SMS message notifications from Facebook and can opt out at any time.</p>



					</div>
					<div class="button">
						<input type="submit" name="submit" value="Create an account">
						<p> <a href="#">Create a Page</a> for a celebrity, band or business.</p>
					</div>
				</form>















			</div>

		</div>
	</div>
	<!-- ========== Facebook body part end ============ -->
	<!-- ========== Facebook Footer part start ============ -->
	<div class="fb-footer">
		<div class="mid">
			<div class="top-footer">
				<ul>
					<li><a href="#">English (UK)</a></li>
					<li><a href="#"> বাংলা</a></li>
					<li><a href="#">অসমীয়া</a></li>
					<li><a href="#">हिन्दी</a></li>
					<li><a href="#">नेपाली</a></li>
					<li><a href="#">Bahasa Indonesia</a></li>
					<li><a href="#"> العربية</a></li>
					<li><a href="#">中文(简体)</a></li>
					<li><a href="#">Bahasa Melayu</a></li>
					<li><a href="#">Español</a></li>
					<li><a href="#">Português (Brasil)</a></li>
				</ul>
			</div>
			<div class="middle-footer">
				<ul>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">Log In</a></li>
					<li><a href="#">Messenger</a></li>
					<li><a href="#">Facebook Lite</a></li>
					<li><a href="#">Mobile</a></li>
					<li><a href="#">Find Friends</a></li>
					<li><a href="#">People</a></li>
					<li><a href="#">Pages</a></li>
					<li><a href="#">Places</a></li>
					<li><a href="#">Games</a></li>
					<li><a href="#">Locations</a></li>
					<li><a href="#">Celebrities</a></li>
					<li><a href="#">Marketplace</a></li>
					<li><a href="#">Groups</a></li>
					<li><a href="#">Recipes</a></li>
					<li><a href="#">Sports</a></li>
					<li><a href="#">Look</a></li>
					<li><a href="#">Moments</a></li>
					<li><a href="#">Instagram</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Create ad</a></li>
					<li><a href="#">Create Page</a></li>
					<li><a href="#">Developers</a></li>
					<li><a href="#">Careers	</a></li>
					<li><a href="#">Privacy	</a></li>
					<li><a href="#">Cookies</a></li>
					<li><a href="#">AdChoices</a></li>
					<li><a href="#">Terms</a></li>
					<li><a href="#">Help</a></li>
				</ul>
			</div>
			<div class="bottom-footer">
				<p>Facebook © 2017</p>
			</div>
		</div>
	</div>
	<!-- ========== Facebook Footer part end ============ -->
											
										
		
		
  

</body>
</html>