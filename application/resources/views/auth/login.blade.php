<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 11:01:45 GMT -->
<head>
	<meta charset="utf-8" />
	<title>CDN Routers | Login </title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link rel="SHORTCUT ICON"   href="/images/favicon-32x32.png">
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="/hr_assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="/hr_assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/hr_assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="/hr_assets/css/animate.min.css" rel="stylesheet" />
	<link href="/hr_assets/css/style.min.css" rel="stylesheet" />
	<link href="/hr_assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="/hr_assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="/hr_assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	 <?php $img = rand(1,6);?>
	<div class="login-cover">
	    <div class="login-cover-image"><img src="/hr_assets/img/login-bg/bg-{{ $img }}.jpg" data-id="login-cover-image" alt="" /></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> CDN Recruiters
                    <small>2K16</small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
            	@if(count($errors)>0)
            	@foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @endif

                 
                <form   method="POST" class="margin-bottom-0">
                	{!! csrf_field() !!}
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control input-lg" placeholder="Email" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" class="form-control input-lg" placeholder="Password" name="password" />
                    </div>
                    <div class="checkbox m-b-20">
                        <label>
                            <input type="checkbox" name="remember" /> Remember Me
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
                    </div>
                     
                </form>
                <br><a href="/hrm/password/email">Forgot password?</a>
            </div>
        </div>
       
        <ul class="login-bg-list">
            <li @if($img==1) class="active" @endif><a href="#" data-click="change-bg"><img src="/hr_assets/img/login-bg/bg-1.jpg" alt="" /></a></li>
            <li @if($img==2) class="active" @endif><a href="#" data-click="change-bg"><img src="/hr_assets/img/login-bg/bg-2.jpg" alt="" /></a></li>
            <li @if($img==3) class="active" @endif><a href="#" data-click="change-bg"><img src="/hr_assets/img/login-bg/bg-3.jpg" alt="" /></a></li>
            <li @if($img==4) class="active" @endif><a href="#" data-click="change-bg"><img src="/hr_assets/img/login-bg/bg-4.jpg" alt="" /></a></li>
            <li @if($img==5) class="active" @endif><a href="#" data-click="change-bg"><img src="/hr_assets/img/login-bg/bg-5.jpg" alt="" /></a></li>
            <li @if($img==6) class="active" @endif><a href="#" data-click="change-bg"><img src="/hr_assets/img/login-bg/bg-6.jpg" alt="" /></a></li>
        </ul>
        
        <!-- begin theme-panel -->
        
        <!-- end theme-panel -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="/hr_assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="/hr_assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="/hr_assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="/hr_assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="/hr_assets/crossbrowserjs/html5shiv.js"></script>
		<script src="/hr_assets/crossbrowserjs/respond.min.js"></script>
		<script src="/hr_assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="/hr_assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/hr_assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="/hr_assets/js/login-v2.demo.min.js"></script>
	<script src="/hr_assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
		});
	</script>
	 
</body>

 </html>
