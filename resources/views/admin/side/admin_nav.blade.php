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
    <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
            
                <!-- <div class="d-flex justify-content-around align-items-center align-items-stretch ml-3">
                    <div class="aiz-topbar-item">
                        <div class="d-flex align-items-center">
                            <a class="btn btn-icon btn-circle btn-light" href="" target="_blank" title="{{ translate('POS') }}">
                                <i class="las la-print"></i>
                            </a>
                        </div>
                    </div>
                </div> -->
            <!-- <div class="d-flex justify-content-around align-items-center align-items-stretch ml-3">
                <div class="aiz-topbar-item">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-soft-danger btn-sm d-flex align-items-center" href="">
                            <i class="las la-hdd fs-20"></i>
                            <span class="fw-500 ml-1 mr-0 d-none d-md-block">{{ translate('Clear Cache') }}</span>
                        </a>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch">

            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            
                            <span class="d-none d-md-block">
                                <span class="d-block fw-500">{{Auth::user()->name}}</span>
                                <span class="d-block small opacity-60">{{Auth::user()->user_type}}</span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                    <form action="{{ route('logout')}}" method="POST"> 
                        @csrf   
                       <button type="submit"  class="dropdown-item text-right">
                            <i class="las la-sign-out-alt"></i>
                            <span>تسجيل خروج</span>
                        </button>
                    </form>
                    </div>
                </div>
            </div><!-- .aiz-topbar-item -->
        </div>
    </div>
</div><!-- .aiz-topbar -->
