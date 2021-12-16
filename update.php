<!DOCTYPE html>
    
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<title>Sign Up Page</title>
</head>
        <body>

        <div id="myDiv" class="formcontainer">
            <h1 style="text-align: center; font-size: 20px;">Registration Form</h1>
            <form id="registration_form" method="POST">

            <?php

include 'dbcon.php';

$id = $_GET['id'];

$selectquery = " select * from registration where id=$id";

$query = mysqli_query($con,$selectquery);

$result = mysqli_fetch_assoc($query);

if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $firstname = $_POST['firstname'];
    $secondname = $_POST['secondname'];
    $emailid = $_POST['emailid'];
    $phonenumber = $_POST['phonenumber'];
    $language = $_POST['language'];

    $updatequery = " update registration set id=$id, firstname='$firstname', secondname='$secondname', emailid='$emailid', phonenumber='$phonenumber', language='$language' where id=$id "; 

    $query = mysqli_query($con, $updatequery);

    if($query){
        ?>
        <script>
            alert('Updated Successfully');
        </script>
    
        <?php
    }else{
        ?>
        <script>
            alert('Not Updated');
        </script>
    
        <?php
    }
}

?>
                <div class="form-group">
                    <label for="First Name">First Name</label>
                    <input type="text" id="form_fname" class="form-control" name="firstname" value="<?php echo $result['firstname']; ?>"  required="" placeholder="Enter Your Name">
                    <span class="error_form" id="fname_error_message"></span>
                  </div>

                <div class="form-group">
                    <label for="Second Name">Second Name</label>
                    <input type="text" id="form_sname" class="form-control" name="secondname" value="<?php echo $result['secondname']; ?>"  required="" placeholder="Enter Your Second Name">
                    <span class="error_form" id="sname_error_message"></span>
                  </div>

                <div class="form-group">
                    <label for="Email Id">Email Id</label>
                    <input type="email" id="form_email" class="form-control" name="emailid" value="<?php echo $result['emailid']; ?>"  required="" placeholder="Enter Your Email">
                    <span class="error_form" id="email_error_message"></span>
                  </div>

                  <div class="form-group">
                     <label for="Phone Number">Phone Number</label>
                     <input type="tel" id="form_phone" class="form-control" name="phonenumber" value="<?php echo $result['phonenumber']; ?>" required="" placeholder="Enter Your Phone Number">
                     <span class="error_form" id="phone_error_message"></span>
                   </div>

                   <div class="form-group">
                    <label for="Language ">Language</label>
                    <input type="text" id="form_language" class="form-control" name="language" value="<?php echo $result['language']; ?>"  required="" placeholder="Enter Your Language">
                    <span class="error_form" id="language_error_message"></span>
                  </div>


            <button class="btn-primary" input type="submit" value="Update" name="submit"> Update </button>
            </form>
        </div>

        <script type="text/javascript">
            $(function() {
      
               $("#fname_error_message").hide();
               $("#sname_error_message").hide();
               $("#phone_error_message").hide();
               $("#language_error_message").hide();
               $("#email_error_message").hide();
               $("#password_error_message").hide();
               $("#retype_password_error_message").hide();
      
               var error_fname = false;
               var error_sname = false;
               var error_phone = false;
               var error_language = false;
               var error_email = false;
               var error_password = false;
               var error_retype_password = false;
      
               $("#form_fname").focusout(function(){
                  check_fname();
               });
               $("#form_sname").focusout(function() {
                  check_sname();
               });
               $("#form_phone").focusout(function() {
                  check_phone();
               });
               $("#form_language").focusout(function() {
                  check_language();
               });
               $("#form_email").focusout(function() {
                  check_email();
               });
               $("#form_password").focusout(function() {
                  check_password();
               });
               $("#form_retype_password").focusout(function() {
                  check_retype_password();
               });
      
               function check_fname() {
                  var pattern = /^[a-zA-Z]*$/;
                  var fname = $("#form_fname").val();
                  if (pattern.test(fname) && fname !== '') {
                     $("#fname_error_message").hide();
                     $("#form_fname").css("border-bottom","2px solid #34F458");
                  } else {
                     $("#fname_error_message").html("Should contain only Characters");
                     $("#fname_error_message").show();
                     $("#form_fname").css("border-bottom","2px solid #F90A0A");
                     error_fname = true;
                  }
               }
      
               function check_sname() {
                  var pattern = /^[a-zA-Z]*$/;
                  var sname = $("#form_sname").val()
                  if (pattern.test(sname) && sname !== '') {
                     $("#sname_error_message").hide();
                     $("#form_sname").css("border-bottom","2px solid #34F458");
                  } else {
                     $("#sname_error_message").html("Should contain only Characters");
                     $("#sname_error_message").show();
                     $("#form_sname").css("border-bottom","2px solid #F90A0A");
                     error_fname = true;
                  }
               }

               function check_phone() {
                  var pattern = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
                  var phone = $("#form_phone").val()
                  if (pattern.test(phone) && phone !== '') {
                     $("#phone_error_message").hide();
                     $("#form_phone").css("border-bottom","2px solid #34F458");
                  } else {
                     $("#phone_error_message").html("Should contain only number");
                     $("#phone_error_message").show();
                     $("#form_phone").css("border-bottom","2px solid #F90A0A");
                     error_fname = true;
                  }
               }

               function check_language() {
                  var pattern = /^[a-zA-Z]*$/;
                  var language = $("#form_language").val()
                  if (pattern.test(language) && language !== '') {
                     $("#language_error_message").hide();
                     $("#form_language").css("border-bottom","2px solid #34F458");
                  } else {
                     $("#language_error_message").html("Should contain only Characters");
                     $("#language_error_message").show();
                     $("#form_language").css("border-bottom","2px solid #F90A0A");
                     error_fname = true;
                  }
               }
      
               function check_password() {
                  var password_length = $("#form_password").val().length;
                  if (password_length < 8) {
                     $("#password_error_message").html("Atleast 8 Characters");
                     $("#password_error_message").show();
                     $("#form_password").css("border-bottom","2px solid #F90A0A");
                     error_password = true;
                  } else {
                     $("#password_error_message").hide();
                     $("#form_password").css("border-bottom","2px solid #34F458");
                  }
               }
      
               function check_retype_password() {
                  var password = $("#form_password").val();
                  var retype_password = $("#form_retype_password").val();
                  if (password !== retype_password) {
                     $("#retype_password_error_message").html("Passwords Did not Matched");
                     $("#retype_password_error_message").show();
                     $("#form_retype_password").css("border-bottom","2px solid #F90A0A");
                     error_retype_password = true;
                  } else {
                     $("#retype_password_error_message").hide();
                     $("#form_retype_password").css("border-bottom","2px solid #34F458");
                  }
               }
      
               function check_email() {
                  var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                  var email = $("#form_email").val();
                  if (pattern.test(email) && email !== '') {
                     $("#email_error_message").hide();
                     $("#form_email").css("border-bottom","2px solid #34F458");
                  } else {
                     $("#email_error_message").html("Invalid Email");
                     $("#email_error_message").show();
                     $("#form_email").css("border-bottom","2px solid #F90A0A");
                     error_email = true;
                  }
               }
      
               $("#registration_form").submit(function() {
                  error_fname = false;
                  error_sname = false;
                  error_email = false;
                  error_password = false;
                  error_retype_password = false;
      
                  check_fname();
                  check_sname();
                  check_email();
                  check_password();
                  check_retype_password();
      
                  if (error_fname === false && error_sname === false && error_email === false && error_password === false && error_retype_password === false) {
                     alert("Registration Successfull");
                     return true;
                  } else {
                     alert("Please Fill the form Correctly");
                     return false;
                  }
      
      
               });
            });
         </script>


    </body>
</html>


