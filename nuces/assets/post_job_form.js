
// var tags_arr =[];
// var tag_count  =0;
// $(document).ready(function(){
//     $("select.inputTags").change(function(){
//       console.log("im in selecting tags func javascript eman");
//     	if($(this).children("option:selected").attr("id") != "done"){
// 	        var tag= $(this).children("option:selected").val();
//           console.log(tag);
// 	        $(this).children("option:selected").attr("id", "done");
// 	         var jobSkills = document.getElementById("jobSkills" );
// 				var node = document.createElement("span");
// 				node.innerHTML += "<div class='row' style='margin-bottom:10px;'><span style='margin: 10px 20px 10px 20px; color: black;padding:5px 5px 5px 5px;  background-color: #e5e5e5; border-radius: 5px; border:1px solid black; font-size: 15px'><input style='display:none' name='tag"+tag_count+" value='"+tag+"'></input>"+tag+"</span></div>";
// 				tags_arr[tag_count++] = tag;
//         console.log(tags_arr);
//         jobSkills.appendChild(node);
// 		}
		
//     });

   
// });

// $('#jobpost_btn').click(function(){
//   console.log("in ijax");
//   var myJSONText = JSON.stringify( tags_arr );
// $.ajax({ 
//        type: "POST", 
//        url: "../controller/postJobController.php", 
//        data: { tags_array: myJSONText }, 
//        success: function() { 
//               alert("Success"); 
//         } 
// });

// });


//  // function validate_form(){

//  //  console.log("im in validate_form in assets folder");
//  //  alert("validating");
//  //  	var title = document.forms["post_job_form"]["inputTitle"].value;
//  //    var company = document.forms["post_job_form"]["inputCompany"].value;
//  //    var city = document.forms["post_job_form"]["inputCity"].value;
// 	// var name_regex = /^[a-zA-Z ]+$/;
//  //  var company_regex = /^[a-zA-Z| |0-9]+$/;
//  //    if(name_regex.test(title) == false){

//  //      alert("title name must be in alphabets only");
//  //      return;
//  //    }
//  //    if(name_regex.test(company) == false ){
//  //    	alert("company name must be in alphabets only");
//  //      return;
//  //    }
//  //    if(name_regex.test(city) == false ){
//  //    	alert("city name must be in alphabets only");
//  //      return;
//  //    }
   
//  //    window.location.href='../controller/postJobController.php';

//  // };