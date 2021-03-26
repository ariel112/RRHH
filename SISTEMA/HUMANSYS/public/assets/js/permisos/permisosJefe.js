

var idAprobar ="";
$(document).ready(tableEmpleadoJefe);

function tableEmpleadoJefe(){
   
       console.log("entro")
        
    $('#tablePermisosJefe').DataTable({
        ajax:'/listar/permisos/jefe',
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

    console.log(id);
    idAprobar = id;
    $("#approve_leave").modal();



    return;
    


}

 function aprobarPermiso(){



 axios.put('/aprobar/permiso/'+idAprobar)
      .then( response =>{
                console.log( response.data );
                $('#approve_leave').modal('hide');
                $('#tablePermisosJefe').DataTable().ajax.reload();
      })
      .catch( err =>{
        console.error(err.response.data.exception);

      })


     return;

}