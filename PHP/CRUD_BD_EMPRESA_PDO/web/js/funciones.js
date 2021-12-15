/**
 * Funciones auxiliares de javascripts 
 */
function confirmarBorrar(nProducto){
  if (confirm("¿Quieres eliminar el producto:  "+nProducto+"?"))
  {
   document.location.href="?orden=Borrar&id="+nProducto;
  }
}