$(document).ready(function() {
    
   $("#hideLogin").click(function() { //finds the span and applys the following function to it. when it is clicked
       $("#loginForm").hide(); //hides the login form when the text is clicked
       $("#registerForm").show(); //shows the register form when it is clicked as well
   });
    
    $("#hideRegister").click(function() {
       $("#loginForm").show();
       $("#registerForm").hide();
   }) ;
});

