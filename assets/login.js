$('#formlogin').submit(function(e){
    e.preventDefault();
     var user = $.trim($("#usuario").val())
     var pass = $.trim($("#password").val())
     if(user.length == "" || pass.length == ""){
         alert("CAMPOS VACIOS");
         return false;
     }else{
         $.ajax({
             url

         });
     }
 });