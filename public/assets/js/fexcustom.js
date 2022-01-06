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

        var condition=$(this).val();

        $.ajax({
            type: 'get',
            url: "/user/get_condition_fex",
            data: {'condition':condition},


            success: function (response) {
                $('.condition_result').empty().append(response);
            }
        });


    });

    $(document).on('click','.con_data',function () {

        var id=$(this).attr('id');


        $('.condition_result').empty();
        $('.condition').val('');


        $.ajax({
            type: 'get',
            url: "/user/get_condition_qa_fex",
            data: {'id':id},


            success: function (response) {
                $('.condition_qa_result').append(response);
            }
        });


    });

    $(document).on('click','#next_ques',function () {

        var total=$(this).attr('total');
        var current=parseInt($(this).attr('current'));
        var rand=$(this).attr('rand');

        if(current!=total)
        {

        $('.all_ques').hide();
        $('.current_ques_'+(current+1)).show();
        $(this).attr('current',current+1);
        $('.back_ques'+rand).attr('current',current+1);
        $('.start_status'+rand).empty().append(current+1);


            $(this).attr('value','NEXT');
        if(current+1==total){
            $(this).attr('value','FINISHED')
        }


        }




    });


    $(document).on('click','#back_ques',function () {

        var total=$(this).attr('total');
        var current=parseInt($(this).attr('current'));
        var rand=$(this).attr('rand');

        if(current!=1)
        {

            $('.all_ques').hide();
            $('.current_ques_'+(current-1)).show();
            $(this).attr('current',current-1);
            $('.next_ques'+rand).attr('current',current-1);
            $('.start_status'+rand).empty().append(current-1);

            $('.next_ques'+rand).attr('value','NEXT');



        }

    });

    $(document).on('click','.con_remove',function () {

        var id=$(this).attr('id_data');
        $('#con_div_'+id).remove();

    });



    $(document).on('click','.con_edit',function () {

        var id=$(this).attr('id_data');
        var status=$(this).attr('status');
        if(status=='show')
        {
            $('#con_div_'+id).children('div:nth-child(2)').hide();
            $(this).attr('status','hide');
        }
        else{
            $('#con_div_'+id).children('div:nth-child(2)').show();
            $(this).attr('status','show');
        }

    });

});
