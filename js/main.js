// Submeter formulario
$(document).ready(function () {
    $('#calcFesta').submit(function() {
        var dados = $('#calcFesta').serialize(); 
        $.ajax({
            type : 'POST',
            url  : 'php/dadosFesta.php',
            data : dados,
            dataType: 'json',
            success :  function(response){
                alert("Dados enviado!");
            },
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
        });
        return false;
    });
});

// Botão de bebidas
$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})