function validate_form(){

	alert("in validate_form");

    var fname = document.forms["signForm"]["fname"].value;
    var lname = document.forms["signForm"]["lname"].value;
    var email = document.forms["signForm"]["email"].value;
    var password = document.forms["signForm"]["password"].value;
	var name_regex = /^[a-zA-Z]+$/;
	var email_regex =  /^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@{[a-zA-Z0-9_\-\.]+0\.([a-zA-Z]{2,5}){1,25})+)*$/;
	if(fname == "" || lname == "" || email == "" || password == "") {
      alert("Please fill empty fields!");
      return;
     
    }
    if(name_regex.test(fname) == false || name_regex.test(lname) == false){
      alert("Name must be in alphabets only");
      return;
    }
    if(email_regex.test(email) == false){
    	alert("Please enter valid email address!");
    	return;
    }
    alert("Successfully signed up!. Thank you.")
    // window.open("newsFeed.html");
    header("Location: ../controller/Signup.php");


    
    
};

function validate_signIn(){
   var email = document.getElementById('inputEmail').value;
   var email_regex =  /^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@{[a-zA-Z0-9_\-\.]+0\.([a-zA-Z]{2,5}){1,25})+)*$/;
   if(email_regex.test(email) == false){
      alert("Please enter valid email address!");
      return;
    }
   window.open("newsFeed.html"); 


}