<?php
if(!isset($_SESSION))  
    { 

        session_start(); 
    } 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Connection</title>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/connections_view.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../assets/recruiting.js"></script>
  <script type="text/javascript" src="../assets/connections.js"></script>



</head>

<body onload="load2()">
<nav id="nav" style="" class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">      
      	<span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                    
      </button>
      <a class="navbar-brand" href="#">Nuces Circle</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <div class="col-md-3">
  			
  			<span><div id="C_search_widget"></div></span>

  			
  		</div>
	     <ul class="nav navbar-nav navbar-right">
	      <li><a href="../controller/showConnectionController.php"><span class="glyphicon glyphicon-user"></span> Network</a></li>
	      <li><a href="../controller/showRecruitingController.php"><span class="glyphicon glyphicon-briefcase"></span> Jobs</a></li>
	      <li><a href=""><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
	      <li><a href="../controller/newsFeedController.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	      <li><a href=""><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
	      <li><a href="../controller/showProfileController.php"><span class=""></span> Me</a></li>
	      <li><a href="#" id="send_mail"> Send Mail</a></li>
	      <li><a href="../controller/logoutController.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	     
	      <!-- <button type="button" name="add_button_course" id="send_mail" class="btn btn-success btn-xs">Send mail</button> -->
	    </ul>
    </div>
  </div>
</nav>

<div class="col">
	<div id="container" class="container">

		<div id="invite_well" class="well well-lg" >
			<h4><b>Invitations</b>
			</h4>
			<?php echo $_SESSION['connection'][1]  ?>
				

		</div>
		<hr>
		 <!-- my connections -->
		<div id="connections_well"  class="well well-lg"  >
			<h4><b>My Connections</b></h4>
			<?php echo $_SESSION['connection'][0]  ?>
			
		</div>
		<hr>
        <!-- recommendation -->
		<div id="recommendation_well" class="well well-lg">
			<h4><b>Recommendations</b></h4>
			<div id="recom_row" class="row"></div>	

			<?php echo $_SESSION['connection'][2]  ?>
			
		</div>
	
	</div>
</div>

<!-- 
<div id="modal-wrapper-msg" class="modal">
	      				<form  class="modal-content form" name="skills1_form" method="POST" action=".."
	      				accept-charset="utf-8">
			      				<div class="container">
			      					 <span onclick="document.getElementById('modal-wrapper-msg').style.display='none'" class="close" >&times;</span>
								<label for =""><b>Skill 1</b></label><br />
								
								
									
							      	<button  type="submit" class="my_button" name='msg_btn'>Upload</button>
								</div> 
			    				
	    				</form>
 </div> -->


 
</body>

</html>


<div id="sendMail_model" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="post" id="sendMail_model_form">
    <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Send Mail</h4>
         </div>
         <div class="modal-body">
           <!-- <div class="form-group">
           <label for ="email"><b>Sender mail:</b></label><br />
            <input id="sender_email" type="email" name="sender_email" placeholder="Ex: abc@gmail.com"  required><br /><br />
           </div> -->
          <div class="form-group">
            <label><b>Recepient mail:</b></label><br />
            <input id="recep_email" type="email" name="recep_email" placeholder="Ex: abc@gmail.com"  required><br /><br />
           </div>
           <div class="form-group">
            <label><b>Subject:</b></label><br />
           <!--  <input maxlength="10" id="course_number" type="text" name="course_number" placeholder="Ex: CS-403" required pattern="[A-Za-z]{1,4}-[0-9]{1,7}" required><br /><br /> -->
           <input type="text" name="subject" id="subject" maxlength="50"><br /><br />
           </div>
           <div class="form-group">
           <label><b>Message:</b></label><br />
           <textarea maxlength="200" class="form-control" rows="4" cols="950" id="message" name="message"></textarea>
           </div>
       </div>
       <div class="modal-footer">
       <!--  <input type="hidden" name="hidden_id_course" id="hidden_id_course" />
        <input type="hidden" name="action_course" id="action_course" value="insert" /> -->
        <input type="submit" name="button_action" id="button_action_mail" class="btn btn-info" value="Send" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
   </form>
  </div>
   </div>
</div>

<script type="text/javascript">
	
  $('#send_mail').click(function(){
  // $('#action_course').val('insert_course');
  $('#button_action_mail').val('Send');
  $('.modal-title').text('Send Mail');
  $('#sendMail_model').modal('show');
 });

  
 $('#sendMail_model_form').on('submit', function(event){
  event.preventDefault();
 
   var form_data = $(this).serialize();
   // var action = $("#action_exp").val();
   // console.log(action + " called");
   
   $.ajax({

    url:"send_mail.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     // fetch_data();
     $('#sendMail_model_form')[0].reset();
     $('#sendMail_model').modal('hide');
     alert(data);
     // if(data == 'insert')
     // {
     //  alert("Data Inserted using PHP API");
     // }
     // if(data == 'update')
     // {
     //  alert("Data Updated using PHP API");
     // }
    }
   });
  
 });
</script>