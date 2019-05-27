$(function(){
    $('#select-grado').on('change', onSelectGradoChange);
    $('#select-curso').on('change', onSelectCursoChange);
    $('#select-asignatura').on('change', onSelectAsignaturaChange);
});

var grado_val = 0;
var curso_val = 0;

//Cuando selecciono un grado cargo los cursos.
function onSelectGradoChange(){
    
    grado_val = $(this).val();
    
    $('#select-curso').html('<option value=""> Seleccione curso </option>');
    $('#select-grupo').html('<option value=""> Seleccione grupo </option>');
    $('#select-asignatura').html('<option value=""> Seleccione asignatura </option>');
    
    if(!grado_val){
        $('#select-curso').html('<option value=""> Seleccione curso </option>');
        return;
    }
    //Ajax
    $.get('/api/cursos/'+grado_val , function(data){
        var html_select = '<option value=""> Seleccione curso</option>';
        
        if(data.length < 1)
            html_select = '<option value=""> No hay datos habilitados para el grado</option>';
        else{
            for( var i=0; i<data.length; ++i)
                html_select += '<option value="'+ data[i].curso + '"> '+ data[i].curso + '</option>';
        }
        $('#select-curso').html(html_select);
    })
}
//Cuando selecciono un curso cargo las asignaturas
function onSelectCursoChange(){
    
    curso_val = $(this).val();
    
    $('#select-grupo').html('<option value=""> Seleccione grupo </option>');
    $('#select-asignatura').html('<option value=""> Seleccione asignatura </option>');
    
    if(!curso_val){
        $('#select-asignatura').html('<option value=""> Seleccione asignatura </option>');
        return;
    }
    
    //Ajax
    $.get('/api/asignaturas/'+grado_val + '/'+curso_val , function(data){
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
    $.get('/api/asignaturas/'+grado_val +'/'+curso_val+'/'+asignatura_val, function(data){
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