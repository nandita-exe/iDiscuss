function myfun() {
    var e = document.getElementById("signupEmail").value;
    var u = document.getElementById("username").value;
    var a = document.getElementById("signupPassword").value;
    var b = document.getElementById("signupCpassword").value;

    if(e==""){
        document.getElementById("message").innerHTML="Please fill the email";
        return false;
    }
    if(u==""){
        document.getElementById("message").innerHTML="";
        document.getElementById("message1").innerHTML="Please fill the username";
        return false;
    }
    if(a==""){
        document.getElementById("message1").innerHTML="";
        document.getElementById("message2").innerHTML="Please fill the password";
        return false;
    }
    if(a.length<5){
        document.getElementById("message2").innerHTML="Password length must be greater than 5 characters";
        return false;
    }
    if(a.length>25){
        document.getElementById("message2").innerHTML="Password length must be less than 25 characters";
        return false;
    }

    var capital= /[A-Z]/g;
    var small = /[a-z]/g;
    var num = /[0-9]/g;

    if(!a.match(capital) || !a.match(small) || !a.match(num)){
        document.getElementById("message2").innerHTML="Password must be alphanumeric and contain at least 1 uppercase and 1 lowercase character";
        return false;
    }
    // if(!a.match(small)){
    //     document.getElementById("message").innerHTML="Password must contain at least 1 lowercase character";
    //     return false;
    // }
    // if(!a.match(num)){
    //     document.getElementById("message").innerHTML="Password must contain at least 1 number";
    //     return false;
    // }
    if(a!=b){
        document.getElementById("message2").innerHTML="";
        document.getElementById("message3").innerHTML="Passwords do not match";
        return false;
    }

}