<?php 
include "header.php";
// define variables and set to empty values
$nameErr = $companyErr = $phoneErr = $emailErr =  $contactmebyErr = $commentErr = "";
$name = $company =  $phone = $email =  $comment =  "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["name"])){
		$nameErr = "Name is required";
	}else{
  		$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$nameErr = "Only Letters and white space allowed";
		}
	}
	if(empty($_POST["company"])){
		$companyErr = "Required Field";
	}else{
		$company = test_input($_POST["company"]);
	}
	if(empty($_POST["phone"])){
		$phoneErr = "Phone  is required";
	}else{
		$phone = test_input($_POST["phone"]);
		if (!preg_match("/^[\+0-9\-\(\)\s]*$/",$phone)){
			$phoneErr = "Numeric Value only";
		}
	}
	if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  if(empty($_POST["comment"])){
		$commentErr = "Required Field";
	}else{
		$comment = test_input($_POST["comment"]);
	}
  

  
	
	// *** Captcha Plugin
  /*
	if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          $captchaErr = 'Please verify that you are not a robot.';      
        }
        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdaDwcTAAAAAO2BPdBkizan8k5qlIBshQ_jmB2b&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        */
	//**** End Captcha		
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$to = "rzd@rickzebradesigns.com";
$totalMessage = "Message from TWG Website Contact Form.\r\r
Name: $name \r
Company: $company\r
Phone: $phone\r
Email: $email\r
Message: $comment\r";
$subject = "Message from TWG Website Contact Form";


if(isset($_POST['submitted'])) {
  if ($nameErr.$companyErr.$phoneErr.$emailErr.$commentErr== "") { 
  	mail ($to, $subject, $totalMessage, "From: ". $email);
    $emailsent="Thank you for your request<br/>We will contact you as soon as possible";
  
  }
}
?>
<body>
        <header >
<nav>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                  <nav class="pull">
                    <ul class="top-nav">
                      <li><a href="index.php#intro">Who We Are <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a href="index.php#features">Our Services <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a href="index.php#responsive">Responsive Design <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a href="index.php#portfolio">Portfolio <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a href="index.php#team">Team <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a href="index.php#contact">Company Information<span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a href="consult.php">Request a Consultation<span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a href="contact.php">Contact Us<span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a href="blog/">Our Blog<span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a href="Login/">Client Login<span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </nav>
</header>
<section class="consultpage">
        <div class="container">
        <div class="row">
            <div class="col-xs-8 col-sm-4">
                  <a href="index.php"><img src="images/geeks-logo.png" width="80%;"  alt=""/></a>
                </div>
                <div class="col-sm-8 text-right navicon">
                
                  <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
                </div>
              </div>
        </div>
        </section>

        <section class="title-bread" >
      <div class="container">
            <div class="row">
              <div class="col-md-12">
                <p >Contact Us</p>
              </div>
            </div>
            <ol class="breadcrumb crumbs">
              <li><a href="index.php">Home</a></li>
              <li>Contact Us</li>
            </ol>
          </div>
    </section>
    
    
    
    

 <section class="consult" id="consult" >
          <div class="container" >
            <h1 class="text-center"><i class="fa fa-paper-plane  "></i><span>Contact Us<br/><span style="color:#8CF007;"><?php echo $emailsent; ?></span></span></h1>
             
                     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="row">
              <div class="col-sm-4 col-sm-offset-2">
                  <label>Name <span class="error-text">* <?php echo $nameErr; ?></span></label>
                  <input type="text" name="name"  value="<?php echo $name;?>" placeholder="" >
                </div>
                <div class="col-sm-4">
                <label>Company/Org <span class="error-text"> <?php echo $companyErr; ?></span></label><br/>
              <input type="text" name="company" value="<?php echo $company;?>"  placeholder="" >
                </div>
            </div>
            
            <div class="row" >
              <div class="col-sm-4 col-sm-offset-2">
                   <label>Phone Number <span style="color:red;">*</span><span class="error-text"> <?php echo $phoneErr; ?></span></label><br/>
              <input type="text" name="phone" value="<?php echo $phone;?>"  placeholder="" >
                </div>
                
                <div class="col-sm-4">
                <label>Email <span class="error-text">* <?php echo $emailErr; ?></span></label><br/>
              <input type="text" name="email" value="<?php echo $email;?>"  placeholder="" >
                </div>
            </div>
            
		
            <div class="row">
            
            	<div class="col-sm-8 col-sm-offset-2">
                	<label>Message <span style="color:red;">*</span><span class="error-text"> <?php echo $commentErr; ?> </span></label><br/>
    					<textarea class="text-area" name="comment" rows="3"><?php echo $comment; ?></textarea>
                </div>
            </div>
            <div class="space"></div>
			<div class="row">
			<!--	<div class="col-sm-4 col-sm-offset-2">
					 <span class="error-text"style="font-size:18px;"></span>
                  <div class="g-recaptcha" data-sitekey="6LchmicTAAAAAFCAqN9K2VedqGNxrJT_0BZSZu_o"></div>
				</div>-->
			</div>
			<div class="space"></div>
            <div class="row">
              <div class="col-sm-4 col-sm-offset-2">
                <input type="submit" name="submitted" value="Send">
                </div>
            </div>
            </form>
                   
                
               
        
          </div>
        </section>

</body>
<?php include "footer.php"; ?>