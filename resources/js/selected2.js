console.log('select2')

$(document).ready(function() {
    $('.profissional').select2({
        language: {
            inputTooShort: function() {
                return "Por favor, digite 1 ou mais caracteres";
            },
            noResults: function() {
                return "Nenhum resultado encontrado";
            }
        },
        allowClear: true,
        minimumInputLength: 1
    });
    
    // Definindo o estilo CSS diretamente
    $('.select2-selection--single').css({
        'height': '38px',
        'line-height': '38px'
    });
});

$(document).ready(function() {
    $('.cliente').select2({
        language: {
            inputTooShort: function() {
                return "Por favor, digite 1 ou mais caracteres";
            },
            noResults: function() {
                return "Nenhum resultado encontrado";
            }
        },
        allowClear: true,
        minimumInputLength: 1
    });
    
    // Definindo o estilo CSS diretamente
    $('.select2-selection--single').css({
        'height': '38px',
        'line-height': '38px'
    });
});