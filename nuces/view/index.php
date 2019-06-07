<?php require_once("../templateEngine.php") ?>






<nav style="background-color: #3b444b;" class="navbar navbar-expand-lg navbar-light " >
  <h3><b><a style="color: white;" class="navbar-brand" href="#">NUCES CIRCLE</a></b></h3>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
   	<form method="POST" class="form-inline" name="loginForm"  action="../controller/Login.php">
    <div style="margin-right: 20px;" class="form-group">
      <input type="Email" class="form-control" id="inputEmail" placeholder="abc@gmail.com" name="email" value="<?php if (isset($_GET['email'])) {
    echo $_GET['email']; } ?>" required>
    </div>
    <span></span>
    <div style="margin-right: 20px;" class="form-group">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <button value="submit" type="submit" class="btn btn-primary" value="<?php if (isset($_GET['fname'])) {
    echo "123"; } ?>" >Login</button>
    &nbsp&nbsp
    <button  class="btn btn-primary" style="width: auto; color: white"><a style="text-decoration: none; color: white" href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=775l5172zoo4du&redirect_uri=http%3A%2F%2Flocalhost%2Fnuces%2Fcall.php&state=fooobar&scope=r_liteprofile%20r_emailaddress%20w_member_social">
				<i  class="fa fa-linkedin-square" style="font-size:20px;  color:white"></i>
	</a></button>
  </form>

  </div>
</nav>

<div style="width: 500px; height: 630px; margin-top: 30px; background-color:#3b444b;; border-radius: 5px; padding: 20px " class =
			"container">

			<form method="POST" style="color: white;" name="signForm" action="../controller/Signup.php">
					<h1>Sign Up</h1>
					<p>Fill all the information below to create an account.</p>
					<label class="asterisk" for ="f-name"><b>First Name</b></label><br />
					<input id="f_name" type="text" name="fname" placeholder="Enter first name" value="<?php if (isset($_GET['fname'])) {
    echo $_GET['fname']; } ?>" required pattern="[A-Za-z]+" required><br /><br />

					<label class="asterisk" for ="l-name"><b>Last Name</b></label><br />
					<input id="l_name" type="text" name="lname" placeholder="Enter last name" value="<?php if (isset($_GET['lname'])) {
    echo $_GET['lname']; } ?>" required pattern="[A-Za-z]+" required><br /><br />

					<label class="asterisk" for ="email"><b>Email</b></label><br />
					<input id="email" type="Email" name="email" placeholder="Enter email" value="<?php if (isset($_GET['email'])) {
    echo $_GET['email']; } ?>" required><br /><br />

					<label class="asterisk" for ="pass"><b>Password</b></label><br />
					<input id="pass" type="password" name="password" placeholder="Enter password" value="<?php if (isset($_GET['fname'])) {
    echo "123"; } ?>" required><br /><br />


					<label>
							 <input type="checkbox" checked="checked" name="remember" style="margin-bottom:20px" required> Remember me
						</label>

					<p>By creating account you agree to <a href="#">Terms and privacy</a></p>

					<button type="submit" value="submit" name="sign_btn" class="btn btn-primary">Sign up</button>
			</form>
</div>
<div style="width: 500px; height: auto; margin-top: 30px; background-color:#3b444b;; border-radius: 5px; padding: 20px " class =
			"container">
			<!-- <button  name="sign_btn" class="btn btn-primary">Sign up</button> -->

			<div class="row">
				<div class="col-md-1">
					<i class="fa fa-linkedin-square" style="font-size:40px;  color:white"></i>
				</div>
				<div class="col-md-11">
				<button  class="btn btn-primary" style="width: auto; color: white"><a style="text-decoration: none; color: white" href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=775l5172zoo4du&redirect_uri=http%3A%2F%2Flocalhost%2Fnuces%2Fcall.php&state=fooobar&scope=r_liteprofile%20r_emailaddress%20w_member_social">
				Sign up with Linked in
			</a></button>
				</div>
				
			</div>

			

</div>

<?php writeFooter() ?>
