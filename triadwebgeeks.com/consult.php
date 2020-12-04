<?php 
include "header.php";
// define variables and set to empty values
$nameErr = $companyErr = $phoneErr = $emailErr = $companyDetialsErr = $contactmebyErr =  $contactmeatErr =  "";
$name = $company =  $phone = $email = $companyDetials = $contactmeby = $contactmeat =   "";
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
  if(empty($_POST["companyDetials"])){
		$companyDetialsErr = "Required Field";
	}else{
		$companyDetials = test_input($_POST["companyDetials"]);
	}
  
	if (empty($_POST["contactmeby"])) {
    $contactmebyErr = "Required";
  } else {
    $contactmeby = test_input($_POST["contactmeby"]);
  }
  
  if (empty($_POST["contactmeat"])) {
    $contactmeatErr = "Required";
  } else {
    $contactmeat = test_input($_POST["contactmeat"]);
  }
	
	
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$to = "info@triadwebgeeks.com";
$totalMessage = "Consultation Request TWG Website.\r\r
Name: $name \r
Company: $company\r
Phone: $phone\r
Email: $email\r
Prefered Contact Time: $contactmeat\r
Prefered Contact: $contactmeby\r
Company Details: $companyDetials";
$subject = "Consultation Request TWG Website";


if(isset($_POST['submitted'])) {
  if ($nameErr.$companyErr.$phoneErr.$emailErr.$companyDetialsErr.$contactmebyErr.$contactmeatErr== "") { 
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
                  <a href="index.php"><img src="images/geeks-logo.png" width="100%;"  alt=""/></a>
                </div>
                <div class="col-sm-8 text-right navicon">
                
                  <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
                </div>
              </div>
        </div>
        </section>

        <section class="title-bread">
      <div class="container">
            <div class="row">
              <div class="col-md-12">
                <p >Request a Consultation</p>
              </div>
            </div>
            <ol class="breadcrumb crumbs">
              <li><a href="index.php">Home</a></li>
              <li>Request a Consultation</li>
            </ol>
          </div>
    </section>

 <section class="consult" id="consult">
          <div class="container">
            <h1 class="text-center"><i class="fa fa-paper-plane  "></i><span>Request a Consultation<br/><span style="color:#8CF007;"><?php echo $emailsent; ?></span></span></h1>
              <div class="row">
                  <div class="col-sm-12 col-sm-offset-2">
                     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="row">
              <div class="col-sm-4">
                  <label>Name <span class="error-text">* <?php echo $nameErr; ?></span></label><br/>
                  <input type="text" name="name"  value="<?php echo $name;?>" placeholder="" >
                </div>
                <div class="col-sm-4">
                <label>Company/Org <span style="color:red;">*</span><span class="error-text"> <?php echo $companyErr; ?></span></label><br/>
              <input type="text" name="company" value="<?php echo $company;?>"  placeholder="" >
                </div>
            </div>
            
            <div class="row">
              <div class="col-sm-4">
                   <label>Phone Number <span style="color:red;">*</span><span class="error-text"> <?php echo $phoneErr; ?></span></label><br/>
              <input type="text" name="phone" value="<?php echo $phone;?>"  placeholder="" >
                </div>
                
                <div class="col-sm-4">
                <label>Email <span class="error-text">* <?php echo $emailErr; ?></span></label><br/>
              <input type="text" name="email" value="<?php echo $email;?>"  placeholder="" >
                </div>
            </div>
			<div class="row">
				<div class="col-sm-8">
					<label>What does your Company/ Organization Do? <span class="error-text">* <?php echo $companyDetialsErr; ?></label>
					<input type="text" name="companyDetials" value="<?php echo $companyDetials;?>"  placeholder="" >
				</div>
			</div>
            <div class="space1"></div>
            <div class="row">
			<div class="col-sm-4">
                
				<label style="margin-top:.25em;">Best Time to Contact you?  <span class="error-text">* <?php echo $contactmeatErr; ?></span>  </label>
               <div class="radio">
                         
              <label>
                <input type="radio" name="contactmeat"  value="9:00 am to 12:00 pm" <?php if (isset($contactmeat) && $contactmeat=="9:00 am to 12:00 pm") echo "checked";?>>
                Morning (9:00 am to 12:00 pm)
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="contactmeat"  value="1:00 pm to 5:00pm" <?php if (isset($contactmeat) && $contactmeat=="1:00 pm to 5:00pm") echo "checked";?> >
                Afternoon (1:00 pm to 5:00pm)
              </label>
            </div>
			<div class="radio">
              <label>
                <input type="radio" name="contactmeat"  value="5:15pm to 8:00pm" <?php if (isset($contactmeat) && $contactmeat=="5:15pm to 8:00pm") echo "checked";?> >
                Evening (5:15pm to 8:00pm)
              </label>
            </div>
                </div>
              <div class="col-sm-4">
                 
				<label style="margin-top:.25em;">Best Way to Contact you?  <span class="error-text">* <?php echo $contactmebyErr; ?></span> </label>
               <div class="radio">
                         
              <label>
                <input type="radio" name="contactmeby"  value="Contact by phone" <?php if (isset($contactmeby) && $contactmeby=="Contact by phone") echo "checked";?>>
                Please contact me by phone.
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="contactmeby"  value="Contact by email" <?php if (isset($contactmeby) && $contactmeby=="Contact by email") echo "checked";?> >
                Please email me.
              </label>
            </div>
                </div>
                
            </div>
            <div class="space"></div>
			
			<div class="space"></div>
            <div class="row">
              <div class="col-sm-4">
                <input type="submit" name="submitted" value="Send">
                </div>
            </div>
            </form>
                  </div>
       
                    </div>
                </div>
               
        
          </div>
        </section>

</body>
<?php include "footer.php"; ?>