addEventListener('load',inicializarEventos,false);

function retornarDatos()
{
  var cad='';
  var nom=document.getElementById('nombre').value;

  cad='nombre='+encodeURIComponent(nom);
  return cad;
}


var conexion2;
function enviarFormulario() 
{
  conexion2=new XMLHttpRequest();
  conexion2.onreadystatechange = proceso;
  conexion2.open('POST','pagina2.php', true);
  conexion2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexion2.send(retornarDatos());  
}
function enviarDatos(e)
{
  e.preventDefault();
  enviarFormulario();
}

function inicializarEventos()
{

  for(var f=1;f<=12;f++)
  {
    var ob=document.getElementById('enlace'+f);
    ob.addEventListener('click',presionEnlace,false);
  }
 
}

function presionEnlace(e)
{
    e.preventDefault();
    var url=e.target.getAttribute('href');
    cargarHoroscopo(url); 
    var ref=document.getElementById('formulario');
    ref.addEventListener('submit',enviarDatos,false);


}


var conexion1;
function cargarHoroscopo(url) 
{
  conexion1=new XMLHttpRequest();  
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open("GET", url, true);
  conexion1.send();
}



function procesarEventos()
{
  var detalles = document.getElementById("detalles");
 
  if(conexion1.readyState == 4)
  {
    detalles.innerHTML = conexion1.responseText;
    
  } 
  else 
  {
   
  }
 
  
  
}

function proceso()
{
  var resultados = document.getElementById("resultados");
  if(conexion2.readyState == 4)
  {
    resultados.innerHTML = 'Gracias.';
  } 
  else 
  {
    resultados.innerHTML = 'Procesando...';
  }
}


//enviar datos
