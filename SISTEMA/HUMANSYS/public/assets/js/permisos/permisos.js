$(document).ready(opciones);

function opciones(){
   

//  var opciones = document.getElementById('permisosEmpleado').innerHTML=`
//  <option>Casual Leave 12 Days</option>
//  <option>Prueba de inner</option>
 
//  `

 axios.get('/listado/permisos')
 .then( response=>{
     console.log(response.data)

     let lista ="";
     response.data.tipos.forEach(element => {

        lista = lista + `<option value="${element.id}">${element.permiso}</option>`
         
     });

     document.getElementById('permisosEmpleado').innerHTML= lista;


 })
 .catch( err =>{
    // console.error(err,"entro");
  console.error(err.response.data.exception)
  
})  



}