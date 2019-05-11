$(function(){
    $('[data-simulador]').on('click',editSimuladorModal);
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

