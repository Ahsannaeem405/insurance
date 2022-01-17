@if(count($rec->conditionQuestions)!=0)
@php
    $rand = random_int(100000, 999999);
@endphp


<div id="con_div_{{$rand}}" class="mt-3">

    <div
        style="border-left: 15px solid var(--orange)!important; ;padding: 0.5em 0.8em !important;border-top: 1px solid #ded8d8; border-right: 1px solid #ded8d8; border-bottom: 1px solid #ded8d8;"
        class="dropdown">
        {{$rec->condition_e}}

        <i style="float: right;color: red;cursor: pointer" id_data="{{$rand}}"
           class="fa fa-trash p-1 con_remove"> </i>
        <i style="float: right;color: purple;cursor: pointer" id_data="{{$rand}}" status="show"
           class="fa fa-edit p-1 con_edit"> </i>

    </div>
    <div class="dropdown-container mb-5"
         style="background-color: white;   box-shadow: 0 3px 15px 0 rgb(0 0 0 / 20%);padding:1rem;  ">
        @if($rec->conditionQuestions!=null)
            <div>
                @php $i=1; @endphp
                @foreach($rec->conditionQuestions as $question)

                    @if($question->type_id==1)

                        <div class="current_ques_{{$rand}}_{{$i}} all_ques_{{$rand}}" rand={{$rand}} jump="1" i="{{$i}}" @if($i>=2) style="display: none" @endif>
                            <h3 class="text-center mt-2">{{$question->question}}</h3>
                            <div class="container">
                                <div class="row m-0 mt-3 ">
                                    <div class="col-lg-8 d-flex m-auto">
                                        <div class="col-4">

                                            <select class="form-control">
                                                <option value="1">Jan</option>
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

                                            <select class="form-control">
                                                <option value="1">1</option>
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

                                            <select class="form-control">
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
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
                                                <option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                                <option value="1993">1993</option>
                                                <option value="1992">1992</option>
                                                <option value="1991">1991</option>
                                                <option value="1990">1990</option>
                                                <option value="1989">1989</option>
                                                <option value="1988">1988</option>
                                                <option value="1987">1987</option>
                                                <option value="1986">1986</option>
                                                <option value="1985">1985</option>
                                                <option value="1984">1984</option>
                                                <option value="1983">1983</option>
                                                <option value="1982">1982</option>
                                                <option value="1981">1981</option>
                                                <option value="1980">1980</option>
                                                <option value="1979">1979</option>
                                                <option value="1978">1978</option>
                                                <option value="1977">1977</option>
                                                <option value="1976">1976</option>
                                                <option value="1975">1975</option>
                                                <option value="1974">1974</option>
                                                <option value="1973">1973</option>
                                                <option value="1972">1972</option>
                                                <option value="1971">1971</option>
                                                <option value="1970">1970</option>
                                                <option value="1969">1969</option>
                                                <option value="1968">1968</option>
                                                <option value="1967">1967</option>
                                                <option value="1966">1966</option>
                                                <option value="1965">1965</option>
                                                <option value="1964">1964</option>
                                                <option value="1963">1963</option>
                                                <option value="1962">1962</option>
                                                <option value="1961">1961</option>
                                                <option value="1960">1960</option>
                                                <option value="1959">1959</option>
                                                <option value="1958">1958</option>
                                                <option value="1957">1957</option>
                                                <option value="1956">1956</option>
                                                <option value="1955">1955</option>
                                                <option value="1954">1954</option>
                                                <option value="1953">1953</option>
                                                <option value="1952">1952</option>
                                                <option value="1951">1951</option>
                                                <option value="1950">1950</option>
                                                <option value="1949">1949</option>
                                                <option value="1948">1948</option>
                                                <option value="1947">1947</option>
                                                <option value="1946">1946</option>
                                                <option value="1945">1945</option>
                                                <option value="1944">1944</option>
                                                <option value="1943">1943</option>
                                                <option value="1942">1942</option>
                                                <option value="1941">1941</option>
                                                <option value="1940">1940</option>
                                                <option value="1939">1939</option>
                                                <option value="1938">1938</option>
                                                <option value="1937">1937</option>
                                                <option value="1936">1936</option>
                                                <option value="1935">1935</option>
                                                <option value="1934">1934</option>
                                                <option value="1933">1933</option>
                                                <option value="1932">1932</option>
                                                <option value="1931">1931</option>
                                                <option value="1930">1930</option>
                                                <option value="1929">1929</option>
                                                <option value="1928">1928</option>
                                                <option value="1927">1927</option>
                                                <option value="1926">1926</option>
                                                <option value="1925">1925</option>
                                                <option value="1924">1924</option>
                                                <option value="1923">1923</option>
                                                <option value="1922">1922</option>
                                                <option value="1921">1921</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>





                    @elseif($question->type_id==2)
                        <div class="current_ques_{{$rand}}_{{$i}} all_ques_{{$rand}} yesnoques" rand={{$rand}} jump="1" answer="yes" ifyes="{{$question->if_yes}}" i="{{$i}}" ifno="{{$question->if_no}}" @if($i>=2) style="display: none" @endif>
                            <h3 class="text-center mt-2">{{$question->question}}</h3>
                            <div class="container">
                                <div class="row m-0 mt-3">
                                    <div class="col-6 " style="margin: auto;cursor: pointer">
                                        <p class="p-2 selection selection_{{$rand}}_{{$question->id}}"
                                           next_ques="{{$question->if_yes}}" rand="{{$rand}}" data_id="{{$question->id}}" i="{{$i}}" data="yes"
                                           style="border: 1px solid #22339e;border-radius: 10px;color: white;background-color:#22339e ; text-align: center">
                                            Yes</p>
                                    </div>

                                    <div class="col-6 " style="margin: auto;cursor: pointer">
                                        <p class="p-2 selection selection_{{$rand}}_{{$question->id}}" data="no" i="{{$i}}"
                                           next_ques="{{$question->if_no}}" rand="{{$rand}}" data_id="{{$question->id}}"
                                           style="border: 1px solid #22339e;border-radius: 10px;color: black;text-align:center">
                                            No</p>
                                    </div>

                                </div>


                            </div>
                        </div>


                    @endif

                    @php ++$i @endphp

                @endforeach
                <div class="row mt-5 text-center">
                    <div class="m-auto">

                        <input type="button" id="back_ques" class="btn btn-secondary back_ques{{$rand}}"
                               current="1" rand="{{$rand}}" total="{{$i-1}}"
                               value="BACK">
                        <span class="start_status{{$rand}}">1</span> / <span
                            class="end_status{{$rand}}">{{$i-1}}</span>
                        <input type="button" value="NEXT" class="next_ques{{$rand}} btn btn-primary"
                               id="next_ques" current="1" rand="{{$rand}}"
                               total="{{$i-1}}"
                               style="background-color: #8b8be1;border: #8282cb">
                    </div>
                </div>

            </div>
        @endif


    </div>
</div>

    @else


    <script>
    var    message = 'No condition Question found.'


            $('.toast-body').empty();
            $('.toast-body').text(message);

            $('.toast').toast({

                delay: 3000
            });
            $('.toast').toast('show');
    </script>

@endif
