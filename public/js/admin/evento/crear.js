$(function(){
    $('#select-grado').on('change', onSelectGradoChange);
    $('#select-asignatura').on('change', onSelectAsignaturaChange);
    //$('#select-grupo').on('change', onSelectGrupoChange);
});

var grado_val = 0;

//Cuando selecciono un grado cargo las asignaturas.
function onSelectGradoChange(){
    
    grado_val = $(this).val();
    
    $('#select-grupo').html('<option value=""> Seleccione grupo </option>');
    
    if(!grado_val){
        $('#select-asignatura').html('<option value=""> Seleccione asignatura </option>');
        return;
    }
    //Ajax
    $.get('/api/asignaturas/'+grado_val , function(data){
        var html_select = '<option value=""> Seleccione asignatura</option>';
        for( var i=0; i<data.length; ++i)
            html_select += '<option value="'+ data[i].nombre + '"> '+ data[i].nombre + '</option>';
        
        $('#select-asignatura').html(html_select);
    })
}
//Cuando selecciono una asignatura cargo los grupos
function onSelectAsignaturaChange(){
    
    var asignatura_val = $(this).val();
    
    if(!asignatura_val){
        $('#select-grupo').html('<option value=""> Seleccione grupo </option>');
        return;
    }
    //Ajax
    $.get('/api/asignaturas/'+grado_val +'/'+asignatura_val, function(data){
        var html_select = '<option value=""> Seleccione grupo</option>';
        for( var i=0; i<data.length; ++i)
            html_select += '<option value="'+ data[i].grupo + '"> '+ data[i].grupo + '</option>';
        
        $('#select-grupo').html(html_select);
    })
    
}

/*
//modifico el valor de mi campo hidden paraa agregarle el valor del id de la asignatura.
function onSelectGrupoChange(){
    
    var grupo_val = $(this).val();
    
    if(!grupo_val){
        $('#select-grupo').html('<option value=""> Seleccione grupo </option>');
        return;
    }
    //Ajax
    $.get('/api/id/'+grado_val +'/'+asignatura_val +'/'+ grupo_val, function(data){
        
        var id_asig = document.getElementById('id_asignatura').value = data[0].id;
        
        $('#id_asignatura').html(id_asig);
    })
    
}
*/