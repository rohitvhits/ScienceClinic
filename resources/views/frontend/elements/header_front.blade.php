<header>
    <div class="header-logo-menu sticker fixed">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-12 header-mobile">

                    <div class="header-mob">

                        <a href="tel:07572505997" class="header-number">

                            <div class="header-mob1"><i class="zmdi zmdi-phone mob-color "></i></div> 07572505997

                        </a>

                        <a href="tel:01245352101" class="header-number">01245352101</a>

                    </div>

                </div>

                <div class="col-lg-2 col-md-6 col-6">

                    <div class="logo">

                        <a href="{{ url('/')}}"><img src="{{asset('front/img/logo2.svg')}}" alt="EDUCAT"></a>

                    </div>

                </div>

                <div class="col-lg-10 col-md-6 col-6">

                    <div class="overlay-section mobile-show" id="overlays"> </div>

                    <div class="mainmenu-area mobile-show pull-right">

                        <div class="mainmenu d-none d-lg-block">

                            <nav>



                                <ul id="nav" class="menu-white border-full border-bottom-ul">

                                    <li class="{{ Request::segment(1) == 'inspiring-online-tutoring' ? 'menu-item-active-front active' : '' }}" id="tutor-sub"><a href="{{route('inspiring-online-tutoring')}}">Online Tutoring</a>

                                    </li>

                                    <li class="{{ Request::segment(1) == 'find-tutor' ? 'menu-item-active-front active' : '' }}"><a href="{{ route('find-tutor') }}">Find a Tutor</a></li>

                                    <li class="{{ Request::segment(1) == 'become-tutor' ? 'menu-item-active-front active' : '' }}"><a href="{{route('become-tutor.index')}}">Become a Tutor</a></li>

                                    <li class="@if(Request::segment(1) =='subject' || Request::segment(1) =='sub-subject') menu-item-active-front active @endif" id="subject-sub"><a href="javascript:void(0)">Subjects</a>
                                        <ul class="sub-menu mobile-section border-bottom-ul">
                                            <li><a href="javascript:void(0)">Sciences<i class="zmdi zmdi-chevron-right"></i></a>
                                                <ul class="inside-menu inside-menus-sec">
                                                    <li><a href="{{route('biology-tution')}}">Biology</a></li>
                                                    <li><a href="{{route('chemistry-tuition')}}">Chemistry</a></li>
                                                    <li><a href="{{route('combined-sciences-tuition')}}">Combined
                                                            Sciences</a></li>
                                                    <li><a href="{{route('physics-tuition')}}">Physics</a></li>
                                                    <li><a href="{{route('igcse-science')}}">IGCSE Science</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{route('english-language-literature-tuition')}}">English
                                                    Language & Literature</a>

                                            </li>
                                            <li><a href="{{route('mathematics-tuition')}}">Mathematics Tuition</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Bussiness <i class="zmdi zmdi-chevron-right"></i></a>
                                                <ul class="inside-menu inside-menus-sec">
                                                    <li><a href="{{route('business-studies-tuition')}}">Business Studies
                                                            Tuition</a></li>
                                                    <li><a href="{{route('accounting-tution')}}">Accounting Tuition</a>
                                                    </li>

                                                </ul>

                                            </li>
                                            <li><a href="{{route('computer-science')}}">Computer Science Tuition</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Humanities & Social Sciences <i class="zmdi zmdi-chevron-right"></i></a>
                                                <ul class="inside-menu inside-menus-sec">
                                                    <li><a href="{{route('geography-tuition')}}">Geography Tuition</a>
                                                    </li>
                                                    <li><a href="{{route('history-tuition')}}">History Tuition</a>
                                                    </li>
                                                    <li><a href="{{route('law-tuition')}}">Law Tuition</a></li>
                                                    <li><a href="{{route('sociology-tution')}}">Sociology Tuition</a>
                                                    </li>
                                                    <li><a href="{{route('psychology-tuition')}}">Psychology Tuition</a>
                                                    </li>
                                                    <li><a href="{{route('philosophy-tuition')}}">Philosophy Tuition</a>
                                                    </li>
                                                    <li><a href="{{route('politics-tution')}}">Politics Tuition</a>
                                                    </li>


                                                </ul>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Modern Languages<i class="zmdi zmdi-chevron-right"></i></a>
                                                <ul class="inside-menu inside-menus-sec">
                                                    <li><a href="{{route('spanish-tuition')}}">Spanish Tuition</a>
                                                    </li>
                                                    <li><a href="{{route('french-tuition')}}">French Tuition</a></li>
                                                    <li><a href="{{route('german-tuition')}}">German tuition</a></li>
                                                    <li><a href="{{route('latin-tuition')}}">Latin Tuition</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{route('11-common-entrance-exam')}}">11 plus & common entrance exams</a>
                                            </li>


                                            <li><a href="{{route('primary-school')}}">Primary School (KS1 & KS2) </a>

                                            </li>
                                        </ul>
                                        <i class="fa fa-angle-down mmbtns" aria-hidden="true"></i>
                                    </li>

                                    <li class="text-none @if(Request::segment(1) =='E-Learning' || Request::segment(1) =='past-papers-resources' || Request::segment(1) =='textbook-parent-login') menu-item-active-front active @endif" id="tutor-sub"><a href="javascript:void(0)">Past

                                            Papers & Resources</a>

                                        <ul class="sub-menu mobile-section border-bottom-ul">
                                            <li>
                                                @auth('parent')
                                                <a href="{{route('parent-e-learning')}}">E-Learning</a>
                                                @else
                                                <a href="{{route('E-Learning')}}">E-Learning</a>
                                                @endauth
                                            </li>
                                            <li><a href="{{route('past-papers-resources')}}">Past Paper</a></li>
                                            <li>
                                                @auth('parent')
                                                <a href="{{route('parent-text-books')}}">Text Books</a>
                                                @else
                                                <a href="{{route('text-books')}}">Text Books</a>
                                                @endauth
                                            </li>

                                            <li>

                                                <a href="javascript:void(0)">Educake<i class="zmdi zmdi-chevron-right"></i></a>

                                                <ul class="inside-menu inside-menus-sec">

                                                    <li><a href="https://my.educake.co.uk/teacher-login" target="_blank">Teacher Login</a></li>

                                                    <li><a href="https://my.educake.co.uk/student-login" target="_blank">Student Login</a>

                                                    </li>



                                                </ul>

                                            </li>

                                            <li><a href="https://www.kerboodle.com/users/login" target="_blank">Kerboodle</a></li>

                                            <li><a href="https://login.mymaths.co.uk/login" target="_blank">My Maths</a></li>

                                            <li><a href="https://login.mathletics.com/" target="_blank">Mathletics</a></li>

                                            <li><a href="https://www.pearsonactivelearn.com/app/Home" target="_blank">Active Learn</a></li>

                                            <li><a href="https://scienceclinic.ediface.org/" target="_blank">LMS</a></li>



                                            <li><a href="https://app.doublestruck.eu/?br=EP" target="_blank">Exampro</a></li>

                                        </ul>

                                        <i class="fa fa-angle-down mmbtns" aria-hidden="true"></i>

                                    </li>

                                    <li class="text-none @if(Request::segment(1) =='tutors') menu-item-active-front active @endif" id="tutor-sub"><a href="javascript:void(0)">Our

                                            Tutors</a>

                                        <ul class="sub-menu mobile-section border-bottom-ul">

                                            <li><a href="{{route('tutors')}}">Tutors</a></li>



                                        </ul>



                                        <i class="fa fa-angle-down mmbtns" aria-hidden="true"></i>

                                    </li>



                                    <li class="{{ Request::segment(1) == 'about' ? 'menu-item-active-front active' : '' }}"><a href="{{ route('about')}}">About</a></li>
                                    <li class="text-none @if(Request::segment(1) =='contact' || Request::segment(1) == 'blog') menu-item-active-front active @endif" id="tutor-sub"><a href="{{route('contact.index')}}">Contact</a>
                                        <ul class="sub-menu mobile-section border-bottom-ul">
                                            <li><a href="{{route('blog')}}">Blog</a></li>
                                        </ul>
                                    </li>



                                    <li class="text-none @if(Request::segment(1) =='tutor-login' || Request::segment(1) =='parent-login' || Request::segment(1) =='login')) menu-item-active-front active @endif" id="tutor-sub"><a href="javascript:void(0)">Login</a>

                                        <ul class="sub-menu mobile-section border-bottom-ul">

                                            <li><a href="{{route('tutor-login')}}">Tutor Login</a></li>

                                            <li><a href="{{route('parent-login')}}"> Parent Login </a></li>

                                            <li><a href="{{route('login')}}"> Admin Login </a></li>

                                        </ul>

                                        <i class="fa fa-angle-down mmbtns" aria-hidden="true"></i>

                                    </li>



                                </ul>

                            </nav>

                        </div>

                    </div>

                    <div class="mobile-menus">

                        <div class="menu-collapse pull-right">

                            <button class="btn btn-collapse" id="menu"> <img src="{{asset('front/img/svg/menu.png')}}" alt="menu" class="menu-img"></button>

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

                        <!--End of Search Form-->

                    </div>



                </div>

            </div>

        </div>

    </div>

    <!-- Mobile Menu Area start -->



    <!-- Mobile Menu Area end -->

</header>