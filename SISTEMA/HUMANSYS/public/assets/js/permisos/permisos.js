$(document).ready(opciones);

function opciones() {
    //  var opciones = document.getElementById('permisosEmpleado').innerHTML=`
    //  <option>Casual Leave 12 Days</option>
    //  <option>Prueba de inner</option>

    //  `

    axios
        .get("/listado/permisos")
        .then((response) => {
            //console.log(response.data)

            let lista = "";
            response.data.tipos.forEach((element) => {
                lista =
                    lista +
                    `<option value="${element.id}">${element.permiso}</option>`;
            });

            document.getElementById("permisosEmpleado").innerHTML = lista;
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

        if (fechaFinal == fechaInicio) {
            document.getElementById("horasPermisos").className = "d-block";
        } else {
            document.getElementById("horasPermisos").className = "d-none";
        }

    let horaInicio = document.getElementById("horaInicial").value;
    let horaFinal = document.getElementById("horaFinal").value;

                if (fechaFinal == fechaInicio) {
                    
                            if (horaInicio && horaFinal) {

                                    axios.post("/permiso/empleado/guardar", {
                                        unDia:1,
                                        tipoPermisoTexto: tipoPermisoText,
                                        fechaInicio: fechaInicio,
                                        fechaFinal: fechaFinal,
                                        tipoPermiso: tipoPermiso,
                                        horaInicio: horaInicio,
                                        horaFinal: horaFinal,
                                       
                                    }).then( response => {
                                        console.log(response.data)
                                    }).catch( err =>{
                                        console.error(err.response.data.exception);
                                    })

                            } else {
                                    console.log("horafinal y hora inicial son requeridas")
                            }
                } else {

                    axios.post("/permiso/empleado/guardar", {
                        unDia:2,
                        tipoPermisoTexto: tipoPermisoText,
                        fechaInicio: fechaInicio,
                        fechaFinal: fechaFinal,
                        tipoPermiso: tipoPermiso,
                        
                       
                    }).then( response => {
                        console.log(response.data)
                    }).catch( err =>{
                        console.error(err.response.data.exception);
                    })


                }

   

    return;
}
