addEventListener('DOMContentLoaded',async(e)=>{
    let conexion = await fetch("http://localhost/ApolT01-003/PRUEBA-DB-INCENTIVO/uploads/campers");
    let data = await conexion.json();
    console.log(data);

});