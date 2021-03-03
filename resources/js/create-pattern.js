$(function(){
    $('#mainCatIcons .btn').click(function() {
        $(this).closest('#mainCatIcons').find('.catActive').removeClass('catActive');
        $(this).addClass('catActive');
        let optionTypeBtn = this.value;
        let orderRecapFormsBlock = $('#orderRecapCategoryBlock, #orderRecapPatternIdentifier');
        if(optionTypeBtn === "Formes") {
            orderRecapFormsBlock.removeClass('d-none').addClass('d-flex');
            $(this).closest('#creationType').find('#formsBlock').removeClass('d-none');
            $(this).closest('#creationType').find('.textInput').addClass('d-none');
        }
        else {
            orderRecapFormsBlock.addClass('d-none').removeClass('d-flex');
            $(this).closest('#creationType').find('#formsBlock').addClass('d-none');
            $(this).closest('#creationType').find('.textInput').removeClass('d-none');
            $(this).closest('#creationType').find('#formsBlock .patternActive').removeClass('patternActive');
            $('.patternOrderRecap .orderRecapPatternIdentifier, .patternOrderRecap .orderRecapCategory').text(optionTypeBtn);
            $(this).closest('section.row.no-gutters').find('.patternOrderForm #pattern_identifier').val("Non choisi");
            $(this).closest('section.row.no-gutters').find('.patternOrderForm #category').val("Non choisi");
        }
        $(this).closest('#creationType').find('.textInput input, #formsBlock .formsTextInput input').val("");
        $(this).closest('section.row.no-gutters').find('.patternOrderForm #chocolate_text').val("Vide");
        $('.patternOrderRecap .orderRecapText').text("Vide");
        $(this).closest('section.row.no-gutters').find('.patternOrderForm #piece_type').val(optionTypeBtn);
        $('.patternOrderRecap .orderRecapPieceType').text(optionTypeBtn);
    });
})

$(function(){
    $('#creationColor .btn').click(function() {
        $(this).closest('#creationColor').find('.colorActive').removeClass('colorActive');
        $(this).addClass('colorActive');
        let optionColorBtn = this.value;
        $(this).closest('section.row.no-gutters').find('.patternOrderForm #chocolate_type').val(optionColorBtn);
        $('.patternOrderRecap .orderRecapType').text(optionColorBtn);
    });
})

$(function(){
    $('#creationWeight .btn').click(function() {
        $(this).closest('#creationWeight').find('.weightActive').removeClass('weightActive');
        $(this).addClass('weightActive');
        let optionWeightBtn = this.value;
        $(this).closest('section.row.no-gutters').find('.patternOrderForm #chocolate_weight').val(optionWeightBtn);
        $('.patternOrderRecap .orderRecapWeight').text(optionWeightBtn);
    });
})

$(function(){
    $('.textType .btn').click(function() {
        $(this).closest('.textType').find('.colorActive').removeClass('colorActive');
        $(this).addClass('colorActive');
        let optionTextTypeBtn = this.value;
        $(this).closest('section.row.no-gutters').find('.patternOrderForm #chocolate_text_type').val(optionTextTypeBtn);
        $('.patternOrderRecap .orderRecapTextType').text(optionTextTypeBtn);
    });
})

$(function(){
    $('#formsBlock .btn').click(function() {
        $(this).closest('#creationType').find('.patternActive').removeClass('patternActive');
        $(this).addClass('patternActive');
        let optionPatternBtn = this.value;
        let optionPatternCategory = $(this).closest('.categoryBlock').find('.h6').text();
        $(this).closest('section.row.no-gutters').find('.patternOrderForm #pattern_identifier').val(optionPatternBtn);
        $(this).closest('section.row.no-gutters').find('.patternOrderForm #category').val(optionPatternCategory);
        $('.patternOrderRecap .orderRecapPatternIdentifier').text(optionPatternBtn);
        $('.patternOrderRecap .orderRecapCategory').text(optionPatternCategory);
    });
})

$(function(){
    $('#creationName .form-control').bind('input', function() {
        let orderRecapName = $('.patternOrderRecap .orderRecapName');
        let orderNameFormInput = $(this).closest('section.row.no-gutters').find('.patternOrderForm #pattern_name');
        orderNameFormInput.val(this.value);
        orderRecapName.text(this.value);
        if (!this.value) {
            orderRecapName.text("Modèle personnalisé");
            orderNameFormInput.val("Modèle personnalisé");
        }
    });
})

$(function(){
    $('#creationDescription .form-control').bind('input', function() {
        let orderRecapDesc = $('.patternOrderRecap .orderRecapDescription');
        let orderDescFormInput = $(this).closest('section.row.no-gutters').find('.patternOrderForm #pattern_description');
        orderDescFormInput.val(this.value);
        orderRecapDesc.text(this.value);
        if (!this.value) {
            orderRecapDesc.text("Description de base");
            orderDescFormInput.val("Description de base");
        }
    });
})

$(function(){
    $('.textInput .form-control, .formsTextInput .form-control').bind('input', function() {
        let orderRecapText = $('.patternOrderRecap .orderRecapText');
        let orderTextFormInput = $(this).closest('section.row.no-gutters').find('.patternOrderForm #chocolate_text');
        orderTextFormInput.val(this.value);
        orderRecapText.text(this.value);
        $(this).closest('section.row.no-gutters').find('.patternOrderForm .btn').removeAttr('disabled');
        if (!this.value) {
            orderRecapText.text("Vide");
            orderTextFormInput.val("Vide");
        }
    });
})

