$(document).ready(panelControl);
$(document).ready(tableEmpleadoRRHH);
$(document).ready(opciones);

var idAprobar ="";
var idDenegar ="";

function panelControl(){
    axios
    .get("/panel/rrhh")
    .then((response) => {
    
                console.log(response.data.aprobados);
       

    })
    .catch((err) => {        
        console.error(err);
    });

}

function opciones() {
   
    axios
        .get("/listado/permisos")
        .then((response) => {
        
            let lista =
                '<option selected="true" disabled="disabled">--Seleccione un tipo permiso--</option>';
            response.data.tipos.forEach((element) => {
                lista =
                    lista +
                    `<option value="${element.id}">${element.permiso}</option>`;
            });

            document.getElementById("permisosEmpleado").innerHTML = lista;
            document.getElementById("selectEdit").innerHTML = lista;
           

        })
        .catch((err) => {        
            console.error(err);
        });
}

function tableEmpleadoRRHH(){
   
       //console.log("entro")
        
    $('#tablePermisosRRHH').DataTable({
        ajax:'/listar/permisos/rrhh',
        processing: true,
        serverSide: true,
        columns: [
            {data: 'nombre_empleado', name: 'nombre_empleado'},
            {data: 'tipo_permiso', name: 'tipo_permiso'},
            {data: 'fecha_inicio', name: 'fecha_inicio'},
            {data: 'fecha_final', name: 'fecha_final'},
            {data: 'motivo', name: 'motivo'},
            {data: 'estado_jefe_aprueba', name: 'estado_jefe_aprueba'},
            {data: 'nombre_jefe', name: 'nombre_jefe'},              
            {data: 'estado_rrhh_aprueba', name: 'estado_rrhh_aprueba'},
            {data: 'nombre_rrhh', name: 'nombre_rrhh'},
            {data: 'acciones', name: 'acciones', orderable: false, searchable: false},
            

            
        ]
    });

}

function modalAprobar(id){

    //console.log(id);
    idAprobar = id;
    $("#approve_leave").modal();



    return;
    


}


function modalDenegar(id){
    idDenegar = id;
    $("#delete_approve").modal();
    return;
}

function aprobarPermiso(){



    axios.put('/aprobar/permiso/rrhh/'+idAprobar)
         .then( response =>{
                   //console.log( response.data );
                   $('#approve_leave').modal('hide');
                   $('#tablePermisosRRHH').DataTable().ajax.reload();
         })
         .catch( err =>{
           console.error(err.response.data.exception);
   
         })
   
   
        return;
   
   }

   function denegarPermiso(){



    axios.put('/denegar/permiso/rrhh/'+idDenegar)
         .then( response =>{
                  // console.log( response.data );
                   $('#delete_approve').modal('hide');
                   $('#tablePermisosRRHH').DataTable().ajax.reload();
         })
         .catch( err =>{
           console.error(err.response.data.exception);
   
         })
   
   
        return;
   
   }