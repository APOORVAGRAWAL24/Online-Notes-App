<html>
  <head>
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

   <link href="styling.css" rel="stylesheet">
      <style>
          #container{
              margin-top: 100px;
          }
          
          tr{
              cursor: pointer;
          }
      </style>
  </head>
  <body>
    <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
      <div class="container-fluid">
       <div class="navbar-header" >
          <a class="navbar-brand">Online Notes</a>
           <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
         <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
           </button>
          
          </div>
          <div class="navbar-collapse collapse" id="navbarCollapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
              <li><a href="profile.php">Profile</a></li>
                <li><a href="help.php">Help</a></li>
                <li><a href="#">Contact us</a>
                <li><a href="mainpageloggedin.php">My Notes</a>
                  </li>
              </ul>
              
          </div>
        
        </div> 
      
      </nav>
      
      <!-----Container--->
      <div id="container" class="container">
      <div class="row">
          <div class="col-md-offset-3 col-md-6">
          <h2>Contact Information:</h2>
              <div class="table-responsive">
              <table class="table table-hover table-condensed table-bordered">
                  <tr>
                      <td>Developer</td>
                      <td>Apoorv Agrawal</td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>apoorvagrawal24@gmail.com</td>
                  </tr>
                  <tr>
                      <td>Phone No</td>
                      <td>9582903520</td>
                  </tr>
                  </table>
              
              
              </div>
          </div>
      
          </div>
      </div>
    </body>
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</html>