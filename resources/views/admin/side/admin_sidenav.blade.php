<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('home') }}" class="d-block text-right">
                    <img class="mw-100" src="{{ asset('assets/img/logo.png') }}" class="brand-icon" alt="مركز هويدي النسيم">
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
            
                @canany(['add_new_product', 'show_all_products','show_in_house_products','show_seller_products','show_digital_products','product_bulk_import','product_bulk_export','view_product_categories', 'view_all_brands','view_product_attributes','view_colors','view_product_reviews'])
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('home') }}" class="aiz-side-nav-link">
                             <i class="las la-file-invoice aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">جميع الفواتير</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('invoce.create') }}" class="aiz-side-nav-link">
                        <i class="las la-file-invoice aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">انشاء فاتورة</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('home') }}" class="aiz-side-nav-link">
                        <i class="las la-file-invoice aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">انشاء شهادة دخول سيارة</span>
                        </a>
                    

                    </li>
                @endcanany

                <!-- Auction Product -->
            


            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
