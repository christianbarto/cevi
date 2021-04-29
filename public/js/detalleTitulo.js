function detalleTitulo(){

      var titulo = document.getElementById("titulo");
      var select = document.getElementById("detalle");
      var fragment = document.createDocumentFragment();
      

      function vacaciones(){
        for (let i = select.options.length; i >= 0; i--) {
          select.remove(i);
        }
        var selectItem = document.createElement('OPTION');
        selectItem.setAttribute('value','PRIMER PERIODO');
        selectItem.textContent = 'PRIMER PERIODO';
        fragment.appendChild(selectItem);
        select.appendChild(fragment);
        var selectItem2 = document.createElement('OPTION');
        selectItem2.setAttribute('value','SEGUNDO PERIODO');
        selectItem2.textContent = 'SEGUNDO PERIODO';
        fragment.appendChild(selectItem2);
        select.appendChild(fragment);
      }

      function ausencia(){
        for (let i = select.options.length; i >= 0; i--) {
          select.remove(i);
        }
        var selectItem = document.createElement('OPTION');
        selectItem.setAttribute('value','MATERNIDAD');
        selectItem.textContent = 'MATERNIDAD';
        fragment.appendChild(selectItem);

        var selectItem2 = document.createElement('OPTION');
        selectItem2.setAttribute('value','INCAPACIDAD');
        selectItem2.textContent = 'INCAPACIDAD';
        fragment.appendChild(selectItem2);
        
        select.appendChild(fragment); 
      }

      function permiso(){
        for (let i = select.options.length; i >= 0; i--) {
          select.remove(i);
        }
        var selectItem = document.createElement('OPTION');
        selectItem.setAttribute('value','PERMISO ECONOMICO');
        selectItem.textContent = 'PERMISO ECONOMICO';
        fragment.appendChild(selectItem);

        var selectItem2 = document.createElement('OPTION');
        selectItem2.setAttribute('value','LICENCIA SIN GOCE DE SUELDO');
        selectItem2.textContent = 'LICENCIA SIN GOCE DE SUELDO';
        fragment.appendChild(selectItem2);

        var selectItem3 = document.createElement('OPTION');
        selectItem3.setAttribute('value','LICENCIA CON GOCE DE SUELDO');
        selectItem3.textContent = 'LICENCIA CON GOCE DE SUELDO';
        fragment.appendChild(selectItem3);

        select.appendChild(fragment);
      }
      function carrera(){
        for (let i = select.options.length; i >= 0; i--) {
          select.remove(i);
        }
        var selectItem = document.createElement('OPTION');
        selectItem.setAttribute('value','CURSO');
        selectItem.textContent = 'CURSO';
        fragment.appendChild(selectItem);

        var selectItem2 = document.createElement('OPTION');
        selectItem2.setAttribute('value','TITULACION');
        selectItem2.textContent = 'TITULACION';
        fragment.appendChild(selectItem2);

        var selectItem3 = document.createElement('OPTION');
        selectItem3.setAttribute('value','JUNTA DE PROYECCION LABORAL');
        selectItem3.textContent = 'JUNTA DE PROYECCION LABORAL';
        fragment.appendChild(selectItem3);

        select.appendChild(fragment);
      }

      function limpiar(){
        for (let i = select.options.length; i >= 0; i--) {
          select.remove(i);
        }
      }


      if(titulo.value=='VACACIONES'){
        vacaciones();
      }
      if(titulo.value=='AUSENCIA'){
        ausencia();
      }
      if(titulo.value=='PERMISO'){
        permiso();
      }
      if(titulo.value=='PLAN DE CARRERA'){
        carrera();
      }
      if(titulo.value==''){
        limpiar();
      }
      console.log(select.value);
    }