<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Forgot Password</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('asset/'.$admin_theme); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--  <style type="text/css">
       html,body {height:100%;width:100%;}
    
    .container-full-bg {width:100%;height:100%;max-width:100%;background-position:center;background-size:cover;}
    .container-full-bg .container, .container-full-bg .container {height:100%;width:100%;}
    </style> -->
      <link rel="stylesheet" href="<?php echo base_url('asset/'); ?>/css/login.css" rel="stylesheet"> 
 
  </head>
  <!-- <body background="http://dev.local/asset/images/login.jpg" width="100%"> -->
  <body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="<?php echo base_url( 'asset/'.$admin_theme); ?>/plugins/jQuery/jquery.min.js"></script>

  <!-- bootstrap plugins) -->
  <script src="<?php echo base_url( '/asset/'.$admin_theme); ?>/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url( '/asset/'); ?>/common/js/login.js"></script>

<div class="container-full-bg">
<br><br><br><br><br><br>
  <div class="container">
     <?php echo validation_errors(); ?>

        <div  class=" col-md-3 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Log In</div>
            <div class="panel-body">
               <img id="profile-img" class="img-circle img-responsive" style="display:block; margin: 0 auto 10px;" height="120px" width="150"
               src="<?php echo base_url('asset/'.$admin_theme);?>/images/face.png"/>
            <p id="profile-name" class="profile-name-card"></p>

                     <form action="<?php echo base_url();?>reset_password" method="POST" id="login_form">
                        <input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>">
                        <div class="form-group">
                          <input type="text" name="name" id="name" class="form-control"
                          placeholder="SAP ID" value ="<?php echo $name; ?>" required>
                          </div>
                        <div class="form-group">
                          <input type="password" name="password" id="password" class="form-control"
                          placeholder="Password" value ="<?php echo $password; ?>" required>
                        </div>
                       <?php if($pid){ ?>
                      <div class="form-group">
                        <input type="text" name="otp" id="otp" class="form-control"
                        placeholder="OTP" style="text-transform:uppercase">
                      </div>
                     <?php }?>
                      <div class="alert alert-danger" id="message">
                        <?php echo $message; ?>
                      </div>
                      <div class="form-group">
                      
                      </div>
                   <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" id="button_change_password">Chage Password</button>
                </div>
                 </form><!-- /form -->

            </div>
         </div>
    </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
  

  function reset_password() {
    // body...
  }
</script>
