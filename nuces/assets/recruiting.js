function open_post_job_form(){

	 window.open("post_job_form.html");
}

function open_job_description(){

	 window.open("job_description.html");
}

var DiscPool = new Array();
var InterestPool = new Array();
var searchArr =new Array();

function job(tit, tech){
  this.jobTitle = tit;
  this.jobTechnologies = tech;
}
function connection(name, headline, gradDate){
  this.person_name = name;
  this.headline = headline;
  this.gradDate = gradDate;
}


function searchWidget(id, search_id, array){
 
  this.arr = array;
  this.id = id;
  this.searchDivId = search_id;
  searchArr[this.id] = this;
}
searchWidget.prototype.searchFunction = function(){

  // console.log(this.inputField);
  var inputField = document.getElementById(this.id+"_input").value;
  var filter = inputField.toUpperCase();

  if(filter == ""){
    for(i=0;i<a.length; i++){
        a[i].style.display = "block";
    }
  }
  
  if(filter != ""){
  div = document.getElementById(this.searchDivId);
  a = div.getElementsByTagName("a");
  for(i=0;i<a.length; i++){
    a[i].style.display = "block";
  }
  var found =0 ;
  var match = 0;
  filter =  $.trim(filter); 
  var split = filter.split(" ");
  $.each(split,function(index,item){
  split[index] = item.toUpperCase();
  });
  console.log(split);

  // for(i=0; i< this.arr.length ; i++){
    
  //   // for(s in split){
  //     for(x in this.arr[i]){
     
  //       if(this.arr[i][x].toUpperCase().indexOf(filter) > -1){
  //         console.log("match");
  //         a[i].style.display = "";
  //         match ++ ; 
  //         found = 1;
  //       }

  //     }
  //     console.log("match is " + match);
  //     console.log("aplit length is : " + split.length);
  //     // if(match == split.length){ 

  //     //   break;
  //     // }
  //     // match = 0;
      
   
    
   
  //   if(found==0){
  //     a[i].style.display = "none";
  //   }
  //   found=0;
  // }

   

   var matchArr = new Array();
   var m = 0;
   console.log("arr length is : " + this.arr.length);
   for(i=0; i< this.arr.length ; i++){
      for(x in this.arr[i]){
         for(var s=0; s<split.length; s++){
           console.log("split is  : " + split);
           console.log("split[s] is : " + split[s]);
           if(this.arr[i][x].toUpperCase().indexOf(split[s]) > -1){
             console.log("arr[i][x] is : " + this.arr[i][x].toUpperCase());
             console.log("match");
            match ++ ;
           }
        }
      }
       console.log("match is " + match);
   console.log("split length is : " + split.length);
      if(match != split.length){
        // console.log("match arr  : " + matchArr);
        matchArr[m++] = i;
      }
      match = 0;
   }
   for(b=0;b<m;b++){
    console.log(matchArr[b]);
    a[matchArr[b]].style.display = "none";
   }
  var matchArr = new Array();
 }
};
function search(id){
  searchArr[id].searchFunction();
}
searchWidget.prototype.getSearchBarHTML = function(){
  var html ="";
 

  html += 
   "<input id='"+this.id+"_input' class='form-control' onkeyup='search(\""+ this.id +"\")' autocomplete='off' placeholder='Search' type='text'>"
   return html;
  
}




searchWidget.prototype.render = function(divId){
  // console.log("in  render func");
  var html = "";
  html = this.getSearchBarHTML();


document.getElementById(divId).innerHTML = html;
};
//    //////////////////////////////////////////        





function load1(){


  var searchArrJob = new Array();
  var index = 0;
  var obj = new XMLHttpRequest();
    obj.onreadystatechange = function (){
      if(obj.readyState == 4 && obj.status == 200){
        var response = obj.responseText;
        var nameArr = response.split('<br>');
        // console.log(nameArr[0] + " " + nameArr[1] + " " + nameArr[2]+ " "+ nameArr[3] + " " + nameArr[4] + " " + nameArr[5] )
      
        for(var i=0; i<nameArr.length-1; ){
          searchArrJob[index++] = new job(nameArr[i++], nameArr[i++]);
        }

      }
    }
    obj.open("GET",'../controller/ajax_jobs.php',true);
    obj.send();



 
 var wid1 =  new searchWidget('search1','job_list', searchArrJob );

  
  wid1.render("J_search_widget");
};


function load2(){




var searchArrConn = new Array();
var index = 0;
  var obj = new XMLHttpRequest();
    obj.onreadystatechange = function (){
      if(obj.readyState == 4 && obj.status == 200){
        var response = obj.responseText;
        var nameArr = response.split('<br>');
        for(var i=0; i<nameArr.length-1; ){
           console.log(nameArr[i]+ " " +nameArr[i+1] +" " + nameArr[i+2]);
          searchArrConn[index++] = new connection(nameArr[i++], nameArr[i++],  nameArr[i++]);
        }

      }
    }
    obj.open("GET",'../controller/ajax_connections.php',true);
    obj.send();
 

   var wid2 =  new searchWidget('search2','connections_well', searchArrConn );
 
  wid2.render("C_search_widget");
};
