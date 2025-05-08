@extends('layouts.master')
@section('title', 'Edit Pay Claim Form')
@section('content')
<style>
    .remove-btn1 { margin-top: 26.5px; }
    .error { color: red; }
    .upload-photo-main{ left: 42px; }
    .imgProfile{height: 150px;width: auto;margin-right: 30px;border-radius: 10px; border: solid 3px #107dc2;}
    .timewidth{width: 125px;}
    .lsnRate{min-width: 43px}
</style>
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="d-flex flex-row">
            <div class="flex-row-fluid">
                <div class="card card-custom card-stretch">
                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">@if($data->pay_status=='Pending') Edit @else View @endif Pay Claim Form</h3>
                        </div>
                    </div>
                    @if($data->pay_status=='Pending')
                    <form class="form" method="post" action="javascript:void(0)" id="formId" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="edit_id" value="{{$data->id}}">
                    @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12" style="display: flex;">
                                    <div>
                                        @if(Auth::guard()->user()->profile_photo)
                                            <img src="{{Auth::guard()->user()->profile_photo}}" class="imgProfile">
                                        @else  
                                            <img src="{{(asset('uploads/avatar.jpg'))}}" class="imgProfile">
                                        @endif
                                    </div>
                                    <div>
                                        <h1>{{Auth::guard()->user()->first_name}} {{Auth::guard()->user()->last_name}}</h1>
                                        <h4>Teaches: <?php
                                            $subjectArray='';
                                            ?>
                                            @foreach($teacher_subject_list as $key => $sval)
                                                <?php
                                                $subjectArray.='<option value="'.$sval->subject_id.'">'.$sval->main_title.'</option>';
                                                ?>
                                                @if($key==0)
                                                {{$sval->main_title}}
                                                @else
                                                {{', '.$sval->main_title}}
                                                @endif
                                            @endforeach
                                        </h4>
                                        <p><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#3699FF" opacity="0.3"></path><path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#3699FF"></path></g></svg></span> &nbsp; {{$totalHrs}}+ hours taught</p>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding:0; margin-top: 15px;">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="border-bottom: 1px solid #EBEDF3;">
                                            <thead>
                                                <tr>
                                                    <th colspan="7" style="text-align:right;">
                                                        <p>Week Commencing</p>
                                                        <div style="display: flex; column-gap: 20px;justify-content: flex-end;">
                                                            <select class="form-control" style="width: 218px;" required name="week" id="week">
                                                                <option value="{{$data->week_date}}">{{$data->week_date}}</option>
                                                            </select>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Student Name</th>
                                                    <th>Subject</th>
                                                    <th>Lesson date</th>
                                                    <th style="width:235px">Lesson Time (Start - End)</th>
                                                    <th width="146px">Number of hours</th>
                                                    <th width="146px">Rate per hour (£)</th>
                                                    @if($data->pay_status=='Pending')
                                                    <th width="75px">Action</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody id="tbody">
                                                <?php
                                                $studentArray='';
                                                ?>
                                                @foreach($details as $key => $val)
                                                <tr id="tr_e{{$val->id}}">
                                                    <td>
                                                        <select class="form-control selectpicker" required name="studentName[]" aria-label="Default select example" data-live-search="true" @if($data->pay_status=='Paid') disabled @endif>
                                                            <option value="">Select Student</option>
                                                            @foreach($parentslist as $key2 => $sval)
                                                            <?php
                                                            if($key==0)
                                                            {
                                                                $studentArray.='<option value="'.$sval->id.'0_0'.$sval->student_name.'">'.$sval->student_name.'</option>';
                                                            }
                                                            ?>
                                                            <option value="{{$sval->id.'0_0'.$sval->student_name}}" @if($val->student_name==$sval->student_name) selected @endif>{{$sval->student_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                      <select class="form-control selectpicker" required name="subjectName[]" aria-label="Default select example" data-live-search="true" @if($data->pay_status=='Paid') disabled @endif>
                                                        <option value="">Select Subject</option>
                                                        @foreach($teacher_subject_list as $key2 => $sval)
                                                        <option value="{{$sval->subject_id}}" @if($val->subject_id==$sval->subject_id) selected @endif>{{$sval->main_title}}</option>
                                                        @endforeach
                                                      </select>
                                                    </td>
                                                    <td><input type="date" class="form-control" id="lsndate_e{{$val->id}}" style="width: 138px;" required name="lsnDate[]" value="{{$val->lesson_date}}" @if($data->pay_status=='Paid') disabled @endif></td>
                                                    <td>
                                                      <div style="display:flex; justify-content: space-between;">
                                                        <input type="time" class="form-control timewidth" id="lsnTimeS_e{{$val->id}}" onchange="calculate('e{{$val->id}}')" required name="lsnTimeStart[]" value="{{$val->lession_time_start}}" @if($data->pay_status=='Paid') disabled @endif><span> - </span><input type="time" class="form-control timewidth" id="lsnTimeE_e{{$val->id}}" onchange="calculate('e{{$val->id}}')" required name="lsnTimeEnd[]" value="{{$val->lession_time_end}}" @if($data->pay_status=='Paid') disabled @endif>
                                                      </div>
                                                    </td>
                                                    <td><input type="number" class="form-control lsnHrs" id="lsnHrs_e{{$val->id}}" name="lsnHrs[]" value="{{$val->no_hrs}}" @if($data->pay_status=='Paid') disabled @else readonly @endif></td>
                                                    <td><input type="number" step="0.01" class="form-control lsnRate" id="lsnRate_e{{$val->id}}" onchange="calculate('e{{$val->id}}')" required name="lsnRate[]" value="{{$val->rate_per_hrs}}" @if($data->pay_status=='Paid') disabled @endif><input type="hidden" class="lsnHrsRate" id="lsnHrsRate_e{{$val->id}}" name="lsnHrsRate[]" value="{{$val->no_hrs*$val->rate_per_hrs}}"></td>
                                                    @if($data->pay_status=='Pending')
                                                    <td><a href="javascript:void(0)" title="Remove" onclick="removeRow('e{{$val->id}}')"><i class="fa fa-trash"></i></a></td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4" class="text-end">Total</th>
                                                    <th class="text-end"><span id="ttlHrs">{{$data->total_hrs}}</span> hrs</th>
                                                    <th class="text-end">£ <span id="ttlEuro">{{$data->total_euro}}</span></th>
                                                    <input type="hidden" id="ttlHrsInput" name="totalHrs" value="{{$data->total_hrs}}">
                                                    <input type="hidden" id="ttlEuroInput" name="totalRate" value="{{$data->total_euro}}">
                                                    @if($data->pay_status=='Pending')
                                                    <td><a href="javascript:void(0)" class="btn btn-primary" onclick="addRow()">Add</a></td>
                                                    @endif
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        @if($data->pay_status=='Pending')
                        <div class="card-footer" style="text-align:end">
                            <button type="submit" id="submit-btn" class="btn btn-primary mr-2" style="background-color:#3498db !important">Submit</button>
                            <button type="reset" class="btn btn-secondary" onclick='window.location.href="{{ url('tutor-pay-claim-history')}}"'>Cancel</button>
                        </div>
                        <!--end::Body-->
                    </form>
                    @endif
                </div>
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Subject List-->
</div>
<!--end::Container-->
@endsection
@section('page-js')
<script src="{{asset('assets/Modulejs/textbooks.js')}}"></script>
<script>
      var rowSrn = 2;
      function addRow() {
        $('#tbody').append('<tr id="tr_'+rowSrn+'"><td><select class="form-control selectpicker'+rowSrn+'" required name="studentName[]" aria-label="Default select example" data-live-search="true"><option value="">Select Student</option><?= $studentArray; ?></select></td><td><select class="form-control selectpicker'+rowSrn+'" required name="subjectName[]" aria-label="Default select example" data-live-search="true"><option value="">Select Subject</option><?= $subjectArray; ?></select></td><td><input type="date" class="form-control" id="lsndate_'+rowSrn+'" style="width: 138px;" required name="lsnDate[]"></td><td><div style="display:flex; justify-content: space-between;"><input type="time" class="form-control timewidth" id="lsnTimeS_'+rowSrn+'" onchange="calculate('+rowSrn+')" required name="lsnTimeStart[]"><span> - </span><input type="time" class="form-control timewidth" id="lsnTimeE_'+rowSrn+'" onchange="calculate('+rowSrn+')" required name="lsnTimeEnd[]"></div></td><td><input type="number" class="form-control lsnHrs" readonly id="lsnHrs_'+rowSrn+'" name="lsnHrs[]"></td><td><input type="number" step="0.01" class="form-control lsnRate" id="lsnRate_'+rowSrn+'" onchange="calculate('+rowSrn+')" required name="lsnRate[]"><input type="hidden" class="lsnHrsRate" id="lsnHrsRate_'+rowSrn+'" name="lsnHrsRate[]"></td><td><a href="javascript:void(0)" title="Remove" onclick="removeRow('+rowSrn+')"><i class="fa fa-trash"></i></a></td></tr>');
        $('.selectpicker'+rowSrn).selectpicker();
        rowSrn++;
      }

      function removeRow(rid) {
        $('#tr_'+rid).remove();
        totalCal();
      }
      function calculate(rid)
      {
        var lsndate = $('#lsndate_'+rid).val();
        var lsnTimeS = $('#lsnTimeS_'+rid).val();
        var lsnTimeE = $('#lsnTimeE_'+rid).val();
        var lsnHrs = $('#lsnHrs_'+rid).val();
        var lsnRate = $('#lsnRate_'+rid).val();
        if(lsnTimeS!='' && lsnTimeE!='')
        {
          var time1 = lsnTimeS.split(':'), time2 = lsnTimeE.split(':');
          var hours1 = parseInt(time1[0], 10), hours2 = parseInt(time2[0], 10), mins1 = parseInt(time1[1], 10), mins2 = parseInt(time2[1], 10);
          var hours = hours2 - hours1, mins = 0;
          if(hours < 0) hours = 24 + hours;
          if(mins2 >= mins1) {
            mins = mins2 - mins1;
          }
          else {
            mins = (mins2 + 60) - mins1;
            hours--;
          }
          mins = mins / 60;
          if(mins>0 && mins<0.5){mins=0.25;}
          else if(mins>=0.5 && mins<0.75){mins=0.5;}
          else if(mins>=0.75 && mins<0.99){mins=0.75;}
          hours += mins;
          if(hours<0.5){hours=0.25;}
          hours = hours.toFixed(2);
          $('#lsnHrs_'+rid).val(hours);
          if(lsnRate!='')
          {
            $('#lsnHrsRate_'+rid).val(parseFloat(hours)*parseFloat(lsnRate));
          }
          else
          {
            $('#lsnHrsRate_'+rid).val(0);
          }
          totalCal();
        }
      }

      function totalCal()
      {
        var totalHrs = 0;
        var totalRate = 0;
        $('.lsnHrs').each(function(){
          if(this.value!='')
          {
            totalHrs += parseFloat(this.value);
          }
        });
        $('.lsnHrsRate').each(function(){
          if(this.value!='')
          {
            totalRate += parseFloat(this.value);
          }
        });
        $('#ttlHrs').text(totalHrs);
        $('#ttlEuro').text(totalRate);
        $('#ttlHrsInput').val(totalHrs);
        $('#ttlEuroInput').val(totalRate);
      }
      $("#formId" ).submit(function() {
          $('#submit-btn').prop('disabled', true);
          let formData = new FormData(this);
          $.ajax({
              type:'POST',
              url:'{{url("tutor-pay-claim-form-update")}}',
              data:formData,
              cache:false,
              contentType: false,
              processData: false,
              success: function (data) {
                if(data['status'] == 200)
                {
                    alert('Successfully Updated');
                    window.setTimeout(function(){
                        window.location.assign('/tutor-pay-claim-history');
                    }, 100);
                }
                else
                {
                  $('#submit-btn').prop('disabled', false);
                  alert(data['message']);
                }
              }
          });
      });
</script>
@endsection