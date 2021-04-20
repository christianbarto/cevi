function detalleTitulo(){

      var titulo = document.getElementById("titulo");
      var select = document.getElementById("detalle");
      var fragment = document.createDocumentFragment();
      

      function vacaciones(){
        for (let i = select.options.length; i >= 0; i--) {
          select.remove(i);
        }
        var selectItem = document.createElement('OPTION');
        selectItem.setAttribute('value','Primer Periodo');
        selectItem.textContent = 'Primer Periodo';
        fragment.appendChild(selectItem);
        select.appendChild(fragment);
        var selectItem2 = document.createElement('OPTION');
        selectItem2.setAttribute('value','Segundo Periodo');
        selectItem2.textContent = 'Segundo Periodo';
        fragment.appendChild(selectItem2);
        select.appendChild(fragment);
      }

      function ausencia(){
        for (let i = select.options.length; i >= 0; i--) {
          select.remove(i);
        }
        var selectItem = document.createElement('OPTION');
        selectItem.setAttribute('value','Maternidad');
        selectItem.textContent = 'Maternidad';
        fragment.appendChild(selectItem);

        var selectItem2 = document.createElement('OPTION');
        selectItem2.setAttribute('value','Incapacidad');
        selectItem2.textContent = 'Incapacidad';
        fragment.appendChild(selectItem2);
        
        select.appendChild(fragment); 
      }

      function permiso(){
        for (let i = select.options.length; i >= 0; i--) {
          select.remove(i);
        }
        var selectItem = document.createElement('OPTION');
        selectItem.setAttribute('value','Permiso economico');
        selectItem.textContent = 'Permiso economico';
        fragment.appendChild(selectItem);

        var selectItem2 = document.createElement('OPTION');
        selectItem2.setAttribute('value','Licencia sin goce de sueldo');
        selectItem2.textContent = 'Licencia sin goce de sueldo';
        fragment.appendChild(selectItem2);

        var selectItem3 = document.createElement('OPTION');
        selectItem3.setAttribute('value','Licencia con goce de sueldo');
        selectItem3.textContent = 'Licencia con goce de sueldo';
        fragment.appendChild(selectItem3);

        select.appendChild(fragment);
      }
      function carrera(){
        for (let i = select.options.length; i >= 0; i--) {
          select.remove(i);
        }
        var selectItem = document.createElement('OPTION');
        selectItem.setAttribute('value','Curso');
        selectItem.textContent = 'Curso';
        fragment.appendChild(selectItem);

        var selectItem2 = document.createElement('OPTION');
        selectItem2.setAttribute('value','Titulación');
        selectItem2.textContent = 'Titulacion';
        fragment.appendChild(selectItem2);

        var selectItem3 = document.createElement('OPTION');
        selectItem3.setAttribute('value','Junta proyección laboral');
        selectItem3.textContent = 'Junta proyección laboral';
        fragment.appendChild(selectItem3);

        select.appendChild(fragment);
      }

      function limpiar(){
        for (let i = select.options.length; i >= 0; i--) {
          select.remove(i);
        }
      }


      if(titulo.value=='Vacaciones'){
        vacaciones();
      }
      if(titulo.value=='Ausencia'){
        ausencia();
      }
      if(titulo.value=='Permiso'){
        permiso();
      }
      if(titulo.value=='Plan de carrera'){
        carrera();
      }
      if(titulo.value==''){
        limpiar();
      }
      console.log(select.value);
    }