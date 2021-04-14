window.addEventListener("load",function(){
 document.getElementById("verificador").addEventListener("click",function(e){
  e.preventDefault();
  var nombre = $("input[name=nombre]").val();
  var ap_paterno = $("input[name=ap_paterno]").val();
  var ap_materno = $("input[name=ap_materno]").val();
  var token = $("meta[name='csrf-token']").attr("content")

  function mostrarMensage(mensaje){
    $("#comprobacion").empty();
    $("#comprobacion").append("<p>"+mensaje+"</p>");
    $("#comprobacion").show(6000);
    $("#comprobacion").hide(5000);
  }

  $.ajax({
    type:'get',
    url:"/empleado/buscador",
    data: {
        _token:token,
        nombre: nombre,
        ap_paterno : ap_paterno,
        ap_materno : ap_materno,
    },
    success:function(data){
      if(data.mensaje != null){
        mostrarMensage(data.mensaje);  
      }else{
        alert(nombre+' '+ap_paterno+' '+ap_materno+' No se encuentra registrado');
      }
      
    }
  })
 })
})