


function ejecutarPlanilla(){

   let nombre = document.getElementById('namePlanilla').value;
   let fechaInicio = document.getElementById('fechaInicioPlanilla').value;
   let fechaFin = document.getElementById('fechaFinalPlanilla').value;

   var radios = document.getElementById('radios1').checked;

   console.log(radios,"radio")

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

 
   console.log(nombre)
    /*axios.get("/planilla/crear",
        {
        nombre:nombre,
        fechaInicio:fechaInicio,
        fechaFin:fechaFin
    })*/

    if(radios){
        urlPlanilla='/planilla/crear'
    }else{
        urlPlanilla="/planilla/crear/sinDeducciones"
    }
 
    axios({
        url: urlPlanilla,
        method: 'POST',
        responseType: 'blob', // important 
        data: {
            nombre:nombre,
            fechaInicio:fechaInicio,
            fechaFin:fechaFin
        }
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

            if(response.data.icon == "error"){
                return;
            }
            const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'planilla.xlsx'); //or any other extension
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


