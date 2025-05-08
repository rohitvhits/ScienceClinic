@extends('layouts.frontend')

@section('content')
<div class="as-mainwrapper">

    <!--Bg White Start-->

    <div class="bg-white responsive-main">

        <!--Header Area Start-->

        <div id="header"></div>

        <!--End of Header Area-->

        <!--background Area Start-->



        <div class="backgrount-area  bg-mathes  full-grayoverlay h-auto">

            <div class="banner-content padding-headsection h-auto" style="background-image: url('https://www.scienceclinic.co.uk/img/sc-bg1.jpg'); background-position: top center; background-size: cover;">
                <div class="ttbg">
                    <div class="container h-auto">

                        <div class="row h-auto">

                            <div class="col-md-12 h-auto">

                                <div class="text-content-wrapper text-center full-width h-auto">

                                    <div class="text-content text-center-content h-auto">

                                        <h1 class="title1 text-center max-englishtext mb-20">

                                            <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Find a Tutor</span>

                                        </h1>



                                        <p>

                                            Please enter the relevant information

                                            below to enable

                                            us find tutors who specialise in the subject you require.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="m-t-0 h-auto">

                            <div class="row justify-content-center justify-start h-auto">

                                <div class="col-md-10">

                                    <div class="row justify-content-center">

                                        <div class="col-sm-3 col-md-6 col-lg-4 mt-2">
    									   <!-- <input type="text" name="text" placeholder="Subject" id="subject">	 -->
                                            <select id="subject" class="selectpicker " data-id="subject" name="subject" id="subject" aria-label="Default select example" data-live-search="true">
                                                <option value="">Select Subject</option>
                                                @foreach ($allSubjectsData as $val)
                                                <option value="{{ $val->main_title }}" @if($subId==$val->id) selected @endif>{{$val->main_title}}</option>
                                                @endforeach
                                            </select>
    									

                                
                                        </div>

                                        <div class="col-sm-3 col-md-6 col-lg-3 mt-2">

                                            <div class="form-group">
    					                   
    										
                                                <!-- <input type="text" name="text" placeholder="Level" id="level"> -->
                                                <select id="level" class="selectpicker " data-id="level" name="level" id="level" aria-label="Default select example" data-live-search="true">
                                                    <option value="">Select Level</option>
                                                    @foreach ($allLevelData as $val)
                                                    <option value="{{ $val->title }}" @if($levelName==$val->title) selected @endif>{{$val->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
        
                                        <!--<div class="col-sm-3 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <input type="text" name="text" placeholder="Post Code" id="pincode_id">

                                            </div>

                                        </div>-->

                                        <div class="col-sm-3 col-md-3 col-lg-2">

    											

                                            <button class="btn btn-search-tutore " onclick="removeData()"><span class="zmdi zmdi-search-for tutore-search"></span>Search</button>

                                        </div>
     
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
 		   

        <section class="tutore-content details-section bg-white">

            <div class="container">

                <div class="row">

                    <div class="col-md-12">
 					
                        <div class="section-title-wrapper test tutore-middle-title">

                            <div class="section-title">

                                <h3 class="mb-4"><span id="ssubnam"></span>Tutors <span id="ttcount"></span></h3>

                            </div>

                        </div>

                    </div>

                </div>

         

                <div class="row">

                    <div class="col-md-9">
                        <div class="row" id="res_tutor_id2"></div>
                        <div class="row col-md-12" style="justify-content: center;">
                            <button class="btn btn-primary load-more-btn2" style="display: none;">Load More</button>
                            <button class="btn btn-primary load-more-btn" style="display: none;">Load More</button>
                        </div>
                    </div>
                    <div class="col-md-3 position-side">
                        <div class="p-tags">
                            <div class="side-subject">
                                <div class="subject-details">
                                    <h3 class="compares-papers">Subject
                                    </h3>
                                    <div class="max-hgt-subject">
                                        <ul class="subject-uls">
                                            @foreach($allSubjectsData as $subject)
                                            <li class="position-relative">
                                                <div class="custom-checkbox-subject">
                                                    <div class="custom-control custom-radio">
                                                        <input type="checkbox" value="{{$subject->id}}" name="subject-title" id="{{$subject->id}}" class="custom-control-input">
                                                        <label class="custom-control-label" for="{{$subject->id}}">{{$subject->main_title}}</label>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="side-subject">
                                <div class="subject-details res-pt-30">
                                    <h3 class="compares-papers">Education Level
                                    </h3>
                                    <div class="max-hgt-subject">
                                        <ul class="subject-uls">
                                            @foreach($allLevelData as $level)
                                            <li class="position-relative">
                                                <div class="custom-checkbox-subject">
                                                    <div class="custom-control custom-radio">
                                                        <input type="checkbox" value="{{$level->id}}" name="level-title" id="level-{{$level->id}}" class="custom-control-input">
                                                        <label class="custom-control-label" for="level-{{$level->id}}">{{$level->title}}</label>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="banner-readmore mt-4">
                                    <a class="button-default inline" onclick="filterTutor(1)" href="javascript:void(0)">Filter</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
                 
	 </section>
    


        <div class="english-abc">

            <div class="container">

                <div class="row justify-content-center res-mb-2">

                    <div class="col-lg-11 col-md-12">

                      <!---  <img src="{{ asset('front/img/svg/find-new.jpg') }}">-->

                    </div>

                </div>

            </div>

        </div>

        @include('frontend.subject_offer.subject_offer')
        <!--Footer Area Start-->

        <div id="footer"></div>

        <!--End of Footer Area-->
	
    </div>
  

    <!--End of Bg White-->

</div>

<!--End of Main Wrapper Area-->



<!-- Color Switcher -->
@endsection

@section('page-js')
<script>	
		var page = 1;
        var page2 = 1;

      $('.load-more-btn').click(function() {
        page++;
        $('.load-more-btn').html('<b>Loading...</b>');
        getSearch(page);
    });
      $('.load-more-btn2').click(function() {
        page2++;
        $('.load-more-btn2').html('<b>Loading...</b>');
        filterTutor(page2);
    });
   
function removeData(){
        $("#res_tutor_id2").html("");
        $('#ttcount').text('');
        var subject = $('#subject').val();
        $("#ssubnam").text(subject+' ');
        getSearch(1);
    }

    function getSearch(page) {
        $("input[name='subject-title']").prop('checked', false);
        $("input[name='level-title']").prop('checked', false);
        $('.btn-search-tutore').attr('disabled', 'disabled');
        $(".details-section").attr('style', 'display:flex');
        var level = $('#level').val();
        var subject = $('#subject').val();
        var tutor_often = $('input[name="customRadio"]:checked').val();
        var pincode_id = $('#pincode_id').val();
        var tutor_res2 = '';
        $.ajax({
            url: "{{ route('get.tutors') }}?page=" + page,
            data: {
                'subject': subject,
                'tutor_often': tutor_often,
                'level': level,
                'pincode': pincode_id
            },
            success: function(response) {
                setData(response, 'search');
            }
        });
    }
    function filterTutor(page2) {
        $("#ssubnam").text('');
        $('#subject').val(null).selectpicker('refresh');
        $('#level').val(null).selectpicker('refresh');
        if(page2==1)
        {
            $("#res_tutor_id2").html("");
        }
        var subjectArray = [];
        var levelArray = [];
        $.each($("input[name='subject-title']:checked"), function() {
            subjectArray.push($(this).val());
        });
        $.each($("input[name='level-title']:checked"), function() {
            levelArray.push($(this).val());
        });
        $.ajax({
            url: "{{ route('filter.tutors') }}?page=" + page2,
            type: "GET",
            data: {
                'subject': subjectArray,
                'level': levelArray,
                'page': page2
            },
            success: function(res) {
                setData(res, 'filter');
            }

        })
    }

    function setData(response, typ)
    {
        var tutor_res2 = '';
        $('.btn-search-tutore').removeAttr('disabled');
        if(typ=='search')
        {
            $('.load-more-btn').html('<b>Load More</b>');
            $('.load-more-btn2').hide();
        }
        if(typ=='filter')
        {
            $('.load-more-btn').hide();
            $('.load-more-btn2').html('<b>Load More</b>');
        }
        $('#ttcount').text('('+response.count+')');
        var json = response.data.data;
        if (json.length != 0) {
            $.each(json, function(i, v) {
                var star='';
                var timeC='';
                var dbs='';
                var vid='';
                if(v.total_hrs>0)
                {
                    timeC='<i class="zmdi zmdi-time ml-3"></i> '+v.total_hrs+'hrs';
                }
                if(v.valid_dbs==1 || v.valid_dbs=='1')
                {
                    dbs='<i class="zmdi zmdi-shield-check ml-3" title="DBS Checked"></i> ';
                }
                if(v.star>0 && v.totalReview>0)
                {
                    var starRate=v.star/v.totalReview;
                    star='<span style="font-size:15px; color:green"><i class="zmdi zmdi-star ml-3"></i> '+starRate+' ('+v.totalReview+' reviews)</span>';
                }
                var educations ='';
                if(v.tutorUniversityDetails.length>0)
                {
                    $.each(v.tutorUniversityDetails, function(j, l) {
                        educations+='<br><b style="font-weight:bold">'+l.university_name+': </b>'+l.qualification;
                    });
                }

                if(v.video!='' && v.video!=null)
                {
                    var vid='<video class="tvid" controls controlslist="nodownload"><source src="'+v.video+'" type="video/mp4">Your browser does not support the video tag.</video>';
                }
                var bookBtn = '<a href="'+v.url+'" class="button-default mb-2" style="padding:10px 20px; border-radius:10px">Book '+v.first_name+'</a>';
                var dupD='<p class="mb-2" style="font-size:16px">'+v.title+'</p><p class="mb-2" style="font-size:16px"><i class="zmdi zmdi-graduation-cap"></i> Education: '+educations+'</p>';
                tutor_res2 += '<div class="col-md-12 mb-3"><div style="background-color:#f6f6f6; border-radius:15px; padding:20px"><div class="row"><div class="col-md-3 col-sm-4 mob40" style="text-align:center;"><img alt="" src="'+v.profile_photo+'" onerror="imgError(this)" style="max-height:170px; width:auto; max-width:100%; border-radius:10px; border:solid 3px #107dc2"><p style="font-size:14px; margin-top:5px"><i class="zmdi zmdi-pin-drop"></i> '+v.city+'</p></div><div class="col-md-6 col-sm-8 mob60" style="padding-left: 0;"><h4 class="mb-2">'+v.first_name+' <span style="font-size:15px">'+dbs+timeC+'</span>'+star+'</span></h4><p class="mb-2 tp">'+v.subject_name+'</p><div class="showOnlyMob">'+bookBtn+'</div><div class="showOnlyWeb">'+dupD+bookBtn+'</div></div><div class="col-md-3 showOnlyWeb">'+vid+'</div><div class="showOnlyMob">'+dupD+'</div></div></div></div>';
            })
        } else {
            tutor_res2 = "<center>No record available</center>"; 
        }
        $("#res_tutor_id2").append(tutor_res2);
        if (response.data.data.length == 0) {
            $('.load-more-btn').hide();
            $('.load-more-btn2').hide();
            return;
        }
        if (response.data.last_page == page) {
            $('.load-more-btn').hide();
            $('.load-more-btn2').hide();
            return;
        }
        if(typ=='search')
        {
            $('.load-more-btn').show();
            $('.load-more-btn2').hide();
        }
        if(typ=='filter')
        {
            $('.load-more-btn').hide();
            $('.load-more-btn2').show();
        }
    }
</script>
@if(!empty($subId))
    <script type="text/javascript">
        removeData();
    </script>
@endif
@endsection