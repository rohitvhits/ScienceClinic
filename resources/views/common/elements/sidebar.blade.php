<!--begin::Aside-->

<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">

    <!--begin::Brand-->

    <div class="brand flex-column-auto" id="kt_brand">

        <!--begin::Logo-->

        <a href="{{ url('/admin')}}" class="brand-logo">

            <img class="header-logo" alt="Logo" src="{{ asset('front/img/logo2.svg') }}" />

        </a>

        <!--end::Logo-->

        <!--begin::Toggle-->

        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">

            <span class="svg-icon svg-icon svg-icon-xl">



                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                        <polygon points="0 0 24 0 24 24 0 24" />

                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />

                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />

                    </g>

                </svg>

                <!--end::Svg Icon-->

            </span>

        </button>

        <!--end::Toolbar-->

    </div>

    <!--end::Brand-->

    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        <!--begin::Menu Container-->

        <div id="kt_aside_menu" class="aside-menu my-4 scroll ps ps--active-y" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500" style="height: 285px; overflow: hidden;">

            <!--begin::Menu Nav-->

            @if(Auth::user()->type == 2)
            <ul class="menu-nav">

                <li class="menu-item {{ Request::segment(1) == 'tutor-dashboard' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('tutor-dashboard') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Home.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Dashboard</span>

                    </a>

                </li>
                <li class="menu-item {{ Request::segment(1) == 'dbs' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('dbs') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_429_11195)"> <path d="M15 22L14.3066 23.0401C14.6902 23.2958 15.1834 23.3196 15.5898 23.1021C15.9963 22.8846 16.25 22.461 16.25 22H15ZM12 20L12.6934 18.96C12.2735 18.68 11.7265 18.68 11.3066 18.96L12 20ZM9.00002 22H7.75002C7.75002 22.461 8.00375 22.8846 8.41019 23.1021C8.81664 23.3196 9.30982 23.2958 9.69339 23.0401L9.00002 22ZM8.75086 3.53713L8.65048 4.7831L8.75086 3.53713ZM10.4347 2.83967L9.48267 2.02962L9.48267 2.02962L10.4347 2.83967ZM6.53191 5.68606L5.28595 5.78644L6.53191 5.68606ZM8.68606 3.53191L8.78644 2.28595L8.68606 3.53191ZM5.83967 7.43468L6.64972 8.38669L6.64972 8.38668L5.83967 7.43468ZM6.53713 5.75086L7.7831 5.65048L6.53713 5.75086ZM5.79016 10.5232L4.98011 11.4752L4.98012 11.4752L5.79016 10.5232ZM5.79016 7.4768L4.98012 6.52479L4.98011 6.5248L5.79016 7.4768ZM6.53713 12.2492L5.29117 12.1488L5.29117 12.1488L6.53713 12.2492ZM5.83967 10.5654L6.64972 9.61335L6.64972 9.61334L5.83967 10.5654ZM8.68606 14.4681L8.78644 15.7141H8.78644L8.68606 14.4681ZM6.53191 12.314L7.77788 12.4143L7.77788 12.4143L6.53191 12.314ZM10.4347 15.1604L11.3867 14.3503L11.3867 14.3503L10.4347 15.1604ZM8.75086 14.4629L8.65048 13.2169H8.65048L8.75086 14.4629ZM13.5232 15.2099L14.4752 16.0199L14.4752 16.0199L13.5232 15.2099ZM10.4768 15.2099L9.52479 16.0199L9.5248 16.0199L10.4768 15.2099ZM15.2492 14.4629L15.3496 13.2169H15.3496L15.2492 14.4629ZM13.5654 15.1604L12.6133 14.3503L12.6133 14.3503L13.5654 15.1604ZM17.4681 12.314L18.7141 12.2136V12.2136L17.4681 12.314ZM15.314 14.4681L15.2136 15.7141H15.2136L15.314 14.4681ZM18.1604 10.5654L18.9704 11.5174L18.9704 11.5174L18.1604 10.5654ZM17.4629 12.2492L16.2169 12.3496V12.3496L17.4629 12.2492ZM18.2099 7.4768L19.0199 6.5248L19.0199 6.5248L18.2099 7.4768ZM18.2099 10.5232L17.3998 9.57122L17.3998 9.57122L18.2099 10.5232ZM17.4629 5.75086L16.2169 5.65048V5.65048L17.4629 5.75086ZM18.1604 7.43468L17.3503 8.38668L17.3503 8.38668L18.1604 7.43468ZM15.314 3.53191L15.2136 2.28595L15.2136 2.28595L15.314 3.53191ZM17.4681 5.68606L18.7141 5.78644V5.78644L17.4681 5.68606ZM13.5654 2.83967L14.5174 2.02962L14.5174 2.02962L13.5654 2.83967ZM15.2492 3.53713L15.3496 4.7831L15.3496 4.7831L15.2492 3.53713ZM13.5232 2.79016L12.5712 3.60021L12.5712 3.60022L13.5232 2.79016ZM10.4768 2.79016L11.4288 3.60021L11.4288 3.60021L10.4768 2.79016ZM9.00002 14.4584L9.05526 13.2096L9.00002 14.4584ZM15.6934 20.96L12.6934 18.96L11.3066 21.0401L14.3066 23.0401L15.6934 20.96ZM11.3066 18.96L8.30664 20.96L9.69339 23.0401L12.6934 21.0401L11.3066 18.96ZM12.5712 3.60022L12.6134 3.64973L14.5174 2.02962L14.4752 1.98011L12.5712 3.60022ZM15.3496 4.7831L15.4144 4.77788L15.2136 2.28595L15.1488 2.29117L15.3496 4.7831ZM16.2222 5.58568L16.2169 5.65048L18.7089 5.85124L18.7141 5.78644L16.2222 5.58568ZM17.3503 8.38668L17.3998 8.42881L19.0199 6.5248L18.9704 6.48267L17.3503 8.38668ZM17.3998 9.57122L17.3503 9.61335L18.9704 11.5174L19.0199 11.4752L17.3998 9.57122ZM16.2169 12.3496L16.2222 12.4144L18.7141 12.2136L18.7089 12.1488L16.2169 12.3496ZM15.4144 13.2222L15.3496 13.2169L15.1488 15.7089L15.2136 15.7141L15.4144 13.2222ZM12.6133 14.3503L12.5712 14.3998L14.4752 16.0199L14.5174 15.9704L12.6133 14.3503ZM11.4288 14.3998L11.3867 14.3503L9.48266 15.9704L9.52479 16.0199L11.4288 14.3998ZM8.65048 13.2169L8.58568 13.2222L8.78644 15.7141L8.85124 15.7089L8.65048 13.2169ZM7.77788 12.4143L7.7831 12.3495L5.29117 12.1488L5.28595 12.2136L7.77788 12.4143ZM6.64972 9.61334L6.60021 9.57122L4.98012 11.4752L5.02963 11.5174L6.64972 9.61334ZM6.60021 8.42881L6.64972 8.38669L5.02963 6.48266L4.98012 6.52479L6.60021 8.42881ZM7.7831 5.65048L7.77788 5.58568L5.28595 5.78644L5.29117 5.85124L7.7831 5.65048ZM8.58568 4.77788L8.65048 4.7831L8.85124 2.29117L8.78644 2.28595L8.58568 4.77788ZM11.3867 3.64972L11.4288 3.60021L9.5248 1.98011L9.48267 2.02962L11.3867 3.64972ZM8.65048 4.7831C9.69169 4.86698 10.7098 4.44528 11.3867 3.64972L9.48267 2.02962C9.32645 2.21321 9.09152 2.31053 8.85124 2.29117L8.65048 4.7831ZM7.77788 5.58568C7.74077 5.12504 8.12504 4.74077 8.58568 4.77788L8.78644 2.28595C6.79035 2.12514 5.12514 3.79035 5.28595 5.78644L7.77788 5.58568ZM6.64972 8.38668C7.44528 7.70975 7.86698 6.69169 7.7831 5.65048L5.29117 5.85124C5.31053 6.09152 5.21321 6.32645 5.02962 6.48267L6.64972 8.38668ZM6.60021 9.57122C6.24825 9.27174 6.24825 8.72829 6.60021 8.42881L4.98011 6.5248C3.45495 7.82253 3.45495 10.1775 4.98011 11.4752L6.60021 9.57122ZM7.7831 12.3496C7.86698 11.3083 7.44528 10.2903 6.64972 9.61335L5.02962 11.5174C5.21321 11.6736 5.31053 11.9085 5.29117 12.1488L7.7831 12.3496ZM8.58568 13.2222C8.12504 13.2593 7.74077 12.875 7.77788 12.4143L5.28595 12.2136C5.12514 14.2097 6.79035 15.8749 8.78644 15.7141L8.58568 13.2222ZM12.5712 14.3998C12.2717 14.7518 11.7283 14.7518 11.4288 14.3998L9.5248 16.0199C10.8225 17.5451 13.1775 17.5451 14.4752 16.0199L12.5712 14.3998ZM16.2222 12.4143C16.2593 12.875 15.875 13.2593 15.4143 13.2222L15.2136 15.7141C17.2097 15.8749 18.8749 14.2097 18.7141 12.2136L16.2222 12.4143ZM17.3503 9.61335C16.5547 10.2903 16.1331 11.3083 16.2169 12.3496L18.7089 12.1488C18.6895 11.9085 18.7868 11.6736 18.9704 11.5174L17.3503 9.61335ZM17.3998 8.42881C17.7518 8.72829 17.7518 9.27174 17.3998 9.57122L19.0199 11.4752C20.5451 10.1775 20.5451 7.82253 19.0199 6.5248L17.3998 8.42881ZM16.2169 5.65048C16.1331 6.69169 16.5547 7.70975 17.3503 8.38668L18.9704 6.48267C18.7868 6.32645 18.6895 6.09152 18.7089 5.85124L16.2169 5.65048ZM15.4144 4.77788C15.875 4.74077 16.2593 5.12504 16.2222 5.58568L18.7141 5.78644C18.8749 3.79035 17.2097 2.12514 15.2136 2.28595L15.4144 4.77788ZM12.6133 3.64972C13.2903 4.44528 14.3083 4.86698 15.3496 4.7831L15.1488 2.29117C14.9085 2.31053 14.6736 2.21321 14.5174 2.02962L12.6133 3.64972ZM14.4752 1.98011C13.1775 0.454954 10.8225 0.454952 9.5248 1.98011L11.4288 3.60021C11.7283 3.24825 12.2717 3.24825 12.5712 3.60021L14.4752 1.98011ZM11.3867 14.3503C10.7978 13.6583 9.95101 13.2492 9.05526 13.2096L8.94477 15.7072C9.15141 15.7163 9.34686 15.8108 9.48267 15.9704L11.3867 14.3503ZM9.05526 13.2096C8.9211 13.2037 8.78593 13.206 8.65048 13.2169L8.85124 15.7089C8.88266 15.7063 8.91388 15.7058 8.94477 15.7072L9.05526 13.2096ZM10.25 22V14.4584H7.75002V22H10.25ZM15.3496 13.2169C15.2141 13.206 15.0789 13.2037 14.9448 13.2096L15.0553 15.7072C15.0861 15.7058 15.1174 15.7063 15.1488 15.7089L15.3496 13.2169ZM14.9448 13.2096C14.049 13.2492 13.2022 13.6583 12.6133 14.3503L14.5174 15.9704C14.6532 15.8108 14.8486 15.7163 15.0553 15.7072L14.9448 13.2096ZM13.75 14.4584V22H16.25V14.4584H13.75Z" fill="#0f7dc2"></path> <path d="M14 8L11 11L10 10" stroke="#0f7dc2" stroke-width="1.272" stroke-linecap="round" stroke-linejoin="round"></path> </g> <defs> <clipPath id="clip0_429_11195"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g></svg>
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">DBS Check</span>

                    </a>

                </li>

                <li class="menu-item {{ Request::segment(1) == 'tutor-account' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('tutor-account') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Account</span>

                    </a>

                </li>
                
                <li class="menu-item {{ Request::segment(1) == 'tutor-pay-claim-form' ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ url('tutor-pay-claim-form') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <img src="{{asset('front/img/pound-sign.png')}}" style="width: 24px; margin-right: 10px;">
                        </span>
                        <span class="menu-text">Pay Claim Form</span>
                    </a>
                </li>
                <li class="menu-item @if(Request::segment(1) == 'tutor-pay-claim-history' || Request::segment(1) == 'tutor-pay-claim-form-edit') menu-item-active @endif" aria-haspopup="true">
                    <a href="{{ url('tutor-pay-claim-history') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <img src="{{asset('front/img/money.png')}}" style="width: 24px; margin-right: 10px;">
                        </span>
                        <span class="menu-text">Pay Claim History</span>
                    </a>
                </li>

                <li class="menu-item @if (Request::segment(1) == 'tutor-availability' || Request::segment(1) == 'tutor-bookings' || Request::segment(1) == 'tutor-missed-lessons' || Request::segment(1) == 'tutor-offline-booking') menu-item-active @endif" aria-haspopup="true">

                    <a href="{{ route('tutor-availability') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Clock.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3" />
                                        <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Availability & Bookings</span>

                    </a>

                </li>

                <!-- <li class="menu-item {{ Request::segment(1) == 'tutor-profile' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('tutor-profile') }}" class="menu-link">

                        <span class="svg-icon menu-icon">


                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>

                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>

                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>

                                </g>

                            </svg>


                        </span>

                        <span class="menu-text">My Profile</span>

                    </a>

                </li> -->

                <li class="menu-item {{ Request::segment(1) == 'tutor-subject' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('tutor-subject') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/Selected-file.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">My Subjects</span>

                    </a>

                </li>
                <li class="menu-item {{ Request::segment(1) == 'tutor-student' || Request::segment(1) == 'tutor-student-add' || Request::segment(1) == 'tutor-student-edit' ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('tutor-student') }}" class="menu-link">
                        <span class="svg-icon menu-icon svg-icon-primary svg-icon-2x">
                            <svg height="24px" width="24px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve" fill="#3699FF"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#3699FF;} </style> <g> <path class="st0" d="M473.61,63.16L276.16,2.927C269.788,0.986,263.004,0,256.001,0c-7.005,0-13.789,0.986-20.161,2.927 L38.386,63.16c-3.457,1.064-5.689,3.509-5.689,6.25c0,2.74,2.232,5.186,5.691,6.25l91.401,27.88v77.228 c0.023,39.93,13.598,78.284,38.224,107.981c11.834,14.254,25.454,25.574,40.483,33.633c15.941,8.564,32.469,12.904,49.124,12.904 c16.646,0,33.176-4.34,49.126-12.904c22.597-12.143,42.04-31.646,56.226-56.39c14.699-25.683,22.471-55.155,22.478-85.224v-78.214 l45.244-13.804v64.192c-6.2,0.784-11.007,6.095-11.007,12.5c0,5.574,3.649,10.404,8.872,12.011l-9.596,63.315 c-0.235,1.576,0.223,3.168,1.262,4.386c1.042,1.204,2.554,1.902,4.148,1.902h36.273c1.592,0,3.104-0.699,4.148-1.91 c1.036-1.203,1.496-2.803,1.262-4.386l-9.596-63.307c5.223-1.607,8.872-6.436,8.872-12.011c0-6.405-4.81-11.716-11.011-12.5V81.544 l19.292-5.885c3.457-1.064,5.691-3.517,5.691-6.25C479.303,66.677,477.069,64.223,473.61,63.16z M257.62,297.871 c-10.413,0-20.994-2.842-31.448-8.455c-16.194-8.649-30.908-23.564-41.438-42.011c-4.854-8.478-8.796-17.702-11.729-27.445 c60.877-10.776,98.51-49.379,119.739-80.97c10.242,20.776,27.661,46.754,54.227,58.648c-3.121,24.984-13.228,48.812-28.532,67.212 c-8.616,10.404-18.773,18.898-29.375,24.573C278.606,295.029,268.025,297.871,257.62,297.871z"></path> <path class="st0" d="M373.786,314.23l-1.004-0.629l-110.533,97.274L151.714,313.6l-1.004,0.629 c-36.853,23.036-76.02,85.652-76.02,156.326v0.955l0.846,0.45C76.291,472.365,152.428,512,262.249,512 c109.819,0,185.958-39.635,186.712-40.038l0.846-0.45v-0.955C449.808,399.881,410.639,337.265,373.786,314.23z"></path> </g> </g></svg>
                        </span>
                        <span class="menu-text">My Students</span>
                    </a>
                </li>

                <li class="menu-item {{ Request::segment(1) == 'tutor-profile-photo' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('tutor-profile-photo') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Image.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Profile Photo</span>

                    </a>

                </li>
                <li class="menu-item {{ Request::segment(1) == 'tutor-parent-list' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('tutor-parent-list') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Parent List</span>

                    </a>

                </li>
                <li class="menu-item {{ Request::segment(1) == 'tutor-feedback' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('tutor-feedback') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Half-star.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M12,4.25932872 C12.1488635,4.25921584 12.3000368,4.29247316 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 L12,4.25932872 Z" fill="#000000" opacity="0.3" />
                                        <path d="M12,4.25932872 L12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.277344,4.464261 11.6315987,4.25960807 12,4.25932872 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Feedback</span>

                    </a>

                </li>

                <li class="menu-item {{ Request::segment(1) == 'tutor-text-books' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('tutor-text-books.index') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Book-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000" />
                                        <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Text Books</span>

                    </a>

                </li>

                <li class="menu-item {{ Request::segment(1) == 'tutor-support-ticket' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('tutor-support-ticket.index') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Ticket.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z" fill="#000000" opacity="0.3" transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) " />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Support Ticket</span>

                    </a>

                </li>

                <li class="menu-item {{ Request::segment(1) == 'tutor-e-learning' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ url('tutor-e-learning') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Devices/Laptop-macbook.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M5,6 L19,6 C19.5522847,6 20,6.44771525 20,7 L20,17 L4,17 L4,7 C4,6.44771525 4.44771525,6 5,6 Z" fill="#000000" />
                                        <rect fill="#000000" opacity="0.3" x="1" y="18" width="22" height="1" rx="0.5" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">E-Learning</span>

                    </a>

                </li>

                <li class="menu-item {{ Request::segment(1) == 'tutor-past-papers' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ url('tutor-past-papers') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Archive.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Past Papers</span>

                    </a>

                </li>
                <li class="menu-item {{ Request::segment(1) == 'tutor-online-tutoring' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('tutor-online-tutoring') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Devices/Laptop-macbook.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M5,6 L19,6 C19.5522847,6 20,6.44771525 20,7 L20,17 L4,17 L4,7 C4,6.44771525 4.44771525,6 5,6 Z" fill="#000000" />
                                        <rect fill="#000000" opacity="0.3" x="1" y="18" width="22" height="1" rx="0.5" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Online Tutoring</span>

                    </a>

                </li>
            </ul>
            @endif

            @if(Auth::user()->type == 3)
            <ul class="menu-nav">

                <li class="menu-item {{ Request::segment(1) == 'parent-dashboard' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('parent-dashboard') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Home.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Dashboard</span>

                    </a>

                </li>

                <li class="menu-item {{ Request::segment(1) == 'parent-account' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('parent-account') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Account</span>

                    </a>

                </li>
                <li class="menu-item {{ Request::segment(1) == 'bookings' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('booking.index') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Clock.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3" />
                                        <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Bookings</span>

                    </a>

                </li>
                <li class="menu-item {{ Request::segment(1) == 'parent-text-books' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('parent-text-books') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Book-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000" />
                                        <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Text Books</span>

                    </a>

                </li>
                <li class="menu-item {{ Request::segment(1) == 'feedback' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('feedback') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Half-star.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M12,4.25932872 C12.1488635,4.25921584 12.3000368,4.29247316 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 L12,4.25932872 Z" fill="#000000" opacity="0.3" />
                                        <path d="M12,4.25932872 L12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.277344,4.464261 11.6315987,4.25960807 12,4.25932872 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Give a review</span>

                    </a>

                </li>
                <li class="menu-item {{ Request::segment(1) == 'parent-support-ticket' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('parent-support-ticket.index') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Ticket.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z" fill="#000000" opacity="0.3" transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) " />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">Support Ticket</span>

                    </a>

                </li>
                <li class="menu-item {{ Request::segment(1) == 'parent-lesson-payment' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ url('parent-lesson-payment') }}" class="menu-link">

                        <span class="svg-icon svg-icon-primary svg-icon-2x menu-icon">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Wallet.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5" />
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1" />
                                    <path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z" fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>

                        <span class="menu-text">Lesson Payment</span>

                    </a>

                </li>
                <li class="menu-item {{ Request::segment(1) == 'parent-e-learning' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ url('parent-e-learning') }}" class="menu-link">

                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Devices/Laptop-macbook.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M5,6 L19,6 C19.5522847,6 20,6.44771525 20,7 L20,17 L4,17 L4,7 C4,6.44771525 4.44771525,6 5,6 Z" fill="#000000" />
                                        <rect fill="#000000" opacity="0.3" x="1" y="18" width="22" height="1" rx="0.5" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-text">E-Learning</span>

                    </a>

                </li>
                <li class="menu-item {{ Request::segment(1) == 'parent-logout' ? 'menu-item-active' : '' }}" aria-haspopup="true">

                    <a href="{{ route('parent-logout') }}" class="menu-link">

                        <span class="svg-icon svg-icon-primary svg-icon-2x menu-icon">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Sign-out.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) " />
                                    <rect fill="#000000" opacity="0.3" transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) " x="13" y="6" width="2" height="12" rx="1" />
                                    <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) " />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>

                        <span class="menu-text">Log Out</span>

                    </a>

                </li>
            </ul>
            @endif
            <!--end::Menu Nav-->

            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">

                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>

            </div>

            <div class="ps__rail-y" style="top: 0px; height: 285px; right: 4px;">

                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 70px;"></div>

            </div>

        </div>

        <!--end::Menu Container-->

    </div>

</div>

<!--end::Aside-->