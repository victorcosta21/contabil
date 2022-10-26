$(document).ready(function($){
    $('.mask_date').mask('00/00/0000');
    $('.mask_time').mask('00:00:00');
    $('.mask_date_time').mask('00/00/0000 00:00:00');
    $('.mask_cep').mask('00000-000');
    $('.mask_phone').mask('(00)00000-0000');
    $('.mask_phone_with_ddd').mask('(00)0000-0000');
    $('.mask_cellphone_with_ddd').mask('(00)00000-0000');
    $('.mask_hone_us').mask('(000)000-0000');
    $('.mask_number').mask('00000');
    $('.mask_mixed').mask('AAA 000-S0S');
    $('.mask_cpf').mask('000.000.000-00', { reverse: true });
    $('.mask_money').mask('000.000,00', { reverse: true });
    $('.mask_cnpj').mask('00.000.000/0000-00', { reverse: true });
    $('.money-mask-tariff').mask('00.000,00', {reverse: true});
    $('.money-mask').mask('0.000.000.000.000,00', {reverse: true});
    $('.mask_limit').mask('XXXXXXXXXXXXXXX' + '...', {translation: {'X': {pattern: /[0-9A-Za-z/\W|_/]/, optional: true}}});
});

var options = {
    onKeyPress: function (cpf, ev, el, op) {
        var masks = ['000.000.000-000', '00.000.000/0000-00'];
        $('#document').mask((cpf.length > 14) ? masks[1] : masks[0], op);
    }
}
$('#document').length > 11 ? $('#document').mask('00.000.000/0000-00', options) : $('#document').mask('000.000.000-00#', options);

/* VIA CEP */
$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
    }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});

