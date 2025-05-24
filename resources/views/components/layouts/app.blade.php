<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<title>Quetenx Admin - Ni</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:site_name" content="Quetenx Admin" />
		<link rel="canonical" href="https://banco-main-7x2urd.laravel.cloud" />
		<link rel="shortcut icon" href="{{asset('assets/media/logos/qtxfav.ico')}}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		{{ $styles ?? '' }}
		<!--end::Global Stylesheets Bundle-->
		
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside overflow-visible pb-5 pt-5 pt-lg-0" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'80px', '300px': '100px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					<div class="aside-logo py-8" id="kt_aside_logo">
						<!--begin::Logo-->
						<a href="index.html" class="d-flex align-items-center">
							<img alt="Logo" src="{{asset('assets/media/logos/qtxlogo.png')}}" class="h-65px logo" />
						</a>
						<!--end::Logo-->
					</div>
					<!--end::Brand-->
                    <!--begin::Aside menu-->
                    <x-layouts._aside />
                    <!--end::Aside menu-->
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<x-layouts._header />
					<!--end::Header-->
					<!--begin::Toolbar-->
					
					<!--end::Toolbar-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Row-->
							{{ $slot ?? '' }}
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<x-layouts._footer />
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-outline ki-arrow-up"></i>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<script>
			// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) 
			if (window.top != window.self) {
				window.top.location.replace(window.self.location.href);
			}
		</script>
		<!--end::Global Javascript Bundle-->
		{{ $scripts ?? '' }}
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>