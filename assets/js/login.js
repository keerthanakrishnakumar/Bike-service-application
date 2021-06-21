$(".js-remember--check").click(function (e) {
            e.preventDefault();
            $(".js-check-box-in").toggleClass("active");
        });


$('.js-input').on('focusout', function (e) {
    // e.preventDefault();
    if(!$(this).val()=="" || !$(this).val()==" ") {
        $(this).parents('.js-input__content').find('.js-input-placeholder').addClass('active');
    } else {
        $(this).parents('.js-input__content').find('.js-input-placeholder').removeClass('active');
    }
}).each(function (i, item) {
    $(this).on('focusout', function (e) {
        if($(this).val()=="" || $(this).val()==" ") {
            // $(this).parents('.contact-form__item').find('.error-message').show()
            // $(this).addClass('error')
            $(this).parents('.js-input__content').addClass('has-error').find('.js-input-error').addClass('active');
        } else {
            $(this).parents('.js-input__content').removeClass('has-error').find('.js-input-error').removeClass('active');
        }
    })
}).on('change keyup', function (e) {
    e.preventDefault();
    $(this).parents('.js-input__content').removeClass('has-error').find('.js-input-error').removeClass('active');
});

$('.js-form').on('submit', function (e) {
    e.preventDefault();

    var input = $(this).find('.js-input'),
        inputVal = input.val(),
        count = input.length,
        validCount = 0;

    input.each(function (e) {
        if($(this).val()=="" || $(this).val()==" ") {
            $(this).parents('.js-input__content').addClass('has-error').find('.js-input-error').addClass('active');
        }
        else (
            validCount++
        );

        return validCount
    });

    console.log(validCount);



    if(validCount==count) {
        console.log('succes');

        if($(this).hasClass('js-call-form')) {

            $('.call-form__wrp').addClass('form-send')

        } else if($('#formResult').length)  {
            $('.js-modal-target').hide();
            $('.js-modal-target#formResult').show();
            $('.js-overlay').addClass('active');
            $('.js-modal').fadeIn().addClass('active');
        }

        input.val('');
        $('.js-input-placeholder').removeClass('active');

        return true
        // return false
    }
    else {
        console.log('form error');
        return false
    }
});

$('.call-form-result').click(function (e) {
    e.preventDefault();
    $('.call-form__wrp').removeClass('form-send')
});

$('.js-hide-element').click(function (e) {
    e.preventDefault();
    var target = $(this).data('target');

    $('#'+target).addClass('element-hide');

    setTimeout(function() {
        $('#'+target).slideUp();
    }, 50);


});