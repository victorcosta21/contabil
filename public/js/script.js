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

$("#document").keydown(function(){
    try {
        $("#document").unmask();
    } catch (e) {}

    var tamanho = $("#document").val().length;

    if(tamanho < 11){
        $("#document").mask("999.999.999-99");
    } else {
        $("#document").mask("99.999.999/9999-99");
    }

    // ajustando foco
    var elem = this;
    setTimeout(function(){
        // mudo a posição do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    // reaplico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});