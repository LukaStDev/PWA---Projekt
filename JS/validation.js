document.getElementById("accept").onclick = function(event) {

    var slanjeForme = true;


    // Naslov vjesti (5-30 znakova)
    var poljeTitle = document.getElementById("title");
    var title = document.getElementById("title").value;
    if (title.length < 5 || title.length > 30) {
    slanjeForme = false;
    poljeTitle.style.border="1px dashed red";
    document.getElementById("porukaTitle").style.color ="red";
    document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
    } else {
    poljeTitle.style.border="1px solid green";
    document.getElementById("porukaTitle").innerHTML="";
    }


    // Kratki sadržaj (10-100 znakova)
    var poljeAbout = document.getElementById("about");
    var about = document.getElementById("about").value;
    if (about.length < 10 || about.length > 255) {
    slanjeForme = false;
    poljeAbout.style.border="1px dashed red";
    document.getElementById("porukaAbout").style.color ="red";
    document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
    } else {
    poljeAbout.style.border="1px solid green";
    document.getElementById("porukaAbout").innerHTML="";
    }


    // Sadržaj mora biti unesen
    var poljeContent = document.getElementById("content");
    var content = document.getElementById("content").value;
    if (content.length == 0) {
    slanjeForme = false;
    poljeContent.style.border="1px dashed red";
    document.getElementById("porukaContent").style.color ="red";
    document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";
    } else {
    poljeContent.style.border="1px solid green";
    10
    document.getElementById("porukaContent").innerHTML="";
    }


    // Slika mora biti unesena
    var poljeSlika = document.getElementById("picture");
    var picture = document.getElementById("picture").value;
    if (picture.length == 0) {
    slanjeForme = false;
    poljeSlika.style.border="1px dashed red";
    document.getElementById("porukaSlika").style.color ="red";
    document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
    } else {
    poljeSlika.style.border="1px solid green";
    document.getElementById("porukaSlika").innerHTML="";
    }


    // Kategorija mora biti odabrana
    // var poljeCategory = document.getElementById("category");
    // if(document.getElementById("category").selectedIndex == 0) {
    // slanjeForme = false;
    // poljeCategory.style.border="1px dashed red";
    // document.getElementById("porukaKategorija").style.color ="red";
    // document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
    // } else {
    // poljeCategory.style.border="1px solid green";
    // document.getElementById("porukaKategorija").innerHTML="";
    // }

    if (slanjeForme == false) {
    event.preventDefault();
    }
};
