document.getElementById("slanje").onclick = function(event) {
    var slanjeForme = true;

    // Korisničko ime mora biti uneseno
    var poljeUsername = document.getElementById("username");
    var username = document.getElementById("username").value;

    if (username.length == 0) {
        slanjeForme = false;
        poljeUsername.style.border="1px dashed red";
        document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>";
    } else {
        poljeUsername.style.border="1px solid green";
        document.getElementById("porukaUsername").innerHTML="";
    }

    if (slanjeForme != true) {
        event.preventDefault();
    }
    
};