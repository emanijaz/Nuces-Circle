
var skills_arr =[];

// function add_experience(){
// 	// alert("in add experience");
// 	var title = document.getElementById("title").value;
// 	var company = document.getElementById("company").value;
// 	var location = document.getElementById("location").value;
// 	var industry = document.getElementById("industry").value;
// 	var headline = document.getElementById("headline").value;
// 	var description = document.getElementById("description").value;
// 	var from_year = document.getElementById("from_year").value;
// 	var to_year = document.getElementById("to_year").value;

// 	var exp = document.getElementById("exp");
// 	var node = document.createElement("div");
// 	node.innerHTML += "<div style='padding: 10px 20px 10px 40px; background-color: #e5e5e5; border: 1px solid #3b444b; border-radius: 10px; margin: 10px 20px 0px 20px;'><div><h4><b>"+title+"</b></h4></div><div><h4>"+company+"</h4></div><div><h5><span>"+from_year+"</span>&nbsp&nbsp to &nbsp&nbsp<span>"+to_year+"</span></h5></div></div>";
// 	exp.appendChild(node);
// };
// function add_education(){
// 	// alert("in education");
// 	var school = document.getElementById("school").value;
// 	var start_date = document.getElementById("start_date").value;
// 	var end_date = document.getElementById("end_date").value;
// 	var degree = document.getElementById("degree").value;
// 	var field = document.getElementById("field").value;
// 	var grade = document.getElementById("grade").value;
// 	var activities = document.getElementById("activities").value;
// 	var description = document.getElementById("description").value;

// 	var edu = document.getElementById("edu");
// 	var node = document.createElement("div");
// 	node.innerHTML += "<div style='padding: 10px 20px 10px 40px; background-color: #e5e5e5; border: 1px solid  #3b444b; border-radius: 10px;margin: 10px 20px 0px 20px;'><div><h4><b>"+school+"</b></h4></div><div><h4>"+field+"</h4></div><div><h5><span>"+start_date+"</span>&nbsp&nbsp to &nbsp&nbsp<span>"+end_date+"</span></h5></div><div><p>Activities and Socities : "+activities+"</p></div></div>";
// 	edu.appendChild(node);
// };
// function add_lisc(){
// 	var lisc_name = document.getElementById("lisc_name").value;
// 	var issue_org = document.getElementById("issue_org").value;
// 	var lisc_from_year = document.getElementById("lisc_from_year").value;
// 	var lisc_to_year = document.getElementById("lisc_to_year").value;
// 	var cred_id = document.getElementById("cred_id").value;
// 	var cred_url = document.getElementById("cred_url").value;

// 	var lisc_cert = document.getElementById("lisc&cert" );
// 	var node = document.createElement("div");
// 	node.innerHTML += "<div style='padding: 10px 20px 10px 40px; background-color: #e5e5e5; border: 1px solid  #3b444b; border-radius: 10px; margin: 10px 20px 0px 20px;'><div><h4><b>"+lisc_name+"</b></h4></div><div><h4>"+issue_org+"</h4></div><div><h5><span>"+lisc_from_year+"</span>&nbsp&nbsp to &nbsp&nbsp<span>"+lisc_to_year+"</span></h5></div><div>"+cred_id+"</div></div>";
// 	lisc_cert.appendChild(node);
// };
// function add_course(){
// 	var course_name = document.getElementById("course_name").value;
// 	var course_number = document.getElementById("course_number").value;
// 	var course_association = document.getElementById("course_association").value;
// 	var courses = document.getElementById("courses" );
// 	var node = document.createElement("div");

// 	node.innerHTML += "<div style='padding: 10px 20px 10px 40px; background-color: #e5e5e5; border: 1px solid  #3b444b; border-radius: 10px; margin: 10px 20px 0px 20px;'><div class='row'><div class='col-md-3'><b>"+course_name+"</b></div><div class='col-md-9'>"+course_number+"</span></div></div></div>"
// 	courses.appendChild(node);
// };
// function add_language(){
// 	var language = document.getElementById("language").value;
	
// 	var prof = document.getElementById("lang_proficiency");
// 	var proficiency = prof.options[prof.selectedIndex].value;
// 	var lang = document.getElementById("lang" );
// 	var node = document.createElement("div");

// 	// node.innerHTML += "<div style='padding: 10px 20px 10px 40px; background-color: #e5e5e5; border: 2px solid black; border-radius: 10px;  margin: 10px 20px 0px 20px;'><div><b>"+language+"</b></div></div>"
// 	node.innerHTML += "<div style='padding: 10px 20px 10px 40px; background-color: #e5e5e5; border: 1px solid  #3b444b; border-radius: 10px; margin: 10px 20px 0px 20px;'><div class='row'><div class='col-md-3'><b>"+language+"</b></div><div class='col-md-9'>"+proficiency+"</span></div></div></div>"
// 	lang.appendChild(node);
// };
function add_skills_inSearchBar(obj){

	var new_skill = obj.value;
	if(new_skill == "upload"){
		add_skills();
	}
	else if(obj.value!='done'){

		obj.value = 'done';
		skills_arr.push(new_skill);
		var skills = document.getElementById("skills_search" );
		var node = document.createElement("span");
		node.innerHTML += "<span style='padding: 10px 10px 10px 10px'>"+new_skill+"</span>";
		
		skills.appendChild(node);
	}
};
function add_skills(){
 var skills = document.getElementById("skills" );
 // var node1 = document.createElement("div");
 // node1.innerHTML += "<span style='margin:10px 20px 0px 20px'></span>"
    
 if(skills_arr.length != 0){
 	 for (let i=0; i<skills_arr.length; i++) {
 		// var skills = document.getElementById("skills" );
 		var node = document.createElement("span");
 		// console.log(skills_arr[i]);
		node.innerHTML += "<div class='row' style='margin-bottom:10px;'><span style=' margin-right: 10px; padding: 5px 10px 5px 10px; background-color: #e5e5e5; border: 1px solid  #3b444b; border-radius:10px;'><span><b>"+skills_arr[i]+"</b></span></span></div>"
		skills.appendChild(node);
  			
	}
	// skills.appendChild(node1);
	
	document.getElementById('modal-wrapper-skills').style.display='none';
 }
 skills_arr = [];
};

function validate_exp_form(){

	
	console.log("in validation");
    var title = document.forms["exp_form"]["title"].value;
    var company = document.forms["exp_form"]["company"].value;
    var location = document.forms["exp_form"]["location"].value;
    var from_year = document.forms["exp_form"]["from_year"].value;
    var to_year = document.forms["exp_form"]["to_year"].value;
	var name_regex = /^[a-zA-Z ]+$/;

 	if(name_regex.test(title) == false){
      alert("title name must be in alphabets only");
 
    }
    else if(name_regex.test(location) == false){
    	alert("enter correct location");
    }
    else if(to_year < from_year){
    	alert("dates are not corret!");
    }

  	else{
	  	console.log("in appending");
		// html_to_insert = "<div style='padding: 10px 20px 10px 40px; background-color: #e5e5e5; border-radius: 5px;'><div><h4><b>"+title+"</b></h4></div><div><h4>"+company+"</h4></div><div><h5><span>"+from_year+"</span>&nbsp&nbsp to &nbsp&nbsp<span>"+to_year+"</span></h5></div></div>";
		// document.getElementById('exp').insertAdjacentHTML('beforeend', html_to_insert);
		add_experience();
		document.getElementById('modal-wrapper-experience').style.display='none';
	    
	}
  
    
    
};
function validate_edu_form(){

	console.log("in course validation");
    var school = document.forms["edu_form"]["school"].value;
    var from_year = document.forms["edu_form"]["from_year"].value;
    var to_year = document.forms["edu_form"]["to_year"].value;
    var degree = document.forms["edu_form"]["Degree"].value;
    var sf = document.forms["edu_form"]["StudyField"].value;
	var name_regex = /^[a-zA-Z ]+$/;

 	if(name_regex.test(school) == false){
      alert("school name must be in alphabets only");
 
    }
    else if(to_year < from_year){
    	alert("dates are not correct!");
    }
    else if(name_regex.test(degree) == false){
    	alert("degree must be in alphabets");
    }
    else if(name_regex.test(sf) == false){
    	alert("field of study must be in alphabets");
    }
  	else{
	  	console.log("in appending");
		add_education();
		document.getElementById('modal-wrapper-education').style.display='none';
		
	    
	}
  
    
}
function validate_lisc_form(){
	console.log("in liscence validation");
    var name = document.forms["lisc_form"]["name"].value;
    var from_year = document.forms["lisc_form"]["from_year"].value;
    var to_year = document.forms["lisc_form"]["to_year"].value;
    var issue_org = document.forms["lisc_form"]["Issuing_organization"].value;
    var cred_id = document.forms["lisc_form"]["credetial_id"].value;
    var cred_url = document.forms["lisc_form"]["credetial_url"].value;
	var name_regex = /^[a-zA-Z ]+$/;

 	if(name_regex.test(name) == false){
      alert("name must be in alphabets only");
 
    }
    else if(to_year < from_year){
    	alert("dates are not correct!");
    }
    else if(name_regex.test(issue_org) == false){
    	alert("Organization must be in alphabets");
    }
  	else{
	  	console.log("in appending");
		add_lisc();
		document.getElementById('modal-wrapper-lisc&cert').style.display='none';
		
	    
	}
  
    

}
function validate_course_form(){
    var name = document.forms["course_form"]["course_name"].value;
    var number = document.forms["course_form"]["course_number"].value;
    var association = document.forms["course_form"]["course_association"].value;
	var name_regex = /^[a-zA-Z ]+$/;
	var courseNum_regex = /^[0-9A-Z]{2,3}-[0-9]{1,4}$/; 
 	if(name_regex.test(name) == false){
      alert("course name must be in alphabets only");
 
    }
    else if(courseNum_regex.test(number) == false){
    	 alert("enter valid course number");
    }
    
  	else{
	  	console.log("in appending");
		add_course();
		document.getElementById('modal-wrapper-course').style.display='none';
		
	    
	}
  
    


}
function validate_lang_form(){

    var name = document.forms["lang_form"]["language"].value;
	
	var name_regex = /^[a-zA-Z]+$/;
 	if(name_regex.test(name) == false){
      alert("Language must be in alphabets only");
 
    }
  	
  	else{
	  	console.log("in appending");
		add_language();
		document.getElementById('modal-wrapper-language').style.display='none';
		
	    
	}
  

}