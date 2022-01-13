$(document).ready(function () {


    $(document).on('keyup', '#year', function () {


        var year = $(this).val();

        var date = new Date().getFullYear()
        $('#age').val(date - year);

        var fina = date - year;
        $('#age_text').empty().append("age(" + fina + ")");

    });

    $(document).on('click', '.fa-chevron-down', function () {

        var id = $(this).attr('id');

        $(".div_show" + id).toggleClass('show');
    });


    $(".gender").click(function () {

        $(this).css('background-color', '#2A2C7F');
        $(this).css('color', 'white');

        $('.gender').not(this).css('color', '#2A2C7F');
        $('.gender').not(this).css('background-color', 'white');

        $('#gender').val($(this).attr('data'));
    });


    $("#get_quote_fex").click(function () {


        var check = true;
        var message = '';


        if ($('#face_amount1').val() == null || $('#face_amount1').val() == '') {

            check = false;
            message = 'Please Enter Face Amount'
        }
        if (check == false) {
            $('.toast-body').empty();
            $('.toast-body').text(message);

            $('.toast').toast({

                delay: 3000
            });

            $('.toast').toast('show');
        }


        if (check == true) {
            $('#get_quote_fex').prop('disabled', true);
            var formData = new FormData((document.getElementById('form1')));


            $.ajax({
                type: 'POST',
                url: "/user/get_quote_fex",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,

                success: function (response) {
                    $('#get_quote_fex').prop('disabled', false);
                    $('.result').empty().append(response);
                }
            });
        }

    });

    $(".condition").keyup(function () {

        var condition = $(this).val();

        $.ajax({
            type: 'get',
            url: "/user/get_condition_fex",
            data: {'condition': condition},


            success: function (response) {
                $('.condition_result').empty().append(response);
            }
        });


    });

    $(document).on('click', '.con_data', function () {

        var id = $(this).attr('id');


        $('.condition_result').empty();
        $('.condition').val('');


        $.ajax({
            type: 'get',
            url: "/user/get_condition_qa_fex",
            data: {'id': id},


            success: function (response) {
                $('.condition_qa_result').append(response);
            }
        });


    });

    $(document).on('click', '#next_ques', function () {

        var total = $(this).attr('total');
        var current = parseInt($(this).attr('current'));
        var rand = $(this).attr('rand');
        var i = 1;
        var nextindex = 1;
        var condition = true;
        if (current != total) {

            $('.all_ques_'+rand).hide();

            if ($('.current_ques_'+rand+'_' + (current + 1)).hasClass('childques'+rand+'')) {
                if ($('.current_ques_'+rand+'_' + (current + 1)).attr('parentanswer') == $('.current_ques_'+rand+'_' + (current)).attr('answer')) {
                    condition = false;
                    alert(condition);
                } else {
                    $('.childques'+rand).remove();
                    questionIndexing(rand);
                }
            }
            if (condition == true) {
                if ($('.current_ques_'+rand+'_' + (current)).hasClass('yesnoques')) {

                    if ($('.current_ques_'+rand+'_' + (current)).attr('ifyes') != 0 && $('.current_ques_'+rand+'_' + (current)).attr('answer') == 'yes') {

                        var id = $('.current_ques_'+rand+'_' + (current)).attr('ifyes');
                        $.ajax({
                            type: 'get',
                            url: "/user/get_condition_qa_fex_next",
                            data: {'id': id, 'answer': 'yes','rand':rand},
                            async: false,

                            success: function (response) {
                                //$(response).insertAfter('.current_ques_'+(current));
                                $('.current_ques_'+rand+'_' + (current)).after(response);
                                questionIndexing(rand);
                                //  $().next_in().append(response);
                            }
                        });

                    } else if ($('.current_ques_'+rand+'_' + (current)).attr('ifno') != 0 && $('.current_ques_'+rand+'_' + (current)).attr('answer') == 'no') {
                        var id = $('.current_ques_'+rand+'_' + (current)).attr('ifno');
                        $.ajax({
                            type: 'get',
                            url: "/user/get_condition_qa_fex_next",
                            data: {'id': id, 'answer': 'no','rand':rand},
                            async: false,


                            success: function (response) {
                                //$(response).insertAfter('.current_ques_'+(current));
                             $('.current_ques_'+rand+'_' + (current)).after(response);

                             questionIndexing(rand);
                                //  $().next_in().append(response);
                            }
                        });
                    } else {
                        nextindex = 1;
                    }

                }

            }


            $('.current_ques_'+rand+'_' + (current + nextindex)).show();
            $('.current_ques_'+rand+'_' + (current + nextindex)).attr('jump', nextindex);
            $(this).attr('current', current + nextindex);
            $('.back_ques' + rand).attr('current', current + nextindex);
            $('.start_status' + rand).empty().append(current + nextindex);


            $(this).attr('value', 'NEXT');
            if(current + nextindex == total) {
                $(this).attr('value', 'FINISHED')
            }


        }


    });

    function questionIndexing(rand) {
var rand=rand;
var i=0;
        $('.all_ques_'+rand).each(function (key, value) {

            var index = $(this).attr('i');
            $(this).removeClass('current_ques_'+rand+'_' + index + '');
            $(this).addClass('current_ques_'+rand+'_' + (key + 1) + '');
            $(this).attr('i', (key + 1));

            if($(this).hasClass('yesnoques'))
            {
                $(this).find('.selection').attr('i',(key + 1));
            }
            ++i;
        });

        $('.next_ques'+rand).attr('total', i);
        $('.back_ques' + rand).attr('total', i);
        $('.end_status' + rand).empty().append(i);


    }


    $(document).on('click', '#back_ques', function () {

        var total = $(this).attr('total');
        var current = parseInt($(this).attr('current'));
        var rand = $(this).attr('rand');
        var nextindex = 1;
        if (current != 1) {

            $('.all_ques_'+rand).hide();


            $('.current_ques_'+rand+'_' + (current - nextindex)).show();
            $(this).attr('current', current - nextindex);
            $('.next_ques' + rand).attr('current', current - nextindex);
            $('.start_status' + rand).empty().append(current - nextindex);
            $('.next_ques' + rand).attr('value', 'NEXT');


        }

    });

    $(document).on('click', '.con_remove', function () {

        var id = $(this).attr('id_data');
        $('#con_div_' + id).remove();

    });


    $(document).on('click', '.con_edit', function () {

        var id = $(this).attr('id_data');
        var status = $(this).attr('status');

        if (status == 'show') {
            $('#con_div_' + id).children('div:nth-child(2)').hide();
            $(this).attr('status', 'hide');
        } else {
            $('#con_div_' + id).children('div:nth-child(2)').show();
            $(this).attr('status', 'show');
        }

    });

    $(document).on('click', '.selection', function () {
        var next_ques = $(this).attr('next_ques');


        $(this).css('background-color', '#2A2C7F');
        $(this).css('color', 'white');
        var id = $(this).attr('data_id');
        var data = $(this).attr('data');
        var index = $(this).attr('i');
        var rand = $(this).attr('rand');

        $('.selection_'+rand+'_' + id).not(this).css('color', '#2A2C7F');
        $('.selection_'+rand+'_' + id).not(this).css('background-color', 'white');

        $('.current_ques_'+rand+'_' + index).attr('answer', data);


    });

});
