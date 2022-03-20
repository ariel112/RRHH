this.obtenerAsistencia();




function obtenerAsistencia(){
    $("#asistenciaGeneral").DataTable({
        ajax: "/asistencia/listar/general",
        processing: true,
        serverSide: true,
        destroy: true,
        columns: [
            { data: "CODIGO_EMPLEADO", name: "CODIGO_EMPLEADO" },
            { data: "IDENTIDAD", name: "IDENTIDAD" },
            { data: "NOMBRE", name: "NOMBRE" },
            { data: "DEPARTAMENTO", name: "DEPARTAMENTO" },
            { data: "FEECHA_DIA", name: "FEECHA_DIA" },
            { data: "HORA_ENTRADA", name: "HORA_ENTRADA" },
            { data: "HORA_SALIDA", name: "HORA_SALIDA" },
            { data: "MINUTOS_TARDE", name: "MINUTOS_TARDE" },
            { data: "MINUTOS_ANTES", name: "MINUTOS_ANTES" },
            { data: "MINUTOS_EXTRA", name: "MINUTOS_EXTRA" },
            { data: "SALIDA/ENTRADA_MEDIO_DIA", name: "SALIDA/ENTRADA_MEDIO_DIA" },
            { data: "PERMISO_SOLICITADO", name: "PERMISO_SOLICITADO" },

        ],
    });
}


function descargarExcel(){

    let fechaInicio = document.getElementById('fechaInicioAsistencia').value;
    let fechaFinal = document.getElementById('fechaFinalAsistencia').value;


    axios({
        url: '/asistencia/descargar/lista',
        method: 'POST',
        responseType: 'blob', // important
        data: {
            fechaInicio: fechaInicio,
            fechaFinal: fechaFinal
          }

    })

    .then(
        (response => {

            let mensaje = response.data.message;

            const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'asistencia.xlsx'); //or any other extension
                document.body.appendChild(link);
                link.click();



                    })
    ).catch( (err) => {
           // console.log(err)
            Swal.fire({
                title: "Error!",
                text: "Ha ocurrido un error, intente de nuevo.",
                icon: "error",
                confirmButtonText: "Cerrar",
            });
    })
}

function listarPorFechas(){

    let fechaInicio = document.getElementById('fechaInicioAsistencia').value;
    let fechafinal = document.getElementById('fechaFinalAsistencia').value;

    if(!(fechaInicio && fechafinal)){
        return;
    }

    let fechas = {
        fechaInicio:fechaInicio,
        fechaFinal: fechafinal

    }

    console.log(fechafinal);



     $("#asistenciaGeneral").DataTable().clear().destroy();
     //$('#equictntbl').DataTable().clear().destroy();


     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $("#asistenciaGeneral").DataTable({
       // type: "POST",
        ajax: {
            url: '/asistencia/rango/fechas',
            method: 'POST',
            data: fechas,
            dataType: 'json',
        },

        processing: true,
        serverSide: true,
        destroy: true,
        columns: [
            { data: "CODIGO_EMPLEADO", name: "CODIGO_EMPLEADO" },
            { data: "IDENTIDAD", name: "IDENTIDAD" },
            { data: "NOMBRE", name: "NOMBRE" },
            { data: "DEPARTAMENTO", name: "DEPARTAMENTO" },
            { data: "FEECHA_DIA", name: "FEECHA_DIA" },
            { data: "HORA_ENTRADA", name: "HORA_ENTRADA" },
            { data: "HORA_SALIDA", name: "HORA_SALIDA" },
            { data: "MINUTOS_TARDE", name: "MINUTOS_TARDE" },
            { data: "MINUTOS_ANTES", name: "MINUTOS_ANTES" },
            { data: "MINUTOS_EXTRA", name: "MINUTOS_EXTRA" },
            { data: "SALIDA/ENTRADA_MEDIO_DIA", name: "SALIDA/ENTRADA_MEDIO_DIA" },
            { data: "PERMISO_SOLICITADO", name: "PERMISO_SOLICITADO" },

        ],
    });

}
