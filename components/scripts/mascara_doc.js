$(function(){

    $('.cpf_cnpj').blur(function(){
    
        // O CPF ou CNPJ
        var cpf_cnpj = $(this).val();
        
        if ( formata_cpf_cnpj( cpf_cnpj ) ) {
            $(this).val( formata_cpf_cnpj( cpf_cnpj ) );
        } else {
            alert('CPF ou CNPJ inválido!');
        }
        
    });

});