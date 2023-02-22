<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('home') }}" class="d-block text-center">
                {{env('APP_NAME')}}
                    <!-- <img class="mw-100" src="{{ asset('assets/img/logo.jpeg') }}" class="brand-icon" alt="مركز هويدي النسيم"> -->
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">

                {{-- Dashboard --}}
                @can('admin_dashboard')
        
                    <li class="aiz-side-nav-item">
                        <a href="{{route('home')}}" class="aiz-side-nav-link">
                            <i class="las la-home aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">لوحة تحكم</span>
                        </a>
                    </li>
                  
                @endcan

                <!-- POS Addon-->
       

                <!-- Product -->
            
                @canany(['admin_dashboard'])
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('invoice.index') }}" class="aiz-side-nav-link">
                             <i class="las la-file-invoice aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">جميع الفواتير</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('invoice.create') }}" class="aiz-side-nav-link">
                        <i class="las la-file-invoice aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">انشاء فاتورة</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('certificate.index') }}" class="aiz-side-nav-link">
                             <i class="las la-file-invoice aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">جميع شهادات دخول السيارة</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('certificate.create') }}" class="aiz-side-nav-link">
                        <i class="las la-file-invoice aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">انشاء شهادة دخول سيارة</span>
                        </a>
                    

                    </li>
                @endcanany

                <!-- Staffs -->
                <!-- @canany(['view_all_staffs','view_staff_roles'])
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Staffs')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                    </li>
                @endcanany -->

                <!-- Auction Product -->
            


            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
