<style>
    .dropdown-menu.dropdown-menu-md {
        width: 175px;
        min-width: 175px;
    }
    .dropdown-menu-right{
        transform: translate3d(0px, 65px, 0px)!important;
    }
</style>
<div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between ">
    <div class="d-flex">
        <div class="aiz-topbar-nav-toggler d-flex align-items-center justify-content-start mr-2 mr-md-3 ml-0" data-toggle="aiz-mobile-nav">
            <button class="aiz-mobile-toggler">
                <span></span>
            </button>
        </div>
    </div>
    <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown show">
                    <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="true">
                        <span class="d-flex align-items-center">
                            <span class="avatar avatar-sm mr-md-2">
                                <img src="{{ asset('assets/img/avatar-place.png') }}" >
                            </span>
                            <span class="d-none d-md-block">
                                <span class="d-block fw-500">{{Auth::user()->name}}</span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md show" style="position: absolute; transform: translate3d(-216px, 55px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-end">
                        
                        <form action="{{ route('logout')}}" method="POST"> 
                        @csrf   
                       <button type="submit"  class="dropdown-item text-right">
                            <i class="las la-sign-out-alt"></i>
                            <span>تسجيل خروج</span>
                        </button>
                    </form>
                  
                    </div>
                </div>
            </div>
</div><!-- .aiz-topbar -->
