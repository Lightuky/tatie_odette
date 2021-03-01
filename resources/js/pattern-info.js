$(function(){
    $('.patternOptionTypeBtn').click(function() {
        $(this).closest('.row').find('.patternOptionsActive').removeClass('patternOptionsActive');
        $(this).addClass('patternOptionsActive');
        let optionTypeBtn = $(this).text();
        $(this).closest('#patternInfoBlock').find('.patternOrderForm #chocolate_type').val(optionTypeBtn);
        $('.patternOrderRecap .orderRecapType').text(optionTypeBtn);
    });
})

$(function(){
    $('.patternOptionWeightBtn').click(function() {
        $(this).closest('.row').find('.patternOptionsActive').removeClass('patternOptionsActive');
        $(this).addClass('patternOptionsActive');
        let optionWeightBtn = $(this).text();
        $(this).closest('#patternInfoBlock').find('.patternOrderForm #chocolate_weight').val(optionWeightBtn);
        $('.patternOrderRecap .orderRecapWeight').text(optionWeightBtn);
    });
})

$(function(){
    $('.patternOptionTextBtn').click(function() {
        $(this).closest('.row').find('.patternOptionsActive').removeClass('patternOptionsActive');
        $(this).addClass('patternOptionsActive');
        let optionTextBtn = $(this).text();
        $(this).closest('#patternInfoBlock').find('.patternOrderForm #chocolate_text').val(optionTextBtn);
        $(this).closest('.patternOrderOptionsCol').find('.patternOptionTextInput input').val("");
        $('.patternOrderRecap .orderRecapText').text(optionTextBtn);
    });
})

$(function(){
    $('.patternOptionTextInput').click(function() {
        $(this).closest('.row').find('.patternOptionsActive').removeClass('patternOptionsActive');
        $(this).addClass('patternOptionsActive');
    });
})

$(function(){
    $('.patternOptionTextInput').children().bind('input', function() {
        $(this).closest('#patternInfoBlock').find('.patternOrderForm #chocolate_text').val(this.value);
        $('.patternOrderRecap .orderRecapText').text(this.value);
    });
})

$(function(){
    $('#patternOptionType, #patternOptionWeight, #patternOptionText').click(function() {
        $(this).closest('.patternOrderOptionsCol').find(".row").toggleClass('d-none');
    });
})
