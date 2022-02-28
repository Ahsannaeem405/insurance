@php $i=1; @endphp


@if($question->type_id==1)

<div class="current_ques_{{$rand}}_{{$i}} all_ques_{{$rand}} childques{{$rand}}" rand="{{$rand}}" jump="1" i="{{$i}}" parentanswer="{{$answer}}" @if($i>=2) style="display: none" @endif>
    <h3 class="text-center mt-2">{{$question->question}} </h3>

    @if($question->question_type=="question")
        <input type="hidden" value="offense" name="q_type{{$question->offense_id_next}}[]">
    @else
        <input type="hidden" value="nothing" name="q_type{{$question->offense_id_next}}[]">
    @endif



    <div class="container">
        <div class="row m-0 mt-3 ">
            <div class="col-lg-8 d-flex m-auto">
                <div class="col-4">
                    <select name="month_{{$question->offense_id_next}}[]" class="form-control" style="width: 85px;">
                        <option value="1" selected>Jan</option>
                        <option value="02">Feb</option>
                        <option value="03">Mar</option>
                        <option value="04">Apr</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">Aug</option>
                        <option value="09">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>

                    </select>
                </div>
                <div class="col-4">
                    <select name="day_{{$question->offense_id_next}}[]" class="form-control" style="width: 85px;">

                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value=8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                </div>
                <div class="col-4">
                    <select name="year_{{$question->offense_id_next}}[]" class="form-control" style="width: 85px;">
                        <option value="2022" selected>2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                    </select>
                </div>
            </div>

        </div>


    </div>
</div>




@elseif($question->type_id==2)
<div class="current_ques_{{$rand}}_{{$i}} all_ques_{{$rand}} yesnoques childques{{$rand}}" rand="{{$rand}}" jump="1" answer="yes" parentanswer="{{$answer}}" ifyes="{{$question->if_yes}}" i="{{$i}}" ifno="{{$question->if_no}}" @if($i>=2) style="display: none" @endif>
    <h3 class="text-center mt-2">{{$question->question}}</h3>

    @php $dec=0;@endphp

    @if($question->question_type=="decline")
        @php $dec=1;@endphp
        <input type="hidden" value="decline" name="q_type{{$question->offense_id_next}}[]">
        <input type="hidden" value="nothing" name="month_{{$question->offense_id_next}}[]">
        <input type="hidden" value="nothing" name="year_{{$question->offense_id_next}}[]">
        <input type="hidden" value="nothing" name="day_{{$question->offense_id_next}}[]">
    @else
        <input type="hidden" value="nothing" name="q_type{{$question->offense_id_next}}[]">
        <input type="hidden" value="nothing" name="month_{{$question->offense_id_next}}[]">
        <input type="hidden" value="nothing" name="year_{{$question->offense_id_next}}[]">
        <input type="hidden" value="nothing" name="day_{{$question->offense_id_next}}[]">

    @endif

    <div class="container">
        <div class="row m-0 mt-3">
            <div class="col-6 " style="margin: auto;cursor: pointer">
                <p class="{{$dec==1 ? 'decques' :null}} p-2 selection selection_{{$rand}}_{{$question->id}} blue-color" next_ques="{{$question->if_yes}}" rand="{{$rand}}" data_id="{{$question->id}}" i="{{$i}}" data="yes" style="border-radius: 10px; text-align: center">
                    Yes</p>
            </div>
            <div class="col-6 " style="margin: auto;cursor: pointer">
                <p class="{{$dec==1 ? 'decques' :null}} p-2 selection selection_{{$rand}}_{{$question->id}} pink-color" data="no" i="{{$i}}" next_ques="{{$question->if_no}}" rand="{{$rand}}" data_id="{{$question->id}}" style="border-radius: 10px;color: white;text-align:center;">
                    No</p>
            </div>
        </div>
    </div>
</div>


@endif
