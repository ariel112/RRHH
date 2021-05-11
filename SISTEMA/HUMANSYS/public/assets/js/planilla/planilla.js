

function ejecutarPlanilla(){

   let nombre = document.getElementById('namePlanilla').value;
   let fechaInicio = document.getElementById('fechaInicioPlanilla').value;
   let fechaFin = document.getElementById('fechaFinalPlanilla').value;

   var radios = document.getElementById('radios1').checked;

   console.log(radios)

   if(!nombre){
    Swal.fire({
        title: "Error!",
        text: "El campo nombre es obligatorio.",
        icon: "error",
        confirmButtonText: "Cerrar",
    });
    return;
   }

   if(!fechaInicio){
    Swal.fire({
        title: "Error!",
        text: "El campo fecha de inicio es obligatorio.",
        icon: "error",
        confirmButtonText: "Cerrar",
    });
    return;
   }

   if(!fechaFin){
    Swal.fire({
        title: "Error!",
        text: "El campo fecha final es obligatorio.",
        icon: "error",
        confirmButtonText: "Cerrar",
    });
    return;
   }

   if(fechaInicio == fechaFin){
    Swal.fire({
        title: "Error!",
        text: "Las fechas de inicio y final no pueden ser iguales.",
        icon: "error",
        confirmButtonText: "Cerrar",
    });
    return;
   }

   fi= new Date(fechaInicio);
   ff = new Date(fechaFin);

   if(ff<fi){
    Swal.fire({
        title: "Error!",
        text: "La fecha final no puede ser menor a la fecha inicial.",
        icon: "error",
        confirmButtonText: "Cerrar",
    });
    return;
   }

 

    axios.post("/planilla/crear",{
        nombre:nombre,
        fechaInicio:fechaInicio,
        fechaFin:fechaFin
    })
    
    .then(
        (response => {
            //console.log(response.data.message)
            let mensaje = response.data.message;

            Swal.fire({
                title: "Exito!",
                text: mensaje,
                icon: "success",
                confirmButtonText: "Cerrar",
            });
        })
    ).catch( err => {
            console.log(err.response.data.message)
            Swal.fire({
                title: "Error!",
                text: "Ha ocurrido un error, intente de nuevo.",
                icon: "error",
                confirmButtonText: "Cerrar",
            });
    })
}


