<!doctype html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="app-url" content="">
	<meta name="file-base-url" content="">
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon -->
	<link rel="icon" href="">
	<title>هويدي النسيم</title>


	<!-- <link href="https://www.dafontfree.net/embed/bW8tbmF3ZWwtcmVndWxhciZkYXRhLzQxL20vOTc5ODUvTU9fTmF3ZWwudHRm" rel="stylesheet" type="text/css"/> -->


	<!-- aiz core css -->
	<link rel="stylesheet" href="{{ asset('/css/vendors.css') }}">

	<link rel="stylesheet" href="{{ asset('/css/aiz-core.css') }}">

	<script type="text/javascript" src="/js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="{{ asset('/js/jPrintPages.js') }}"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
	<link rel="stylesheet" href="/css/boot.css">

	<link rel="stylesheet" href="/css/style.css">
	<!-- @if(app()->getLocale()=="ar")
    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}">
    @endif -->
    <style>
    
    </style>
 <script>
    	var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: '{!! translate("Nothing selected", null, true) !!}',
            nothing_found: '{!! translate("Nothing found", null, true) !!}',
            choose_file: '{{ translate("Choose file") }}',
            file_selected: '{{ translate("File selected") }}',
            files_selected: '{{ translate("Files selected") }}',
            add_more_files: '{{ translate("Add more files") }}',
            adding_more_files: '{{ translate("Adding more files") }}',
            drop_files_here_paste_or: '{{ translate("Drop files here, paste or") }}',
            browse: '{{ translate("Browse") }}',
            upload_complete: '{{ translate("Upload complete") }}',
            upload_paused: '{{ translate("Upload paused") }}',
            resume_upload: '{{ translate("Resume upload") }}',
            pause_upload: '{{ translate("Pause upload") }}',
            retry_upload: '{{ translate("Retry upload") }}',
            cancel_upload: '{{ translate("Cancel upload") }}',
            uploading: '{{ translate("Uploading") }}',
            processing: '{{ translate("Processing") }}',
            complete: '{{ translate("Complete") }}',
            file: '{{ translate("File") }}',
            files: '{{ translate("Files") }}',
        }
	</script>
</head>
<body class="">

	<div class="aiz-main-wrapper ">
        @include('admin.side.admin_sidenav')
		<div class="aiz-content-wrapper pt-2">
           @include('admin.side.admin_nav')
			<div class="aiz-main-content mt-5 pt-5">
				<div class="px-15px px-lg-25px">
                    @yield('content')
				</div>
				<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
					<p class="mb-0">&copy; {{env('APP_NAME')}}</p>
				</div>
			</div><!-- .aiz-main-content -->
		</div><!-- .aiz-content-wrapper -->
	</div><!-- .aiz-main-wrapper -->

	<!-- @yield('modal') -->

	<script src="{{ asset('js/vendors.js') }}" ></script>
	<script src="{{ asset('js/aiz-core.js') }}" ></script>

	@yield('script')


</body>
</html>
