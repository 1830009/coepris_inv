
function eliminar(id,nombre){
    if(window.confirm('Desea Elminar este Usuario '+nombre+'?\nPresione SI para Confirmar')){
        window.location.href='Usuarios.php?x='+id;
    }else{
        window.location.href='Usuarios.php';
    }
}

function ejemplo(id){
    window.alert('hola '+id);
}