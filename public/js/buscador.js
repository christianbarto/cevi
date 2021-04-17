function verificador(){
  var nombre = $("input[name=nombre]").val();
  var ap_paterno = $("input[name=ap_paterno]").val();
  var ap_materno = $("input[name=ap_materno]").val();
  var RFC = $("input[name=RFC]").val();
  var token = $("meta[name='csrf-token']").attr("content")
  function mostrarMensage(mensaje){
    $("#comprobacion").empty();
    $("#comprobacion").append("<p class='alert alert-danger'>"+mensaje+"</p>");
    $("#comprobacion").show(6000);
    //$("#comprobacion").hide(5000);
  }
  function mostrarMensageOk(mensaje){
    $("#comprobacion").empty();
    $("#comprobacion").append("<p class='alert alert-success'>"+mensaje+"</p>");
    $("#comprobacion").show(6000);
    //$("#comprobacion").hide(5000);
  }
  function mostrarMensage2(mensaje){
    $("#comprobacion2").empty();
    $("#comprobacion2").append("<p class='alert alert-danger'>"+mensaje+"</p>");
    $("#comprobacion2").show(6000);
    //$("#comprobacion").hide(5000);
  }
  function mostrarMensage2Ok(mensaje){
    $("#comprobacion2").empty();
    $("#comprobacion2").append("<p class='alert alert-success'>"+mensaje+"</p>");
    $("#comprobacion2").show(6000);
    //$("#comprobacion").hide(5000);
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
          mostrarMensageOk('Empleado no registrado');
      }
      
    }
  })

  $.ajax({
    type:'get',
    url:"/empleado/buscadorR",
    data: {
        _token:token,
        RFC:RFC,
    },
    success:function(data){
      if(data.mensaje != null){
        mostrarMensage2(data.mensaje);  
      }else{
        mostrarMensage2Ok('RFC no registrado');
      }
      
    }
  })
}