window.addEventListener("load",function(){
 document.getElementById("verificadorR").addEventListener("click",function(e){
  e.preventDefault();
  var RFC = $("input[name=RFC]").val();
  var token = $("meta[name='csrf-token']").attr("content")

  function mostrarMensage(mensaje){
    $("#comprobacion").empty();
    $("#comprobacion").append("<p>"+mensaje+"</p>");
    $("#comprobacion").show(6000);
    $("#comprobacion").hide(5000);
  }

  $.ajax({
    type:'get',
    url:"/empleado/buscadorR",
    data: {
        _token:token,
        RFC:RFC,
    },
    success:function(data){
      if(data.mensaje != null){
        mostrarMensage(data.mensaje);  
      }else{
        alert(RFC+' No se encuentra registrado');
      }
      
    }
  })
 })
})