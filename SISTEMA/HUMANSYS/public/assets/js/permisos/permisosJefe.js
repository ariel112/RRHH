



$(document).ready(tableEmpleadoJefe);
$(document).ready(opciones);

var idAprobar ="";


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

function verificarData() {
    let y = document.getElementById("fechaInicio").value;
    let ddi = y.substring(0, 2);
    let mmi = y.substring(3, 5);
    let yyi = y.substring(6, 10);

    let fechaInicio = yyi + "-" + mmi + "-" + ddi;

    let x = document.getElementById("fechaFinal").value;
    let ddf = x.substring(0, 2);
    let mmf = x.substring(3, 5);
    let yyf = x.substring(6, 10);

    let fechaFinal = yyf + "-" + mmf + "-" + ddf;

    let fechasValidas = this.compararFecha(yyi, mmi, ddi, yyf, mmf, ddf);

    if (!fechasValidas) {
        Swal.fire({
            title: "Error!",
            text:
                "La fecha de finalizacion no puede ser menor que la fecha de inicio.",
            icon: "error",
            confirmButtonText: "Cerrar",
        });

        return;
    }

    if (y && x) {
        if (fechaInicio == fechaFinal) {
            document.getElementById("verificar").className = " d-none";
            document.getElementById("horasPermisos").className = "d-block";
            document.getElementById("enviar").className =
                "submit-section d-block";
        } else {
            document.getElementById("verificar").className = " d-none";
            document.getElementById("horasPermisos").className = "d-none";
            document.getElementById("enviar").className =
                "submit-section d-block";
        }
    } else {
        //console.log(y , x)
        Swal.fire({
            title: "Error!",
            text: "Por favor llenar todos los campos solicitados.",
            icon: "error",
            confirmButtonText: "Cerrar",
        });
    }

    return;
}

function compararFecha(yyi, mmi, ddi, yyf, mmf, ddf) {

    let mmInit = mmi-1;
    let mmFin = mmf-1;//debo restar 1 al mes 


    let fechaInicio = new Date(yyi, mmInit, ddi);
    let fechafinal = new Date(yyf, mmFin, ddf);

    fechaInicio.setHours(0,0,0,0);//como solo me interesa la fecha debo setear las horas a cero
    fechafinal.setHours(0,0,0,0);

    

   if(fechafinal > fechaInicio){
        return true;
   }

    if(fechafinal.getTime() == fechaInicio.getTime()){
        return true
    }


return false;

}