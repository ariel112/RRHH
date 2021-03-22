$(document).ready(opciones);

function opciones(){
   

//  var opciones = document.getElementById('permisosEmpleado').innerHTML=`
//  <option>Casual Leave 12 Days</option>
//  <option>Prueba de inner</option>
 
//  `

 axios.get('/listado/permisos')
 .then( response=>{
     //console.log(response.data)

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


function enviarPermiso(){

       let y = document.getElementById('fechaInicio').value;
       let ddi = y.substring(0, 2);
       let mmi = y.substring(3,5);
       let yyi = y.substring(6,10);

       let fechaInicio = yyi+'-'+mmi+'-'+ddi;

    
       let x=   document.getElementById('fechaFinal').value;
       let ddf = x.substring(0, 2);
       let mmf = x.substring(3,5);
       let yyf = x.substring(6,10);

       let fechaFinal = yyf+'-'+mmf+'-'+ddf;

       if(fechaFinal == fechaInicio){
        document.getElementById("horasPermisos").className = "d-block";
       }else{
        document.getElementById("horasPermisos").className = "d-none";
       }
       
       let horaInicio = document.getElementById('horaInicial').value;
       let horaFinal = document.getElementById('horaFinal').value;


       if(fechaFinal == fechaInicio){

            if(horaInicio && horaFinal){
                    //guardar datos con hora
            }

       }else{
         //guardar fechas
       }


       
       
       console.log(horaInicio,horaFinal);


       return;


}