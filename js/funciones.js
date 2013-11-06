function Cliente()
{
    window.location = "cliente.php";
}
function backTo(loc)
{
    window.location = loc;
}
function buscarCliente()
{
    var num = document.getElementById("num").value;
    conexion = crearXMLHttpRequest();
    conexion.onreadystatechange = procesarEventos;
    conexion.open('GET', 'buscarCliente.php?num=' + num, true);
    conexion.send(null);
}
function procesarEventos()
{
    document.getElementById("info").style.visibility = 'visible';
    var status = document.getElementById("pgb");
    if(conexion.readyState == 4)
    {
        status.style.width = "100%";
        document.getElementById("info").innerHTML = conexion.responseText;
    }
    else if (conexion.readyState == 0)
    {
        status.style.width = "20%";
    }
    else if (conexion.readyState == 1)
    {
        status.style.width = "40%";
    }
    else if (conexion.readyState == 2)
    {
        status.style.width = "60%"
    }
    else if (conexion.readyState == 3)
    {
        status.style.width = "80%"
    }
}
function crearXMLHttpRequest()
{
    var xmlHttp=null;
    if (window.ActiveXObject) 
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    else 
        if (window.XMLHttpRequest) 
            xmlHttp = new XMLHttpRequest();
    return xmlHttp;
}