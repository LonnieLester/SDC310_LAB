<!-- Header Section --> 
<header class="jumbotron text-center row" 
        style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;"> 
  <?php include('header.php'); ?> 
</header> 
 
<!-- Body Section --> 
<div class="row" style="padding-left: 0px;"> 
 
  <!-- Left-side Column Menu Section --> 
  <nav class="col-sm-2"> 
    <ul class="nav nav-pills flex-column"> 
      <?php include('nav.php'); ?> 
    </ul> 
  </nav> 
 
  <!-- Center Column Content Section --> 
  <?php 
    // Validate Input 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
      require('process-register-page.php'); 
    } 
  ?> 
 
  <div class="col-sm-8"> 
    <h2 class="h2 text-center">Register</h2> 
 
    <form action="register-page.php" method="post" onsubmit="return checked();"> 
      <div class="form-group row"> 
        <label for="first_name" class="col-sm-4 col-form-label">First Name:</label> 
        <div class="col-sm-8"> 
          <input type="text" class="form-control" id="first_name" name="first_name" 
                 placeholder="First Name" maxlength="30" required 
                 value="<?php if (isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name']); ?>"> 
        </div> 
      </div> 
 
      <div class="form-group row"> 
        <label for="last_name" class="col-sm-4 col-form-label">Last Name:</label> 
        <div class="col-sm-8"> 
          <input type="text" class="form-control" id="last_name" name="last_name" 
                 placeholder="Last Name" maxlength="40" required 
                 value="<?php if (isset($_POST['last_name'])) echo htmlspecialchars($_POST['last_name']); ?>"> 
        </div> 
      </div> 
 
      <div class="form-group row"> 
        <label for="email" class="col-sm-4 col-form-label">E-mail:</label> 
        <div class="col-sm-8"> 
          <input type="email" class="form-control" id="email" name="email" 
                 placeholder="E-mail" maxlength="60" required 
                 value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"> 
        </div> 
      </div> 
 
      <div class="form-group row"> 
        <label for="password1" class="col-sm-4 col-form-label">Password:</label> 
        <div class="col-sm-8"> 
          <input type="password" class="form-control" id="password1" name="password1" 
                 placeholder="Password" minlength="8" maxlength="12" required 
                 value="<?php if (isset($_POST['password1'])) echo htmlspecialchars($_POST['password1']); ?>"> 
          <span id="message">Between 8 and 12 characters.</span> 
        </div> 
      </div> 
 
      <div class="form-group row"> 
        <label for="password2" class="col-sm-4 col-form-label">Confirm Password:</label> 
        <div class="col-sm-8"> 
          <input type="password" class="form-control" id="password2" name="password2" 
                 placeholder="Confirm Password" minlength="8" maxlength="12" required 
                 value="<?php if (isset($_POST['password2'])) echo htmlspecialchars($_POST['password2']); ?>"> 
        </div> 
      </div> 
 
      <div class="form-group row"> 
        <div class="col-sm-12 text-center"> 
          <input id="submit" class="btn btn-primary" type="submit" name="submit" value="Register"> 
        </div> 
      </div> 
    </form> 
  </div> 
 
  <!-- Right-side Column Content Section --> 
  <?php 
  if (!isset($errorstring)) { 
    echo '<aside class="col-sm-2">'; 
    include('info-col.php'); 
    echo '</aside>'; 
  } 
  ?> 
</div> <!-- End of row --> 
 
<!-- Footer Section --> 
<?php 
if (!isset($errorstring)) { 
  echo '<footer class="jumbotron text-center row" 
               style="padding-bottom:1px; padding-top:8px;">'; 
} else { 
  echo '<footer class="jumbotron text-center col-sm-12" 
               style="padding-bottom:1px; padding-top:8px;">'; 
} 
include('footer.php'); 
echo '</footer>'; 
?> 
 

 