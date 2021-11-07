function loadXMLDoc(url) {
    var xmlhttp;
    var txt,x,y,z,i;

    xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            x = xmlhttp.responseXML.documentElement.getElementsByTagName("colonne");
            txt = "";

            for (i = 0; i < x.length; i++) {
                txt = txt + "<div>";
                y = x[i].getElementsByTagName("titre");
                z = x[i].getElementsByTagName("image");
                txt = txt + "<img src="+z[0].firstChild.nodeValue+" id='imageicon-classement'> "
                txt = txt + "<span>" + y[0].firstChild.nodeValue + "</span>";
                txt = txt + "</div>";
            }

            document.getElementById('titre-tableau-classement').innerHTML = txt;
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}