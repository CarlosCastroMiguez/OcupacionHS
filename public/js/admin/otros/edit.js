$(function(){
    $('[data-simulador]').on('click',editSimuladorModal);
    $('[data-tiposala]').on('click',editTipoSalaModal);
});

function editSimuladorModal(){
    //id
    var simulador_id = $(this).data('simulador');
    $('#simulador_id').val(simulador_id);
    //name
    var simulador_name = $(this).parent().prev().text();
    $('#simulador_name').val(simulador_name);
    //show
    $('#modalEditSimulador').modal('show');
}

function editTipoSalaModal(){
    //id
    var tiposala_id = $(this).data('tiposala');
    $('#tiposala_id').val(tiposala_id);
    //name
    var tiposala_name = $(this).parent().prev().text();
    $('#tiposala_name').val(tiposala_name);
    //show
    $('#modalEditTipoSala').modal('show');
}

