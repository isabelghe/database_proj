<?php include_once 'helpers/helper.php'; ?>

<?php subview('header.php'); ?>
<link rel="stylesheet" href="assets/css/login.css">
<style>
@font-face {
  font-family: 'product sans';
  src: url('assets/css/Product Sans Bold.ttf');
}
h1 {
  font-family: 'product sans' !important;
  font-size: 48px !important;
  margin-top: 20px;
  text-align: center;
  color: #ff6f61;
}
body {
  background: linear-gradient(to right, #ff9a9e, #fad0c4);
}
.login-form {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  border-radius: 10px;
  background-color: #fff;
  padding: 30px;
  width: 100%;
  max-width: 500px;
}
.flex-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
}
.form-input {
  border: 2px solid #ff6f61 !important;
  color: #ff6f61 !important;
  border-radius: 5px !important;
  padding: 10px;
  width: 100%;
}
.form-input:focus {
  outline: none;
  border-color: #ffb3ba !important;
}
.submit {
  text-align: center;
  margin-top: 20px;
}
.button {
  background-color: #ff6f61;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}
.button:hover {
  background-color: #ffb3ba;
}
.alert {
  background-color: #ffb3ba;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 20px;
}
</style>
<div class="flex-container">
  <div class="login-form mt-5">
    <h1 class="text-center text-secondary mb-4">Reset Password</h1>
    <div class="alert text-center alert-info mb-4" role="alert">
      An email will be sent to you!
    </div>
    <form method="POST" action="includes/reset-request.inc.php">
      <div class="flex-container mb-3">             
        <div>
          <i class="fa fa-envelope text-primary" style="margin-right: 10px;"></i>
        </div>
        <div style="width: 100%;">
          <input type="text" name="user_email" placeholder="Enter your registered email" class="form-input" required>
        </div>
      </div>
      <div class="submit">
        <button name="reset-req-submit" type="submit" class="button">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>
<?php
if(isset($_GET['err']) || isset($_GET['mail'])) {
  if($_GET['err'] === 'invalidemail') {
    echo '<script>alert("Invalid email");</script>';
  } else if($_GET['err'] === 'sqlerr') {
    echo '<script>alert("An error occurred");</script>';        
  } else if($_GET['mail'] === 'success') {
    echo '<script>alert("Email has been successfully sent to you");</script>';        
  } else if($_GET['err'] === 'mailerr') {
    echo '<script>alert("An error occurred");</script>';        
  }                    
} 
?>
<?php subview('footer.php'); ?> 
