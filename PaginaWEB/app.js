document.getElementById("formulario").addEventListener("submit",function(e){
    e.preventDefault();

    let nombre=document.getElementById("nombre").value;
    let correo=document.getElementById("correo").value;
    let datos=new FormData();
    datos.append("nombre",nombre);
    datos.append("correo",correo);

    fetch("guardar.php",{
        method:"POST",
        body:datos
    })
    .then(Response=>Response.text())
    .then(data=>{
        document.getElementById("respuesta").innerHTML=data;
    })
    .catch(error=>{
        console.log(error);
    });
});