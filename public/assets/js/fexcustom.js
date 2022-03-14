$(document).ready(function () {


    var baseurl = '';
   //  var baseurl='/public';
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
            //     $('#get_quote_fex').prop('disabled', true);
            var formData = new FormData((document.getElementById('form1')));


            $.ajax({
                type: 'POST',
                url: "" + baseurl + "/user/get_quote_fex",
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

    //get condition
    $(".condition").keyup(function () {

        var condition = $(this).val();

        $.ajax({
            type: 'get',
            url: "" + baseurl + "/user/get_condition_fex",
            data: { 'condition': condition },


            success: function (response) {
                $('.condition_result').empty().append(response);
            }
        });


    });

    //append conditions
    $(document).on('click', '.con_data', function () {

        var id = $(this).attr('id');


        $('.condition_result').empty();
        $('.condition').val('');

var res=conditionCheck(id);
        if(res==true)
        {
            $.ajax({
                type: 'get',
                url: "" + baseurl + "/user/get_condition_qa_fex",
                data: { 'id': id },


                success: function (response) {
                    $('.condition_qa_result').append(response);
                }
            });
        }
        else {
            var message = 'This condition is already selected.'

            $('.toast-body').empty();
            $('.toast-body').text(message);

            $('.toast').toast({
                delay: 3000
            });
            $('.toast').toast('show');
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
                            url: "" + baseurl + "/user/get_condition_qa_fex_next",
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
                            url: "" + baseurl + "/user/get_condition_qa_fex_next",
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

        $('.current_ques_' + rand + '_' + index).attr('answer', data);


    });

    //get medication

    $(".medication").keyup(function () {

        var medication = $(this).val();

        $.ajax({
            type: 'get',
            url: "" + baseurl + "/user/get_medication_fex",
            data: { 'medication': medication },


            success: function (response) {
                $('.medication_result').empty().append(response);
            }
        });


    });


    //append medication

    $(document).on('click', '.med_data', function () {

        var name = $(this).attr('con');
        var id = $(this).attr('id');
        $('.medication_result').empty();
        $('.medication').val('');

var res=medicationCheck(id);
if (res==true)
{
    $.ajax({
        type: 'get',
        url: "" + baseurl + "/user/get_medication_condition_fex",
        data: { 'name': name },


        success: function (response) {
            $('.medication_qa_result').append(response);
            comboCondition();


        }
    });

}
else {
    var message = 'This Medication is already selected.'

    $('.toast-body').empty();
    $('.toast-body').text(message);

    $('.toast').toast({
        delay: 3000
    });
    $('.toast').toast('show');
}


    });

    function comboCondition()
    {
        var formData = new FormData((document.getElementById('form1')));


        $.ajax({
            type: 'POST',
            url: "" + baseurl + "/user/get_combo_fex",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            success: function (response) {


                if(response['success'])
                {
                  var id = response['condition'];
                  var res=  conditionCheck(id);

                  if(res==true)
                  {

                    $('.condition_result').empty();
                    $('.condition').val('');

                    $.ajax({
                        type: 'get',
                        url: "" + baseurl + "/user/get_condition_qa_fex",
                        data: { 'id': id },

                        success: function (response) {
                            $('.condition_qa_result').append(response);
                        }
                    });


                }
                }
            }
        });
    }

    function conditionCheck(id)
    {
var response=true;
        $('input[name^="condition_ids"]').each(function(){

       if(parseInt($(this).val())==parseInt(id))
       {

           response= false;
       }
        });

        return response;



    }

    function medicationCheck(id)
    {
        var response=true;
        $('input[name^="medication_ids"]').each(function(){

            if(parseInt($(this).val())==parseInt(id))
            {

                response= false;
            }
        });

        return response;



    }

    //next question meditation
    $(document).on('click', '#next_ques_med', function () {

        var total = $(this).attr('total');
        var current = parseInt($(this).attr('current'));
        var rand = $(this).attr('rand');
        var i = 1;
        var nextindex = 1;
        var condition = true;
        var length = 0;
        var conditionmain = false;
        var selection = $("input[name='selec_condition" + rand + "']:checked").val();


        var nextPosition = '.current_ques_' + rand + '_' + (current + 1);
        var currentPosition = '.current_ques_' + rand + '_' + (current);

        if ($(currentPosition).hasClass('medication_Con')) {

            if (selection) {

                var id = $(this).attr('id');

                $.ajax({
                    type: 'get',
                    url: "" + baseurl + "/user/get_condition_qa_med_length_fex",
                    data: { 'id': selection, 'rand': rand },
                    async: false,

                    success: function (response) {

                        length = response;
                    }
                });

                if (length >= 1) {
                    $.ajax({
                        type: 'get',
                        url: "" + baseurl + "/user/get_condition_qa_med_fex",
                        data: { 'id': selection, 'rand': rand },
                        async: false,

                        success: function (response) {
                            $('.all_ques_' + rand).hide();
                            $(currentPosition).nextAll().remove();
                            $(currentPosition).after(response);

                            questionIndexing(rand);
                            $(nextPosition).show();
                            $(nextPosition).attr('jump', nextindex);
                            $('.next_ques_med' + rand).attr('current', 2);
                            $('.back_ques_med' + rand).attr('current', current + 1);
                            $('.start_status_med' + rand).empty().append(2);


                            $('.next_ques_med' + rand).attr('value', 'NEXT');


                            if (current + 1 == 1 + length) {
                                $('.next_ques_med' + rand).attr('value', 'FINISHED')

                            }

                        }
                    });
                } else {
                    var message = 'no question found'


                    $('.toast-body').empty();
                    $('.toast-body').text(message);

                    $('.toast').toast({

                        delay: 3000
                    });
                    $('.toast').toast('show');
                }


            } else {
                var message = 'please select condition.'

                $('.toast-body').empty();
                $('.toast-body').text(message);

                $('.toast').toast({

                    delay: 3000
                });
                $('.toast').toast('show');
            }
        } else {


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
                                url: "" + baseurl + "/user/get_condition_qa_fex_next",
                                data: { 'id': id, 'answer': 'yes', 'rand': rand },
                                async: false,

                                success: function (response) {
                                    //$(response).insertAfter('.current_ques_'+(current));
                                    $(currentPosition).after(response);
                                    questionIndexing(rand);
                                    //  $().next_in().append(response);
                                }
                            });

                        } else if ($(currentPosition).attr('ifno') != 0 && $(currentPosition).attr('answer') == 'no') {
                            var id = $(currentPosition).attr('ifno');
                            $.ajax({
                                type: 'get',
                                url: "" + baseurl + "/user/get_condition_qa_fex_next",
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
                $('.back_ques_med' + rand).attr('current', current + nextindex);
                $('.start_status_med' + rand).empty().append(current + nextindex);


                $(this).attr('value', 'NEXT');
                if (current + nextindex == total) {
                    $(this).attr('value', 'FINISHED')
                }


            } else {
                $(this).attr('value', 'FINISHED');
                $('#con_div_' + rand).children('div:nth-child(1)').children('div:nth-child(2)').hide();
                $('#con_div_' + rand).children('div:nth-child(1)').children('div:nth-child(3)').hide();
                $('#con_div_' + rand).find('i.fa-edit').attr('status', 'hide');
            }
        }

    });


    $(document).on('click', '#back_ques_med', function () {

        var total = $(this).attr('total');
        var current = parseInt($(this).attr('current'));
        var rand = $(this).attr('rand');
        var nextindex = 1;
        if (current != 1) {

            $('.all_ques_' + rand).hide();


            $('.current_ques_' + rand + '_' + (current - nextindex)).show();
            $(this).attr('current', current - nextindex);
            $('.next_ques_med' + rand).attr('current', current - nextindex);
            $('.start_status_med' + rand).empty().append(current - nextindex);
            $('.next_ques_med' + rand).attr('value', 'NEXT');


        }

    });

    $(document).on('mouseover', '.infoplan', function () {

        $(this).next().show();

    });

    $(document).on('mouseout', '.infoplan', function () {

        $(this).next().hide();

    });





    $("#get_quote_compare_fex").click(function () {


        var check = true;
        var check2= true;
        var message = '';


        if ($('#face_amount1').val() == '' && $('#face_amount2').val() == '' && $('#face_amount3').val() == '' && $('#face_amount11').val() == '' && $('#face_amount22').val() == '' && $('#face_amount33').val() == '') {


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
                url: "" + baseurl + "/user/get_quote_compare_fex",
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

    $(document).on('click', '.pushtocrm', function () {

var price=$(this).attr('price');
var tagline=$(this).attr('tagline');
var company=$(this).attr('company');

$('#pricedata').val(price);
$('#taglinedata').val(tagline);
$('#companydata').val(company);

    });



    $(document).on('click', '.pushtopolicy', function () {

        var price=$(this).attr('price');
        var tagline=$(this).attr('tagline');
        var company=$(this).attr('company');

        $('#pricedataPolicy').val(price);
        $('#taglinedataPolicy').val(tagline);
        $('#companydataPolicy').val(company);

    });


});
