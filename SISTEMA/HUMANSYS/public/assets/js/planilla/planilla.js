

function ejecutarPlanilla(){
    axios.get("/planilla/crear")
    
    .then(
        (response => {
            console.log(response.data.empleado)
        })
    ).catch( err => {
            console.log(err)
    })
}