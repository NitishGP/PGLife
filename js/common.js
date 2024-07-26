"use strict";
window.addEventListener("load", function(){
    var signup_form = document.getElementById("signup-form");
    signup_form.addEventListener("submit", function(event){
        var XHR = new XMLHttpRequest();
        var form_data= new FormData(signup_form);

        //on success
        XHR.addEventListener("load", signup_success);

        //on erroe
        XHR.addEventListener("error", on_error);

        //set up request
        XHR.open("POST","api/signup_submit.php");

        //form-data is send with request
        XHR.send(form_data);

        document.getElementById("loading").style.display='block';
        event.preventDefault();
    });
}); 
    
// window.addEventListener("load", function(){
//     var login_form = document.getElementById("login-form");
//     login_form.addEventListener("submit", function(e){
//         var XHR = new XMLHttpRequest();
//         var form_data = new FormData();

//         //on success
//         XHR.addEventListener("load", login_success);

//         //on error
//         XHR.addEventListener("error", on_error);

//         //set up request
//         XHR.open("POST", "api/login_submit.php");

//         //form_data is send with req
//         XHR.send(form_data);

//         document.getElementById("loading").style.display="block";
//         e.preventDefault();
//     });
// });

var signup_success = (event) =>{
    document.getElementById("loading").style.display="none";

    var response = JSON.parse(event.target.responseText);
    if(response.success){
        alert(response.message);
        window.location.href = "index.php";
    }else{
        alert(response.message);
    }
};

// var login_success = (event) =>{
//     document.getElementById("loading").style.display="none";

//     var response = JSON.parse(event.target.responseText);
//     if(response.success){
//         alert(response.message);
        
//     }else{
//         alert(response.message);
//     }
// };

var on_error = function(e){
    document.getElementById("loading").style.display = 'none';
    alert('Oops! Something went wrong.');
};