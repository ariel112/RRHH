

function ejecutarPlanilla(){
    axios.get("/planilla/crear")
    
    .then(
        (response => {
            console.log(response)
        })
    ).catch( err => {
            console.log(err)
    })
}