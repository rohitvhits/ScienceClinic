    <!--begin::Footer-->

    <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">

        <!--begin::Container-->

        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center">

            <!--begin::Copyright-->

            <div class="text-dark order-2 order-md-1">

                <span class="text-muted font-weight-bold">{{ date('Y')}}©</span>
                @if(Auth::user()->type == 2)
                <a href="{{URL::to('tutor-dashboard')}}" class="text-dark-75 text-hover-primary">Science Clinic</a>
                @elseif(Auth::user()->type == 3)
                <a href="{{URL::to('parent-dashboard')}}" class="text-dark-75 text-hover-primary">Science Clinic</a>
                @elseif(Auth::user()->type == 1)
                <a href="{{URL::to('admin')}}" class="text-dark-75 text-hover-primary">Science Clinic</a>
                @else
                <a href="{{URL::to('/')}}" class="text-dark-75 text-hover-primary">Science Clinic</a>
                @endif
            </div>

            <!--end::Copyright-->

            <!--begin::Nav-->

            <div class="nav nav-dark">



            </div>

            <!--end::Nav-->

        </div>

        <!--end::Container-->

    </div>
    <!--end::Footer-->