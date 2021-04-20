function signUp() {
    var form = document.getElementById("register");
    var formData = new FormData(form);
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200) {
           if(ajax.responseText == "true") {
               window.location = "views/dashboard.php";
           } else {
            alert(ajax.responseText);
           }
        }
    }
    ajax.open("POST", "phpCode/authentication.php");
    ajax.send(formData);

}



function signIn() {
    var form = document.getElementById("login");
    var formData = new FormData(form);
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200) {
           if(ajax.responseText == "true") {
               window.location = "../views/dashboard.php";
           } else {
            alert(ajax.responseText);
           }
        }
    }
    ajax.open("POST", "../phpCode/authentication.php");
    ajax.send(formData);

}