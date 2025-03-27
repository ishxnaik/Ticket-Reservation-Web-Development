<?php 
 
    // registration page
    include('DBConnection.php'); 
 
if(isset($_POST['register'])){
    //$err_uname="";
    $uname = $_POST['username'];
    $pass = $_POST['password1'];
    //$pass = $_POST['password2'];
    $secque = $_POST['secque'];
    $secans = $_POST['secans'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $area = $_POST['add_area'];
    $pin = $_POST['add_pin'];
    $city = $_POST['add_city'];
    $state = $_POST['add_state'];


    // query for checked whether username is already registered or not
    $sql_uname = "SELECT *FROM user where username = '$uname'";
    $result = $conn->query($sql_uname);
    if( $result->num_rows > 0 ){
        $err_uname= "Username is already registered";
    }
    else{
        $sql="INSERT INTO user (username, password, first_name, middle_name, last_name, gender, date_of_birth, email, mobile_number, area, pincode, city, state, security_question, security_answare) VALUES ( '$uname', '$pass', '$fname', '$mname', '$lname', '$gender', '$dob', '$email', '$phno', '$area', '$pin', '$city', '$state', '$secque', '$secans')";
        

        if($conn->query($sql)== TRUE){
          echo "<script>alert('Now, you can book your journey');</script>";
        }
        else{
           echo "<script>alert('errrrrr');</script>";

        }
    }
}

?>



<!doctype html>
<html lang="en">
<head>
	<title>IR</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="icon/png" href="asset/img/logo/rail_icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

    <!-- :start of optional css-->

    <!-- font-awesome for icon -->
    <link rel="stylesheet" href="asset/font-awesome/css/all.min.css">

    <!-- animation css -->
    <link rel="stylesheet" href="asset/css/animate.css">

    <!-- hover css animations -->
    <link rel="stylesheet" href="asset/css/hover-min.css">

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="asset/css/custom.css">


    <!-- :end of optional css -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/validation.js"></script>

    <style>

        .bg-black{
            background-color:black;
        }
        .container{
            /padding-top: 40px;/
        }
        .text-main h5, .text-main{
            font-size: 16px;
            font-weight: bold;
            color: #333;
            font-family: serif;
        }
    </style>

</head>
<body>

	<!-- header navbar -->
    <?php include('header.html') ?>

   <!-- light background color -->
<form action="" name="regForm" onsubmit="return(validation());" method="post" class="bg-light">

    <!-- container -->
    <div class="container">
        <div class="row">
            
            <!-- title individual registration -->
    <!-- 1st row start -->
            <div class="col-12">
                <div class="text-blue mt-5 mb-4">
                    <h2>Individual Registration</h2>
                </div>
                <hr> <!-- horizontal line -->
            </div> <!-- 1st row ends -->

            <div class="col-12">
               <div class="text-dark">
                    <h6>Please use a vaild E-Mail and mobile number in registration</h6>
                </div>
                <hr>     
            </div>

    <!--  2nd row start -->
            <!-- username -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Username<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 ">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="uname" name="username">
                </div>
                <!-- error code -->
                <div class="text-red">
                    <span id="er_uname"><?php if(isset($err_uname)){ echo "$err_uname"; } ?></span>
                </div>
            </div> <!-- username ends -->

            <!-- password -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Password<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <input class="form-control" type="password" id="pass1" name="password1">
                </div>
                <!-- er_pass1 code -->
                <div  class="text-red">
                    <span id="er_pass1"></span>
                </div>
            </div> <!-- password ends --> 
    <!-- 2nd row ends -->


    <!-- Horizontal row -->
            <div class="col-12"><hr></div>


    <!-- 3rd row  -->
            <!-- Confirm password -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Confirm Password<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <input class="form-control" type="password" id="pass2" name="password2">
                </div>
                <!-- er_pass2 code -->
                <div  class="text-red">
                    <span id="er_pass2"></span>
                </div>
            </div> <!-- password ends --> 

    <!--3rd row ends -->
            

    <!-- Horizontal row -->
            <div class="col-12"><hr></div>


    <!-- 4th row -->
            <!-- security question -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Security Question<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 ">
                <div class="text-main input-group">
                    <select class="custom-select" id="secQue" name="secque">
                        <option class="" value="default">Select Security Question</option>
                        <option class="" value="1">first mobile no</option>
                        <option class="" value="2">your pet name</option>
                        <option class="" value="3">your nick name</option>
                        <option class="" value="4">your favourite teacher name</option>
                    </select>
                </div>
                <!-- er_secque code -->
                <div  class="text-red">
                    <span id="er_secque"></span>
                </div>
            </div> <!-- security question ends -->

            <!-- security answare -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Security Answare<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="secAns" name="secans">
                </div>
                <!-- er_secans code -->
                <div class="text-red">
                    <span id="er_secans"></span>
                </div>
            </div> <!-- security answare ends --> 
    <!-- 4th row ends -->


    <!-- Horizontal row -->
            <div class="col-12"><hr></div>

    <!--5th row  -->
            <!-- alert personal details -->
            <div class="col-12 alert alert-primary text-bold">Personal Details</div>
            <!-- name field -->
            <div class="col-12 col-sm-3 col-md-3">
                <div class="text-main text-center">
                    <h5>Name<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div><!-- name ends  -->

            <!-- input field of names -->
            <div class="col-12 col-sm-3 col-md-3 ">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="fn" name="fname" placeholder="First Name">
                </div>
                <!-- er_fname code -->
                <div  class="text-red">
                    <span id="er_fname"></span>
                </div>
            </div> 

            <div class="col-12 col-sm-3 col-md-3 ">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="mn" name="mname" placeholder="Middle Name">
                </div>
                <!-- er_fname code -->
                <div  class="text-red">
                    <span id="er_mname"></span>
                </div>
            </div> 

            <div class="col-12 col-sm-3 col-md-3 ">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="ln" name="lname" placeholder="Last Name">
                </div>
                <!-- er_fname code -->
                <div  class="text-red">
                    <span id="er_lname"></span>
                </div>
            </div>  <!-- input field ends -->
    <!-- 5th row ends -->

    <!-- Horizontal row -->
            <div class="col-12"><hr></div>

    <!-- 6th row start -->
            <!-- Gender -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Gender<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <!-- male -->
            <div class="col-6 col-sm-2">
                <div class="text-main input-group">
                    <input class="" type="radio" name="gender" value="M" required>
                    <span class="text-main">&nbsp;&nbsp;Male</span>
                </div>

                <!-- error code -->
                <div  class="text-red">
                    <span id="er_gender"></span>
                </div>
            </div>

            <!-- female -->
            <div class="col-6 col-sm-2">
                <div class="text-main input-group">
                    <input class="" type="radio" name="gender" value="F" required>
                    <span class="text-main">&nbsp;&nbsp;Female</span>
                </div>
            </div>

            <!-- Transgender -->
            <!-- <div class="col-12 col-sm-4">
                <div class="text-main input-group">
                    <input class="" type="radio" name="gender" value="male">
                    <span class="text-main">&nbsp;&nbsp;Transgender</span>
                </div>
            </div> -->


    <!-- 6th row ends -->

    <!-- Horizontal row -->
            <div class="col-12"><hr></div>

    <!-- 7th row -->
             <!-- DOB -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Date Of Birth<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <!-- input tag -->
            <div class="col-12 col-sm-3">
                <div class="text-main input-group">
                    <input class="form-control" type="date" id="date" name="dob">
                </div>

                <!-- error code -->
                <div  class="text-red">
                    <span id="er_dob"></span>
                </div>
            </div>
    <!-- 7th row ends -->

    <!-- Horizontal row -->
            <div class="col-12"><hr></div>

    <!-- 8th row -->
            <!-- email -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Email<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <!-- email input-->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="mail" name="email">
                </div>

                <!-- error code -->
                <div  class="text-red">
                    <span id="er_email"></span>
                </div>
            </div>

            <!-- phone number -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Mobile No<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <!-- number input -->
            <div class="col-12 col-sm-6 col-md-3">
                <!-- 91 label -->
                <div class="text-main input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text alert-dark text-dark">+91</span>
                </div>
                    <input class="form-control" type="text" id="mono" maxlength="10" name="phno">
                </div>

                <!-- error code -->
                <div  class="text-red">
                    <span id="er_phno"></span>
                </div>
            </div>
    <!-- 8th row ends -->

    <!-- Horizontal row -->
            <div class="col-12"><hr></div>

    <!-- 9th row -->
            <!-- alert personal details -->
            <div class="col-12 alert alert-primary text-bold">Residential Address</div>
            <!-- area -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Area<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <!-- area input-->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <textarea class="form-control" type="text" id="area" name="add_area" ></textarea>
                </div>

                <!-- error code -->
                <div  class="text-red">
                    <span id="er_addarea"></span>
                </div>
            </div>

            <!-- pincode  -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Pincode<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <!-- pincode input -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="pin" maxlength="
                    6" name="add_pin">
                </div>

                <!-- error code -->
                <div  class="text-red">
                    <span id="er_addpin"></span>
                </div>
            </div>
    <!-- 9th row ends -->

    <!-- Horizontal row -->
            <div class="col-12"><hr></div>
            <div class="row">
    <!-- City -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="text-main text-center">
            <h5>City<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="text-main input-group">
            <input type="text" class="form-control" id="city" name="add_city" placeholder="Enter City">
        </div>
        <div class="text-red">
            <span id="er_addcity"></span>
        </div>
    </div>

    <!-- State -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="text-main text-center">
            <h5>State<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="text-main input-group">
            <select class="custom-select" id="state" name="add_state">
                <option value="default">Select State</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Delhi">Delhi</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Ladakh">Ladakh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            </select>
        </div>
    </div>
</div>


                <!-- error code -->
                <div  class="text-red">
                    <span id="er_addstate"></span>
                </div>
            </div>
    <!-- 10th row ends -->

    <!-- Horizontal row -->
            <div class="col-12"><hr></div>
            <div class="col-12"><hr></div>

    <!-- 11th row  -->
            <!-- register button -->
            <div class="col-12">
                <div class="text-main text-center">
                    <input class="btn btn-success" type="submit" name="register" value="Register">
                    <input class="btn btn-success" type="reset" name="cancel" value="Reset">
                </div>
            </div>

    <!-- 11th row ends -->

        </div> <!-- row ends -->
    </div> <!-- container ends -->
    <br>
    <br>
</form> <!-- main div ends -->





    <!-- Footer -->
    <?php include('footer.html') ?>
	
</body>
</html>




<?php  
  
?>