<?php
session_start();
include('connection.php');
//logout
include('logout.php');
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Online Notes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

   <link href="styling.css" rel="stylesheet">
  </head>
  <body>
    <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
      <div class="container-fluid">
       <div class="navbar-header" >
          <a class="navbar-brand">Online Notes App</a>
           <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
         <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
           </button>
          
          </div>
          <div class="navbar-collapse collapse" id="navbarCollapse">
              <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
                <li><a href="help.php">Help</a></li>
                <li><a href="contactus.php">Contact us</a></li>
              </ul>
              
              <ul class="nav navbar-nav navbar-right">
              <li><a href="#loginModal" data-toggle="modal">Login</a></li>
               
              </ul>
          </div>
        
        </div>
      
      </nav>
    <div class="jumbotron" id="mycontainer">
        <h1>Online Notes App</h1>
        <p>Your Notes with you wherever you go.</p>
        <p>Easy to use,protects all your notes!</p>
    <button type="button" class="btn btn-large green signup " data-target="#signupModal" data-toggle="modal">Sign up-It's free</button>
    </div>
      
      
      <!-- Sign up form-->
    <form method="post" id="signupform">
      <div class="modal" id="signupModal" role="dialog"aria-labelledby="mymodallabel" aria-hidden="true">
      <div class="modal-dialog" >
          <div class="modal-content">
          
          <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
              <h4 id="mymodallabel">Sign up today and Start using our Online notes App!</h4>
          </div>
          <div class="modal-body">
              <div id="signupmessage"></div>
            <div class="form-group">
                <label for="username" class="sr-only">Username:</label>
              <input class="form-control" type="text" name="username" placeholder="Username" maxlength="38" id="username">
                
              </div> 
              <div class="form-group">
                <label for="email" class="sr-only">Email:</label>
              <input class="form-control" type="text" name="email" placeholder="Email Address" maxlength="50" id="email">
                
              </div>
              <div class="form-group">
                <label for="password" class="sr-only">Password:</label>
              <input class="form-control" type="password" name="password" placeholder="Choose a password" maxlength="10" id="password">
                
              </div>
                <div class="form-group">
                <label for="password2" class="sr-only">Password:</label>
              <input class="form-control" type="password" name="password2" placeholder="Confirm password" maxlength="10" id="password2">
                
              </div>
          </div>
          <div class="modal-footer">
              <input class="btn green" name="signup" type="submit" value="Sign up">
          <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
            </div>
          
          </div>
      </div>
      </div>
    </form>
      
      
      <!---login Form--->
         <form method="post" id="loginform">
        <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Login: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Login message from PHP file-->
                  <div id="loginmessage"></div>
                  

                  <div class="form-group">
                      <label for="loginemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="loginpassword" class="sr-only">Password</label>
                      <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
                  </div>
                  <div class="checkbox">
                      <a class="pull-right" style="cursor: pointer" data-dismiss="modal" data-target="#forgotpasswordModal" data-toggle="modal">
                      Forgot Password?
                      </a>
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="login" type="submit" value="Login">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">
                  Register
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>
      
      
      
      <!-----Forgot Password Form------->
      
      
      <form method="post" id="forgotpasswordform">
      <div class="modal" id="forgotpasswordModal" role="dialog"aria-labelledby="mymodallabel" aria-hidden="true">
      <div class="modal-dialog" >
          <div class="modal-content">
          
          <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
              <h4 id="mymodallabel">Forgot Password?Enter your email address:</h4>
          </div>
          <div class="modal-body">
              <div id="forgotpasswordmessage"></div>

              <div class="form-group">
                <label for="forgotemail" class="sr-only">Email:</label>
              <input class="form-control" type="text" name="forgotemail" placeholder="Email" maxlength="50" id="forgotemail">
                
              </div>         

          </div>
          <div class="modal-footer">
              <input class="btn green" name="forgotpassword" type="submit" value="Submit">
          <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
          
             <button type="button" class="btn btn-default pull-left"  data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
            </div>          
          </div>
      </div>
      </div>
    </form>

    <div class="footer">
    <div class="container">
        <p>Copyright&copy;Developed By Apoorv<?php $today=date(" Y"); echo $today?></p>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
      <script src="index.js"></script>
  </body>
</html>