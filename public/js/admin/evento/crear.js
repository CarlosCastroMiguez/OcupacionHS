$(function(){
    $('#select-grado').on('change', onSelectGradoChange);
    $('#select-asignatura').on('change', onSelectAsignaturaChange);
});

var grado_val = 0;

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