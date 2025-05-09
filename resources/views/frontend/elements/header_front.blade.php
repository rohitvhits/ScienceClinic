<div class="fixed top-0 left-0 w-full">
    <div class="topbarBackgroundColor py-3">
        <div class="container-fluid">
            <div class="headerTop">
                <div class="">
                    <a href="tel:07572505997">
                        <img class="w-[31px] h-[31px]" src="{{ url('front/img/icon/whatsapp.svg') }}" alt="" />
                        07572505997
                    </a>
                </div>
                <div class="">
                    <a href="tel:01245201083">
                        <img class="w-[31px] h-[31px]" src="{{ url('front/img/icon/call.svg') }}" alt="" />
                        01245201083
                    </a>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="header-logo-menu">
            <div class="container-fluid">
                <div class="row align-items-center">

                    <div class="col-md-2 col-4">
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('front/img/newimages/logo.png') }}"
                                    alt="EDUCAT" /></a>
                        </div>
                    </div>

                    <div class="col-md-10 col-8">
                        <div class="header-mobile">
                            <div class="header-mob">
                                <a class="">
                                    <img src="{{url('front/img/icon/reviewBtn.png')}}" style="height:50px" alt="">
                                </a>
                                <a href="{{ url('register-student') }}" class="htBtn">
                                    <img src="{{url('front/img/icon/adduser.png')}}" alt="">
                                    <span>
                                        Register as a Student
                                    </span>
                                </a>
                                <a href="{{ route('find-tutor') }}" class="htBtn">
                                    <img src="{{url('front/img/icon/wpf_search.png')}}" alt="">
                                    <span>
                                        Request a Tutor
                                    </span>
                                </a>
                                <a href="{{ route('become-tutor.index') }}" class="htBtn">
                                    <img src="{{url('front/img/icon/user.png')}}" alt="">
                                    <span>
                                        Become a Tutor
                                    </span>
                                </a>
                                <div class="dropdown">
                                    <button class="htBtn blue dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{url('front/img/icon/solar_key-bold.png')}}" alt="">
                                        <span>
                                            Sign In
                                        </span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('tutor-login') }}">Tutor Login</a>
                                        <a class="dropdown-item" href="{{ route('parent-login') }}">Parent Login</a>
                                        <a class="dropdown-item" href="{{ route('login') }}">Admin Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overlay-section mobile-show" id="overlays"></div>

                        <div class="mainmenu-area mobile-show pull-right">
                            <div class="mainmenu d-none d-lg-block">
                                <nav>
                                    <ul id="nav" class="menu-white border-full border-bottom-ul">
                                        <li
                                            class="{{ Request::segment(1) == 'find-tutor' ? 'menu-item-active-front active' : '' }}">
                                            <a href="{{ route('find-tutor') }}">Find a Tutor</a>
                                        </li>
                                        <li class="@if(Request::segment(1) == 'subject' || Request::segment(1) == 'sub-subject') menu-item-active-front active @endif"
                                            id="tutor-by-subject">
                                            <a href="javascript:void(0)">
                                                Tutor by subject
                                                <i class="fa fa-angle-down mmbtns" aria-hidden="true"></i>
                                            </a>
                                            <div class="megamenu">
                                                <ul class="sub-menu mobile-section border-bottom-ul">
                                                    @if(isset($subject_list_new))
                                                    @foreach($subject_list_new->slice(0, 14) as $subject)
                                                        <li>
                                                            <a href="{{ $subject->url }}">{{ \Illuminate\Support\Str::lower($subject->main_title) }}</a>
                                                        </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                                <ul class="sub-menu mobile-section border-bottom-ul">

                                                    @if(isset($subject_list_new))
                                                    @foreach($subject_list_new->slice(15, 29) as $subject)
                                                        <li>
                                                            <a href="{{ $subject->url }}">{{ \Illuminate\Support\Str::lower($subject->main_title) }}</a>
                                                        </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                                <ul class="sub-menu mobile-section border-bottom-ul">
                                                    @if(isset($subject_list_new))
                                                    @foreach($subject_list_new->slice(30, 45) as $subject)
                                                        <li>
                                                            <a href="{{ $subject->url }}">{{ \Illuminate\Support\Str::lower($subject->main_title) }}</a>
                                                        </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                                {{-- <ul class="sub-menu mobile-section border-bottom-ul">
                                                    <li>
                                                        <a href="">GCSE Tutors</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('accounting-tution') }}">
                                                            Accounting Tutors
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            Arabic Tutors
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('biology-tution') }}">
                                                            Biology Tutors
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('business-studies-tuition') }}">
                                                            Business Studies Tutors
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('chemistry-tuition') }}">
                                                            Chemistry Tutors
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('computer-science') }}">
                                                            Computer Science Tutors
                                                        </a>
                                                    </li>
                                                    <li><a href="">Finance Tutors</a></li>
                                                    <li><a href="">Chinese Tutors</a></li>
                                                    <li><a href="">A-Level Tutors</a></li>
                                                </ul>
                                                <ul class="sub-menu mobile-section border-bottom-ul">
                                                    <li>
                                                        <a href="">Economic Tutors</a>
                                                    </li>
                                                    <li>
                                                        <a href="">English Tutors</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('french-tuition') }}">French Tutors</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('geography-tuition') }}">
                                                            Geography Tutors
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('german-tuition') }}">German Tutors</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('history-tuition') }}">
                                                            History Tutors
                                                        </a>
                                                    </li>
                                                    <li><a href="{{ route('law-tuition') }}">Law Tutors</a></li>
                                                    <li><a href="{{ route('mathematics-tuition') }}">Mathematics
                                                            Tutors</a></li>
                                                </ul>
                                                <ul class="sub-menu mobile-section border-bottom-ul">
                                                    <li><a href="{{ route('11-common-entrance-exam') }}">11 Plus
                                                            Tutors</a></li>
                                                    <li>
                                                        <a href="{{ route('primary-school') }}">
                                                            KS2 and KS1 Tutors
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('physics-tuition')}}">Physics Tutors</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('politics-tution') }}">
                                                            Politics Tutors
                                                        </a>
                                                    </li>
                                                    <li><a href="{{ route('psychology-tuition') }}">Psychology
                                                            Tutors</a></li>
                                                    <li><a href="">Religious Studies</a></li>
                                                    <li><a href="">Science Tutors</a></li>
                                                    <li>
                                                        <a href="{{ route('sociology-tution') }}">Sociology Tutors</a>
                                                    </li>
                                                    <li><a href="{{ route('spanish-tuition') }}">Spanish Tutors</a>
                                                    </li>
                                                </ul> --}}
                                            </div>
                                            <!-- <div class="megamenu">
                                                {{-- First Column --}}
                                                <ul class="sub-menu mobile-section border-bottom-ul">
                                                    <li><a href="{{ route('mathematics-tuition') }}">Mathematics</a>
                                                    </li>
                                                    <li><a href="{{ route('english-language-literature-tuition') }}">English
                                                            Language</a></li>
                                                    <li><a href="{{ route('english-language-literature-tuition') }}">English
                                                            Literature</a></li>
                                                    <li><a href="{{ route('biology-tution') }}">Biology</a></li>
                                                    <li><a href="{{ route('chemistry-tuition') }}">Chemistry</a></li>
                                                    <li><a href="{{ route('physics-tuition') }}">Physics</a></li>
                                                    <li><a href="{{ route('geography-tuition') }}">History Geography</a>
                                                    </li>
                                                    <li><a href="">Finance</a></li>
                                                    <li><a href="">Economics</a></li>
                                                    <li><a href="">French</a></li>
                                                </ul>

                                                {{-- Second Column --}}
                                                <ul class="sub-menu mobile-section border-bottom-ul">
                                                    <li><a href="{{ route('law-tuition') }}">Law</a></li>
                                                    <li><a href="{{ route('spanish-tuition') }}">Spanish</a></li>
                                                    <li><a href="{{ route('german-tuition') }}">German</a></li>
                                                    <li><a href="{{ route('business-studies-tuition') }}">Business
                                                            Studies</a></li>
                                                    <li><a href="{{ route('computer-science') }}">Computer Science</a>
                                                    </li>
                                                    <li><a href="{{ route('combined-sciences-tuition') }}">Combined
                                                            Science</a></li>
                                                    <li><a href="">Further Maths</a></li>
                                                    <li><a href="">Italian</a></li>
                                                    <li><a href="">BTEC</a></li>
                                                    <li><a href="">ICT</a></li>
                                                    <li><a href="">Health & Social Care</a></li>
                                                    <li><a href="">ACCA</a></li>
                                                    <li><a href="">AAT</a></li>
                                                </ul>

                                                {{-- Third Column --}}
                                                <ul class="sub-menu mobile-section border-bottom-ul">
                                                    <li><a href="">DRAMA</a></li>
                                                    <li><a href="{{ route('accounting-tution') }}">Accounting</a></li>
                                                    <li><a href="">Arabic</a></li>
                                                    <li><a href="{{ route('11-common-entrance-exam') }}">11 PLUS</a>
                                                    </li>
                                                    <li><a href="">ESL</a></li>
                                                    <li><a href="">Mandarine Chinese</a></li>
                                                    <li><a href="{{ route('politics-tution') }}">Politics</a></li>
                                                    <li><a href="{{ route('sociology-tution') }}">Sociology</a></li>
                                                    <li><a href="{{ route('psychology-tuition') }}">Psychology</a></li>
                                                    <li><a href="">PE</a></li>
                                                    <li><a href="">Russian</a></li>
                                                    <li><a href="">Mechanics</a></li>
                                                    <li><a href="">Engineering</a></li>
                                                </ul>
                                            </div> -->
                                        </li>
                                        <li
                                            class="{{ Request::segment(1) == 'become-tutor' ? 'menu-item-active-front active' : '' }}">
                                            <a href="{{route('become-tutor.index')}}">Become a Tutor</a>
                                        </li>
                                        <li class="{{ Request::segment(1) == 'inspiring-online-tutoring' ? 'menu-item-active-front active' : '' }}"
                                            id="tutor-sub">
                                            <a href="{{route('inspiring-online-tutoring')}}">Online Tutoring</a>
                                        </li>
                                        <li class="@if(Request::segment(1) =='subject' || Request::segment(1) =='sub-subject') menu-item-active-front active @endif"
                                            id="subject-sub">
                                            <a href="javascript:void(0)">
                                                Subjects
                                                <i class="fa fa-angle-down mmbtns" aria-hidden="true"></i>
                                            </a>
                                            <div class="megamenu">
                                                <ul class="sub-menu mobile-section border-bottom-ul">
                                                    <li>
                                                        <a href="javascript:void(0)">Sciences<i
                                                                class="zmdi zmdi-chevron-right"></i></a>
                                                        <ul class="inside-menu inside-menus-sec">
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'biology-tution'
                                                                )
                                                            }}">Biology</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'chemistry-tuition'
                                                                )
                                                            }}">Chemistry</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'combined-sciences-tuition'
                                                                )
                                                            }}">Combined
                                                                    Sciences</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'physics-tuition'
                                                                )
                                                            }}">Physics</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'igcse-science'
                                                                )
                                                            }}">IGCSE Science</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="{{
                                                        route(
                                                            'english-language-literature-tuition'
                                                        )
                                                    }}">English Language &
                                                            Literature</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{
                                                        route(
                                                            'mathematics-tuition'
                                                        )
                                                    }}">Mathematics Tuition</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Bussiness
                                                            <i class="zmdi zmdi-chevron-right"></i></a>
                                                        <ul class="inside-menu inside-menus-sec">
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'business-studies-tuition'
                                                                )
                                                            }}">Business Studies
                                                                    Tuition</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'accounting-tution'
                                                                )
                                                            }}">Accounting
                                                                    Tuition</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="{{
                                                        route(
                                                            'computer-science'
                                                        )
                                                    }}">Computer Science Tuition</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Humanities & Social
                                                            Sciences
                                                            <i class="zmdi zmdi-chevron-right"></i></a>
                                                        <ul class="inside-menu inside-menus-sec">
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'geography-tuition'
                                                                )
                                                            }}">Geography
                                                                    Tuition</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'history-tuition'
                                                                )
                                                            }}">History Tuition</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'law-tuition'
                                                                )
                                                            }}">Law Tuition</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'sociology-tution'
                                                                )
                                                            }}">Sociology
                                                                    Tuition</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'psychology-tuition'
                                                                )
                                                            }}">Psychology
                                                                    Tuition</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'philosophy-tuition'
                                                                )
                                                            }}">Philosophy
                                                                    Tuition</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'politics-tution'
                                                                )
                                                            }}">Politics Tuition</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Modern Languages<i
                                                                class="zmdi zmdi-chevron-right"></i></a>
                                                        <ul class="inside-menu inside-menus-sec">
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'spanish-tuition'
                                                                )
                                                            }}">Spanish Tuition</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'french-tuition'
                                                                )
                                                            }}">French Tuition</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'german-tuition'
                                                                )
                                                            }}">German tuition</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{
                                                                route(
                                                                    'latin-tuition'
                                                                )
                                                            }}">Latin Tuition</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="{{
                                                        route(
                                                            '11-common-entrance-exam'
                                                        )
                                                    }}">11 plus & common entrance
                                                            exams</a>
                                                    </li>

                                                    <li>
                                                        <a href="{{
                                                        route('primary-school')
                                                    }}">Primary School (KS1 & KS2)
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="text-none @if(Request::segment(1) =='E-Learning' || Request::segment(1) =='past-papers-resources' || Request::segment(1) =='textbook-parent-login') menu-item-active-front active @endif"
                                            id="tutor-sub">
                                            <a href="javascript:void(0)">
                                                Resources Hub<i class="fa fa-angle-down mmbtns"
                                                    aria-hidden="true"></i></a>

                                            <ul class="sub-menu mobile-section border-bottom-ul">
                                                <li>
                                                    <a href="https://www.edplace.com/student/" target="_blank">Online
                                                        Homework</a>
                                                </li>

                                                <li>
                                                    <a href="https://scienceclinicltd.sharepoint.com/sites/ScienceClinicTeachingResources"
                                                        target="_blank">Resource Library</a>
                                                </li>

                                                <li>
                                                    <a href="https://cognitoedu.org/home#0" target="_blank">Maths &
                                                        Science Lessons</a>
                                                </li>
                                                <li>
                                                    <a href="https://www.freesciencelessons.co.uk/"
                                                        target="_blank">Science Revision Lessons</a>
                                                </li>
                                                <li>
                                                    @auth('parent')
                                                    <a href="{{
                                                        route(
                                                            'parent-e-learning'
                                                        )
                                                    }}">E-Learning</a>
                                                    @else
                                                    <a href="{{
                                                        route('E-Learning')
                                                    }}">E-Learning</a>
                                                    @endauth
                                                </li>
                                                <li>
                                                    <a href="{{
                                                        route(
                                                            'past-papers-resources'
                                                        )
                                                    }}">Past Paper</a>
                                                </li>
                                                <li>
                                                    @auth('parent')
                                                    <a href="{{
                                                        route(
                                                            'parent-text-books'
                                                        )
                                                    }}">Text Books</a>
                                                    @else
                                                    <a href="{{
                                                        route('text-books')
                                                    }}">Text Books</a>
                                                    @endauth
                                                </li>

                                            </ul>
                                        </li>
                                        <li
                                            class="{{ Request::segment(1) == 'about' ? 'menu-item-active-front active' : '' }}">
                                            <a href="{{ route('about') }}">About</a>
                                        </li>
                                        <li class="text-none @if(Request::segment(1) =='contact' || Request::segment(1) == 'blog') menu-item-active-front active @endif"
                                            id="tutor-sub">
                                            <a href="{{ route('contact.index') }}">Contact</a>
                                            <ul class="sub-menu mobile-section border-bottom-ul">
                                                <li>
                                                    <a href="{{ route('blog') }}">Blog</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="text-none @if(Request::segment(1) =='tutors') menu-item-active-front active @endif"
                                            id="tutor-sub">
                                            <a href="{{ route('tutors') }}">All Tutors</a>
                                        </li>
                                        <!-- <li class="text-none d-md-none">
                                            <a href="javascript:void(0)">Subjects <i class="fa fa-angle-down mmbtns"
                                                    aria-hidden="true"></i></a>
                                            <ul class="sub-menu mobile-section border-bottom-ul">
                                                @foreach($allSubjects as $subject)
                                                <li>
                                                    <a href="{{$subject->url}}">{{$subject->main_title}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li> -->
                                        <!-- <li class="text-none @if(Request::segment(1) =='tutors') menu-item-active-front active @endif"
                                            id="tutor-sub">
                                            <a href="{{ route('tutors') }}">Our Tutors</a>
                                        </li>
                                        <li class="{{ Request::segment(1) == 'inspiring-online-tutoring' ? 'menu-item-active-front active' : '' }}"
                                            id="tutor-sub">
                                            <a href="{{
                                                route(
                                                    'inspiring-online-tutoring'
                                                )
                                            }}">Online Tutoring</a>
                                        </li>
                                        <li class="@if(Request::segment(1) =='subject' || Request::segment(1) =='sub-subject') menu-item-active-front active @endif"
                                            id="subject-sub">
                                            <a href="javascript:void(0)">Subjects</a>
                                            <ul class="sub-menu mobile-section border-bottom-ul">
                                                <li>
                                                    <a href="javascript:void(0)">Sciences<i
                                                            class="zmdi zmdi-chevron-right"></i></a>
                                                    <ul class="inside-menu inside-menus-sec">
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'biology-tution'
                                                                )
                                                            }}">Biology</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'chemistry-tuition'
                                                                )
                                                            }}">Chemistry</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'combined-sciences-tuition'
                                                                )
                                                            }}">Combined
                                                                Sciences</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'physics-tuition'
                                                                )
                                                            }}">Physics</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'igcse-science'
                                                                )
                                                            }}">IGCSE Science</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{{
                                                        route(
                                                            'english-language-literature-tuition'
                                                        )
                                                    }}">English Language &
                                                        Literature</a>
                                                </li>
                                                <li>
                                                    <a href="{{
                                                        route(
                                                            'mathematics-tuition'
                                                        )
                                                    }}">Mathematics Tuition</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Bussiness
                                                        <i class="zmdi zmdi-chevron-right"></i></a>
                                                    <ul class="inside-menu inside-menus-sec">
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'business-studies-tuition'
                                                                )
                                                            }}">Business Studies
                                                                Tuition</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'accounting-tution'
                                                                )
                                                            }}">Accounting
                                                                Tuition</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{{
                                                        route(
                                                            'computer-science'
                                                        )
                                                    }}">Computer Science Tuition</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Humanities & Social
                                                        Sciences
                                                        <i class="zmdi zmdi-chevron-right"></i></a>
                                                    <ul class="inside-menu inside-menus-sec">
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'geography-tuition'
                                                                )
                                                            }}">Geography
                                                                Tuition</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'history-tuition'
                                                                )
                                                            }}">History Tuition</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'law-tuition'
                                                                )
                                                            }}">Law Tuition</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'sociology-tution'
                                                                )
                                                            }}">Sociology
                                                                Tuition</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'psychology-tuition'
                                                                )
                                                            }}">Psychology
                                                                Tuition</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'philosophy-tuition'
                                                                )
                                                            }}">Philosophy
                                                                Tuition</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'politics-tution'
                                                                )
                                                            }}">Politics Tuition</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Modern Languages<i
                                                            class="zmdi zmdi-chevron-right"></i></a>
                                                    <ul class="inside-menu inside-menus-sec">
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'spanish-tuition'
                                                                )
                                                            }}">Spanish Tuition</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'french-tuition'
                                                                )
                                                            }}">French Tuition</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'german-tuition'
                                                                )
                                                            }}">German tuition</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{
                                                                route(
                                                                    'latin-tuition'
                                                                )
                                                            }}">Latin Tuition</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{{
                                                        route(
                                                            '11-common-entrance-exam'
                                                        )
                                                    }}">11 plus & common entrance
                                                        exams</a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                        route('primary-school')
                                                    }}">Primary School (KS1 & KS2)
                                                    </a>
                                                </li>
                                            </ul>
                                            <i class="fa fa-angle-down mmbtns" aria-hidden="true"></i>
                                        </li>
                                        <li class="text-none @if(Request::segment(1) =='tutor-login' || Request::segment(1) =='parent-login' || Request::segment(1) =='login')) menu-item-active-front active @endif"
                                            id="tutor-sub">
                                            <a href="javascript:void(0)">Login</a>

                                            <ul class="sub-menu mobile-section border-bottom-ul">
                                                <li>
                                                    <a href="{{
                                                        route('tutor-login')
                                                    }}">Tutor Login</a>
                                                </li>

                                                <li>
                                                    <a href="{{
                                                        route('parent-login')
                                                    }}">
                                                        Parent Login
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('login') }}">
                                                        Admin Login
                                                    </a>
                                                </li>
                                            </ul>

                                            <i class="fa fa-angle-down mmbtns" aria-hidden="true"></i>
                                        </li> -->
                                    </ul>
                                </nav>
                                <div class="d-md-none header_icons">
                                    <a href="{{ url('register-student') }}" class="header_icon_btn">
                                        <img src="{{url('front/img/icon/adduser.png')}}" alt="">
                                        <span>
                                            Register as a Student
                                        </span>
                                    </a>
                                    <a href="{{ route('find-tutor') }}" class="header_icon_btn">
                                        <img src="{{url('front/img/icon/wpf_search.png')}}" alt="">
                                        <span>
                                            Request a Tutor
                                        </span>
                                    </a>
                                    <a href="{{ route('become-tutor.index') }}" class="header_icon_btn">
                                        <img src="{{url('front/img/icon/user.png')}}" alt="">
                                        <span>
                                            Become a Tutor
                                        </span>
                                    </a>
                                    <div class="dropdown">
                                        <button class="header_icon_btn blue dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <img src="{{url('front/img/icon/solar_key-bold.png')}}" alt="">
                                            <span>
                                                Sign In
                                            </span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('tutor-login') }}">Tutor Login</a>
                                            <a class="dropdown-item" href="{{ route('parent-login') }}">Parent Login</a>
                                            <a class="dropdown-item" href="{{ route('login') }}">Admin Login</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="rating_btn d-md-none">
                                    <img src="{{url('front/img/icon/reviewBtn.png')}}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="mobile-menus">
                            <div class="menu-collapse pull-right">
                                <a href="{{ url('register-student') }}" class="st-mob">
                                    <svg height="35px" width="35px" version="1.1" id="_x32_"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve" fill="#3699FF">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <style type="text/css">
                                            .st0 {
                                                fill: #3699ff;
                                            }
                                            </style>
                                            <g>
                                                <path class="st0"
                                                    d="M473.61,63.16L276.16,2.927C269.788,0.986,263.004,0,256.001,0c-7.005,0-13.789,0.986-20.161,2.927 L38.386,63.16c-3.457,1.064-5.689,3.509-5.689,6.25c0,2.74,2.232,5.186,5.691,6.25l91.401,27.88v77.228 c0.023,39.93,13.598,78.284,38.224,107.981c11.834,14.254,25.454,25.574,40.483,33.633c15.941,8.564,32.469,12.904,49.124,12.904 c16.646,0,33.176-4.34,49.126-12.904c22.597-12.143,42.04-31.646,56.226-56.39c14.699-25.683,22.471-55.155,22.478-85.224v-78.214 l45.244-13.804v64.192c-6.2,0.784-11.007,6.095-11.007,12.5c0,5.574,3.649,10.404,8.872,12.011l-9.596,63.315 c-0.235,1.576,0.223,3.168,1.262,4.386c1.042,1.204,2.554,1.902,4.148,1.902h36.273c1.592,0,3.104-0.699,4.148-1.91 c1.036-1.203,1.496-2.803,1.262-4.386l-9.596-63.307c5.223-1.607,8.872-6.436,8.872-12.011c0-6.405-4.81-11.716-11.011-12.5V81.544 l19.292-5.885c3.457-1.064,5.691-3.517,5.691-6.25C479.303,66.677,477.069,64.223,473.61,63.16z M257.62,297.871 c-10.413,0-20.994-2.842-31.448-8.455c-16.194-8.649-30.908-23.564-41.438-42.011c-4.854-8.478-8.796-17.702-11.729-27.445 c60.877-10.776,98.51-49.379,119.739-80.97c10.242,20.776,27.661,46.754,54.227,58.648c-3.121,24.984-13.228,48.812-28.532,67.212 c-8.616,10.404-18.773,18.898-29.375,24.573C278.606,295.029,268.025,297.871,257.62,297.871z">
                                                </path>
                                                <path class="st0"
                                                    d="M373.786,314.23l-1.004-0.629l-110.533,97.274L151.714,313.6l-1.004,0.629 c-36.853,23.036-76.02,85.652-76.02,156.326v0.955l0.846,0.45C76.291,472.365,152.428,512,262.249,512 c109.819,0,185.958-39.635,186.712-40.038l0.846-0.45v-0.955C449.808,399.881,410.639,337.265,373.786,314.23z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <button class="btn btn-collapse" id="menu">
                                    <img src="{{ asset('front/img/svg/menu.png') }}" alt="menu" class="menu-img" />
                                </button>
                            </div>
                        </div>

                        <div class="mobile-search-baar">
                            <div class="search">
                                <div class="search-form">
                                    <form id="search-form" action="#">
                                        <input type="search" placeholder="Search here..." name="search" />

                                        <button type="submit">
                                            <span><i class="fa fa-search"></i></span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
