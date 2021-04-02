$(document).ready(opciones);
$(document).ready(tableEmpleado);

var idEdit = "";

function opciones() {
    //  var opciones = document.getElementById('permisosEmpleado').innerHTML=`
    //  <option>Casual Leave 12 Days</option>
    //  <option>Prueba de inner</option>

    //  `

    axios
        .get("/listado/permisos")
        .then((response) => {
            //console.log(response.data)

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
            // console.error(err,"entro");
            console.error(err.response.data.exception);
        });
}

function enviarPermiso() {
    let tipoPermiso = document.getElementById("permisosEmpleado").value;
    let option = document.getElementById("permisosEmpleado");
    let tipoPermisoText = option.options[option.selectedIndex].text;

    let motivo = document.getElementById("motivoPermiso").value;
    //console.log(tipoPermisoText)

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

    //funcion para comparar fechas
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

    if (y && x && y == x) {
        let horaInicio = document.getElementById("horaInicio").value;
        let horaFinal = document.getElementById("horaFinal").value;
        fechaInicio = fechaInicio + " " + horaInicio;
        fechaFinal = fechaFinal + " " + horaFinal;
        if (
            tipoPermisoText &&
            tipoPermiso &&
            motivo &&
            horaInicio &&
            horaFinal
        ) {
            axios
                .post("/permiso/empleado/guardar", {
                    unDia: 1,
                    tipoPermisoTexto: tipoPermisoText,
                    fechaInicio: fechaInicio,
                    fechaFinal: fechaFinal,
                    tipoPermiso: tipoPermiso,
                    horaInicio: horaInicio,
                    horaFinal: horaFinal,
                    motivo: motivo,
                })
                .then((response) => {
                    //console.log(response.data)

                    document.getElementById("formPermiso").reset();

                    $("#add_leave").modal("hide");

                    document.getElementById("horasPermisos").className =
                        "d-none";
                    document.getElementById("enviar").className =
                        "submit-section d-none";
                    document.getElementById("verificar").className =
                        "submit-section d-block";

                    $("#empleadoListado").DataTable().ajax.reload();

                    this.opciones();

                    Swal.fire({
                        title: "Exito!",
                        text: "Permiso enviado con éxito.",
                        icon: "success",
                        confirmButtonText: "Cerrar",
                    });

                })
                .catch((err) => {
                    Swal.fire({
                        title: "Error!",
                        text:
                            "Ha ocurrido un error, por favor inténtelo nuevamente.",
                        icon: "error",
                        confirmButtonText: "Cerrar",
                    });

                    // console.error(
                    //     err.response.data.exception,
                    //     "entro al error"
                    // );
                });

            return;
        } else {
            //todos los campos son requeridos
            Swal.fire({
                title: "Error!",
                text: "Por favor llenar todos los campos solicitados.",
                icon: "error",
                confirmButtonText: "Cerrar",
            });
            return;
        }
    } else if (y && x && y !== x) {
        if (tipoPermisoText && tipoPermiso && motivo) {
            axios
                .post("/permiso/empleado/guardar", {
                    unDia: 2,
                    tipoPermisoTexto: tipoPermisoText,
                    fechaInicio: fechaInicio,
                    fechaFinal: fechaFinal,
                    tipoPermiso: tipoPermiso,
                    motivo: motivo,
                })
                .then((response) => {
                    console.log(response.data);
                    document.getElementById("formPermiso").reset();
                    $("#add_leave").modal("hide");

                    document.getElementById("horasPermisos").className =
                        "d-none";
                    document.getElementById("enviar").className =
                        "submit-section d-none";
                    document.getElementById("verificar").className =
                        "submit-section d-block";
                    $("#empleadoListado").DataTable().ajax.reload();

                    Swal.fire({
                        title: "Exito!",
                        text: "Permiso editado con éxito.",
                        icon: "success",
                        confirmButtonText: "Cerrar",
                    });
                })
                .catch((err) => {
                    console.error(err.response.data.exception);
                    Swal.fire({
                        title: "Error!",
                        text:
                            "Ha ocurrido un error, por favor inténtelo nuevamente.",
                        icon: "error",
                        confirmButtonText: "Cerrar",
                    });
                });

            return;
        } else {
            //todos los campos son requeridos
            Swal.fire({
                title: "Error!",
                text: "Por favor llenar todos los campos solicitados.",
                icon: "error",
                confirmButtonText: "Cerrar",
            });
            return;
        }
    } else {
        Swal.fire({
            title: "Error!",
            text: "Por favor llenar todos los campos solicitados.",
            icon: "error",
            confirmButtonText: "Cerrar",
        });
        return;
    }
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

//jquery

function tableEmpleado() {
    $("#empleadoListado").DataTable({
        ajax: "/listar/permisos/solicitados",
        processing: true,
        serverSide: true,
        columns: [
            { data: "tipo_permiso", name: "tipo_permiso" },
            { data: "fecha_inicio", name: "fecha_inicio" },
            { data: "fecha_final", name: "fecha_final" },
            { data: "motivo", name: "motivo" },
            { data: "estado_jefe_aprueba", name: "estado_jefe_aprueba" },
            { data: "nombre_jefe", name: "nombre_jefe" },
            { data: "estado_rrhh_aprueba", name: "estado_rrhh_aprueba" },
            { data: "nombre_rrhh", name: "nombre_rrhh" },
            {
                data: "acciones",
                name: "acciones",
                orderable: false,
                searchable: false,
            },
        ],
    });
}

function editarPermiso(idPermiso) {
    idEdit = idPermiso;

    document.getElementById("permisoEdit").reset();
    document.getElementById("verificarEdit").className =
        " submit-section d-block";
    document.getElementById("enviarEdit").className = "d-none";

    axios
        .put("/datos/permiso/" + idPermiso)
        .then((response) => {
            this.opciones();

            let fechaInicioEdit = document.getElementById("fechaInicioEdit");
            let fechaFinalEdit = document.getElementById("fechaFinalEdit");
            let motivoEdit = document.getElementById("motivoEdit");

            let fechaIniEdit = response.data.permiso.fecha_inicio;
            let yyEditIni = fechaIniEdit.substring(0, 4);
            let mmEditiIni = fechaIniEdit.substring(5, 7);
            let ddEdiIni = fechaIniEdit.substring(8, 10);

            let fechaFinEdit = response.data.permiso.fecha_final;
            let yyEditFinal = fechaFinEdit.substring(0, 4);
            let mmEditiFinal = fechaFinEdit.substring(5, 7);
            let ddEditFinal = fechaFinEdit.substring(8, 10);

            fechaInicioEdit.value =
                ddEdiIni + "/" + mmEditiIni + "/" + yyEditIni;
            fechaFinalEdit.value =
                ddEditFinal + "/" + mmEditiFinal + "/" + yyEditFinal;

            // fechaInicioEdit.value = response.data.permiso.fecha_inicio;
            // fechaFinalEdit.value = response.data.permiso.fecha_final;

            motivoEdit.value = response.data.permiso.motivo;

            let horaInicio = response.data.permiso.hora_inicio;
            let horaFinal = response.data.permiso.hora_final;

            if (horaFinal && horaInicio) {
                let horaInicioForm = document.getElementById("horaInicioEdit");
                let horaFinalForm = document.getElementById("horaFinalEdit");

                horaInicioForm.value = horaInicio;
                horaFinalForm.value = horaFinal;

                document.getElementById("horasPermisosEdit").className =
                    "d-block";
            } else {
                document.getElementById("horasPermisosEdit").className =
                    "d-none";
            }

            // console.log(tipoPermisoEdit.value)
            $("#edit_leave").modal();
        })
        .catch((err) => {
            console.error(err);
        });
}

function verificarDataEdit() {
    let y = document.getElementById("fechaInicioEdit").value;
    let ddi = y.substring(0, 2);
    let mmi = y.substring(3, 5);
    let yyi = y.substring(6, 10);

    let fechaInicio = yyi + "-" + mmi + "-" + ddi;

    let x = document.getElementById("fechaFinalEdit").value;
    let ddf = x.substring(0, 2);
    let mmf = x.substring(3, 5);
    let yyf = x.substring(6, 10);

    let fechaFinal = yyf + "-" + mmf + "-" + ddf;

 
    if (y && x) {

           //verificar fechas aqui
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

        if (fechaInicio == fechaFinal) {
            document.getElementById("verificarEdit").className = " d-none";
            document.getElementById("horasPermisosEdit").className = "d-block";
            document.getElementById("enviarEdit").className =
                "submit-section d-block";
        } else {
            document.getElementById("verificarEdit").className = " d-none";
            document.getElementById("horasPermisosEdit").className = "d-none";
            document.getElementById("enviarEdit").className =
                "submit-section d-block";
        }
    } else {
        Swal.fire({
            title: "Error!",
            text: "Por favor llenar todos los campos solicitados.",
            icon: "error",
            confirmButtonText: "Cerrar",
        });
        return;
    }

    return;
}

function enviarPermisoEdit() {
    if (idEdit != "") {
        this.opciones();

        let motivo = document.getElementById("motivoEdit").value;
        //console.log(tipoPermisoText)

        let y = document.getElementById("fechaInicioEdit").value;
        let ddi = y.substring(0, 2);
        let mmi = y.substring(3, 5);
        let yyi = y.substring(6, 10);

        let fechaInicio = yyi + "-" + mmi + "-" + ddi;

        let x = document.getElementById("fechaFinalEdit").value;
        let ddf = x.substring(0, 2);
        let mmf = x.substring(3, 5);
        let yyf = x.substring(6, 10);

        let fechaFinal = yyf + "-" + mmf + "-" + ddf;

     

        let tipoPermiso = document.getElementById("selectEdit").value;
        let option = document.getElementById("selectEdit");
        let tipoPermisoText = option.options[option.selectedIndex].text;

       

        if(tipoPermiso =="--Seleccione un tipo permiso--"){
            Swal.fire({
                title: "Error!",
                text: "Por favor seleccione un tipo de permiso.",
                icon: "error",
                confirmButtonText: "Cerrar",
            });
            return;
        }

       
           

        if (y && x && y == x) {
            let horaInicio = document.getElementById("horaFinalEdit").value;
            let horaFinal = document.getElementById("horaFinalEdit").value;
            fechaInicio = fechaInicio + " " + horaInicio;
            fechaFinal = fechaFinal + " " + horaFinal;

                            let fechasValidas = this.compararFecha(yyi, mmi, ddi, yyf, mmf, ddf);

                            if (!fechasValidas) {
                                Swal.fire({
                                    title: "Error!",
                                    text:
                                        "La fecha de finalizacion no puede ser menor que la fecha de inicio.",
                                    icon: "error",
                                    confirmButtonText: "Cerrar",
                                });
                        
                                return;   }         

           
                        if (tipoPermisoText && tipoPermiso &&  motivo &&  horaInicio &&   horaFinal  ) {
                            axios
                                .put("/editar/permiso", {
                                    unDia: 1,
                                    tipoPermisoTexto: tipoPermisoText,
                                    fechaInicio: fechaInicio,
                                    fechaFinal: fechaFinal,
                                    tipoPermiso: tipoPermiso,
                                    horaInicio: horaInicio,
                                    horaFinal: horaFinal,
                                    motivo: motivo,
                                    id: idEdit,
                                })
                                .then((response) => {
                                    console.log(response.data);
                                    document.getElementById("permisoEdit").reset();

                                    $("#edit_leave").modal("hide");

                                    document.getElementById("horasPermisosEdit").className =
                                        "d-none";
                                    document.getElementById("enviarEdit").className =
                                        "submit-section d-none";
                                    document.getElementById("enviarEdit").className =
                                        "submit-section d-block";
                                    $("#empleadoListado").DataTable().ajax.reload();

                                    Swal.fire({
                                        title: "Exito!",
                                        text: "Permiso editado con éxito.",
                                        icon: "success",
                                        confirmButtonText: "Cerrar",
                                    });
                                })
                                .catch((err) => {
                                    console.error(err.response.data.exception);
                                    Swal.fire({
                                        title: "Error!",
                                        text:
                                            "Ha ocurrido un error, por favor inténtelo nuevamente.",
                                        icon: "error",
                                        confirmButtonText: "Cerrar",
                                    });
                                });

                            return;
                        } else {
                            //todos los campos son requeridos
                            Swal.fire({
                                title: "Error!",
                                text: "Por favor llenar todos los campos solicitados.",
                                icon: "error",
                                confirmButtonText: "Cerrar",
                            });
                            return;
                        }
        } else if (y && x && y !== x) {

            let fechasValidas = this.compararFecha(yyi, mmi, ddi, yyf, mmf, ddf);

            if (!fechasValidas) {
                Swal.fire({
                    title: "Error!",
                    text:
                        "La fecha de finalizacion no puede ser menor que la fecha de inicio.",
                    icon: "error",
                    confirmButtonText: "Cerrar",
                });
        
                return;   } 


            if (tipoPermisoText && tipoPermiso && motivo) {
                axios
                    .put("/editar/permiso", {
                        unDia: 2,
                        tipoPermisoTexto: tipoPermisoText,
                        fechaInicio: fechaInicio,
                        fechaFinal: fechaFinal,
                        tipoPermiso: tipoPermiso,
                        motivo: motivo,
                        horaInicio: horaInicio,
                        horaFinal: horaFinal,
                        id: idEdit,
                    })
                    .then((response) => {
                        console.log(response.data);
                        document.getElementById("permisoEdit").reset();

                        $("#edit_leave").modal("hide");

                        document.getElementById("horasPermisosEdit").className =
                            "d-none";
                        document.getElementById("enviarEdit").className =
                            "submit-section d-none";
                        document.getElementById("enviarEdit").className =
                            "submit-section d-block";
                        $("#empleadoListado").DataTable().ajax.reload();
                        Swal.fire({
                            title: "Exito!",
                            text: "Permiso editado con éxito.",
                            icon: "success",
                            confirmButtonText: "Cerrar",
                        });
                    })
                    .catch((err) => {
                        console.error(err.response.data.exception);
                        Swal.fire({
                            title: "Error!",
                            text:
                                "Ha ocurrido un error, por favor inténtelo nuevamente.",
                            icon: "error",
                            confirmButtonText: "Cerrar",
                        });
                    });

                return;
            } else {
                //todos los campos son requeridos
                Swal.fire({
                    title: "Error!",
                    text: "Por favor llenar todos los campos solicitados.",
                    icon: "error",
                    confirmButtonText: "Cerrar",
                });
                return;
            }
        } else {
            Swal.fire({
                title: "Error!",
                text: "Por favor llenar todos los campos solicitados.",
                icon: "error",
                confirmButtonText: "Cerrar",
            });
            return;
        }

        //fin del primer if
    }
}

// comparar fecha

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
