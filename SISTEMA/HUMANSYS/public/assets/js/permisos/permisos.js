

$(document).ready(opciones);

function opciones(){
   

 var opciones = document.getElementById('permisosEmpleado').innerHTML=`
 <option>Casual Leave 12 Days</option>
 <option>Prueba de inner</option>
 
 `

 axios.get('/listado/permisos')
 .then( response=>{
     console.log(response.data)
 } )

    



}