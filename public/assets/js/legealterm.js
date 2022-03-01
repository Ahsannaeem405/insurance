$(document).ready(function () {

    var baseurl = '';


    $("#offense").change(function(){
      var id=$(this).val();
        var res=offenseCheck(id);
        if(res==true) {
            $.ajax({
                type: 'get',
                url: "" + baseurl + "/user/get_condition_qa_lterm",
                data: {'id': id},


                success: function (response) {
                    $('.condition_qa_result').append(response);
                }
            });
        }
        else {
            var message = 'This Offense is already selected.'

            $('.toast-body').empty();
            $('.toast-body').text(message);

            $('.toast').toast({
                delay: 3000
            });
            $('.toast').toast('show');
        }

    });



    //age calculation
    $(document).on('keyup', '#year', function () {


        var year = $(this).val();

        var date = new Date().getFullYear()
        $('#age').val(date - year);

        var fina = date - year;
        $('#age_text').empty().append("<span class=\"pink-colorr\">Age</span> (" + fina + ")");

    });

    //hide or show reult detail
    $(document).on('click', '.fa-chevron-down', function () {

        var id = $(this).attr('id');

        $(".div_show" + id).toggleClass('show');
    });

    //gender selection
    $(".gender").click(function () {

        $(this).addClass('blue-color');
        $(this).addClass('gender_border');
        $(this).removeClass('pink-color');

        $('.gender').not(this).addClass('pink-color');
        $('.gender').not(this).removeClass('blue-color');
        $('.gender').not(this).removeClass('gender_border');


        $('#gender').val($(this).attr('data'));
    });

    //get result of fex



    $("#get_quote_lterm").click(function () {


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
            //     $('#get_quote_fex').prop('disabled', true);
            var formData = new FormData((document.getElementById('form1')));


            $.ajax({
                type: 'POST',
                url: "" + baseurl + "/user/get_quote_lterm",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,

                success: function (response) {
                    $('#get_quote_term').prop('disabled', false);
                    $('.result').empty().append(response);
                }
            });
        }

    });





    //next question
    $(document).on('click', '#next_ques', function () {

        var total = $(this).attr('total');
        var current = parseInt($(this).attr('current'));
        var rand = $(this).attr('rand');
        var i = 1;
        var nextindex = 1;
        var conditionmain = false;
        var condition = true;
        var nextPosition = '.current_ques_' + rand + '_' + (current + 1);
        var currentPosition = '.current_ques_' + rand + '_' + (current);


        if ($(currentPosition).hasClass('yesnoques')) {

            if ($(currentPosition).attr('ifyes') != 0 || $(currentPosition).attr('ifno') != 0) {

                conditionmain = true;

            }
        }


        if (current != total || conditionmain == true) {

            $('.all_ques_' + rand).hide();

            if ($(nextPosition).hasClass('childques' + rand + '')) {
                if ($(nextPosition).attr('parentanswer') == $(currentPosition).attr('answer')) {
                    condition = false;

                } else {
                    $('.childques' + rand).remove();
                    questionIndexing(rand);
                }
            }
            if (condition == true) {
                if ($(currentPosition).hasClass('yesnoques')) {

                    if ($(currentPosition).attr('ifyes') != 0 && $(currentPosition).attr('answer') == 'yes') {

                        var id = $(currentPosition).attr('ifyes');
                        $.ajax({
                            type: 'get',
                            url: "" + baseurl + "/user/get_condition_qa_lterm_next",
                            data: { 'id': id, 'answer': 'yes', 'rand': rand },
                            async: false,

                            success: function (response) {
                                //$(response).insertAfter('.current_ques_'+(current));
                                $(currentPosition).after(response);
                                questionIndexing(rand);
                                //  $().next_in().append(response);
                            }
                        });

                    }

                    else if ($(currentPosition).attr('ifno') != 0 && $(currentPosition).attr('answer') == 'no') {
                        var id = $(currentPosition).attr('ifno');
                        $.ajax({
                            type: 'get',
                            url: "" + baseurl + "/user/get_condition_qa_lterm_next",
                            data: { 'id': id, 'answer': 'no', 'rand': rand },
                            async: false,


                            success: function (response) {
                                //$(response).insertAfter('.current_ques_'+(current));
                                $(currentPosition).after(response);

                                questionIndexing(rand);
                                //  $().next_in().append(response);
                            }
                        });
                    } else {
                        nextindex = 1;
                    }

                }

            }


            $(nextPosition).show();
            $(nextPosition).attr('jump', nextindex);
            $(this).attr('current', current + nextindex);
            $('.back_ques' + rand).attr('current', current + nextindex);
            $('.start_status' + rand).empty().append(current + nextindex);


            $(this).attr('value', 'NEXT');
            if (current + nextindex == total) {
                $(this).attr('value', 'FINISHED');
            }


        } else {
            $(this).attr('value', 'FINISHED');
            $('#con_div_' + rand).children('div:nth-child(1)').children('div:nth-child(2)').hide();
            $('#con_div_' + rand).find('i.fa-edit').attr('status', 'hide');
        }


    });

    //indexing question
    function questionIndexing(rand) {
        var rand = rand;
        var i = 0;
        $('.all_ques_' + rand).each(function (key, value) {

            var index = $(this).attr('i');
            $(this).removeClass('current_ques_' + rand + '_' + index + '');
            $(this).addClass('current_ques_' + rand + '_' + (key + 1) + '');
            $(this).attr('i', (key + 1));

            if ($(this).hasClass('yesnoques')) {
                $(this).find('.selection').attr('i', (key + 1));
            }
            ++i;
        });

        $('.next_ques' + rand).attr('total', i);
        $('.back_ques' + rand).attr('total', i);
        $('.end_status' + rand).empty().append(i);


        $('.next_ques_med' + rand).attr('total', i);
        $('.back_ques_med' + rand).attr('total', i);
        $('.end_status_med' + rand).empty().append(i);


    }

    //back question
    $(document).on('click', '#back_ques', function () {

        var total = $(this).attr('total');
        var current = parseInt($(this).attr('current'));
        var rand = $(this).attr('rand');
        var nextindex = 1;
        if (current != 1) {

            $('.all_ques_' + rand).hide();


            $('.current_ques_' + rand + '_' + (current - nextindex)).show();
            $(this).attr('current', current - nextindex);
            $('.next_ques' + rand).attr('current', current - nextindex);
            $('.start_status' + rand).empty().append(current - nextindex);
            $('.next_ques' + rand).attr('value', 'NEXT');


        }

    });

    //remove question
    $(document).on('click', '.con_remove', function () {

        var id = $(this).attr('id_data');
        $('#con_div_' + id).remove();

    });


    //edit question
    $(document).on('click', '.con_edit', function () {

        var id = $(this).attr('id_data');
        var status = $(this).attr('status');

        if (status == 'show') {
            $('#con_div_' + id).children('div:nth-child(1)').children('div:nth-child(2)').hide();
            $('#con_div_' + id).children('div:nth-child(1)').children('div:nth-child(3)').hide();
            $(this).attr('status', 'hide');
        } else {
            $('#con_div_' + id).children('div:nth-child(1)').children('div:nth-child(2)').show();
            $('#con_div_' + id).children('div:nth-child(1)').children('div:nth-child(3)').show();
            $(this).attr('status', 'show');
        }

    });

    //yes or no selection
    $(document).on('click', '.selection', function () {



        $(this).addClass('blue-color');
        $(this).removeClass('pink-color');

        var id = $(this).attr('data_id');
        var data = $(this).attr('data');
        var index = $(this).attr('i');
        var rand = $(this).attr('rand');

        $('.selection_' + rand + '_' + id).not(this).addClass('pink-color');
        $('.selection_' + rand + '_' + id).not(this).removeClass('blue-color');
        if($(this).hasClass('decques'))
        {


        if (data=='yes')
        {
            $('.selection_' + rand + '_' + id).not(this).parent().parent().parent().parent().children('input').val('decline');

        }
        else {
            $('.selection_' + rand + '_' + id).not(this).parent().parent().parent().parent().children('input').val('nothing');
        }


        }
        $('.current_ques_' + rand + '_' + index).attr('answer', data);

    });




    function offenseCheck(id)
    {
        var response=true;
        $('input[name^="offense_id"]').each(function(){

            if(parseInt($(this).val())==parseInt(id))
            {

                response= false;
            }
        });

        return response;



    }





    $(document).on('mouseover', '.infoplan', function () {

        $(this).next().show();

    });

    $(document).on('mouseout', '.infoplan', function () {

        $(this).next().hide();

    });




});
