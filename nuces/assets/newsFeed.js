var feed = 0;
$(window).scroll(function () { 
   if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
      console.log("at end");
      if(feed <10){
      	 var itm = document.getElementById('post_box');
       	 var cln = itm.cloneNode(true);
       	 document.getElementById('posts').appendChild(cln);
       	 feed++;
      }
     

   }
});


