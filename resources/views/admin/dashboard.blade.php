@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    {{-- super admin --}}
                    @if(auth()->user()->role == 0)
                        <div class="col-lg-4  col-6">
                            <div class="small-box purplebg-info bg-info">
                                <div class="inner">
                                    <h3>{{$userCount}}</h3>
                                    <p>Users</p>
                                </div>
                                {{-- <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div> --}}
                                <a href="{{route('admin.user')}}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif
                    {{-- user --}}
                    @if(auth()->user()->role == 1)
                        <div class="col-lg-4  col-6">
                            <div class="small-box purplebg-info bg-info">
                                <div class="inner">
                                    <h3>{{$blogCount}}</h3>
                                    <p>blogs</p>
                                </div>
                                <a href="{{route('user.blog')}}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </section>


</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 500
            })
        });
    </script>
@stop
<style>
.purplebg-info {
  background: linear-gradient(#5f72bd , #9b23ea) !important;
}
.redbg-info {
  background: linear-gradient(#e66465, #9198e5) !important;
}
.greenbg-info {
  background: linear-gradient(rgb(44, 83, 131) 18.9%, rgb(95, 175, 201)) !important;
}

html {
	-webkit-text-size-adjust: none; /* Prevent font scaling in landscape */
	width: 100%;
	height: 100%;
	-webkit-font-smoothing: antialiased;
	-moz-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}
input[type="submit"] {
	-webkit-appearance: none;
}
*, *:after, *:before {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}
body {
	margin: 0;
	padding: 0;
	-webkit-font-smoothing: antialiased;
	font-family: 'Muli', sans-serif;
	font-weight: 400;
	width: 100%;
	min-height: 100%;
	color: #333333;
	width: 100%;
	height: 100%;
	background: #ecf0f4;
}
a {
	outline: none;
	text-decoration: none;
	color: #555;
}
a:hover, a:focus {
	outline: none;
	text-decoration: none;
}
img {
	border: 0;
}
input, textarea, select {
	outline: none;
	resize: none;
	font-family: 'Muli', sans-serif;
}
a, input, button {
	outline: none !important;
}
 button::-moz-focus-inner {
 border: 0;
}
h1, h2, h3, h4, h5, h6 {
	margin: 0;
	padding: 0;
	font-weight: 700;
	color: #202342;
	font-family: 'Muli', sans-serif;
}
img {
	border: 0;
	vertical-align: top;
	max-width: 100%;
	height: auto;
}
ul, ol {
	margin: 0;
	padding: 0;
	list-style: none;
}
p {
	margin: 0 0 15px 0;
	padding: 0;
}

.container-fluid{
	max-width: 1900px;
}

/* Common Class */
.pd-5{padding: 5px;}
.pd-10{padding: 10px;}
.pd-20{padding: 20px;}
.pd-30{padding: 30px;}
.pb-10{padding-bottom: 10px;}
.pb-20{padding-bottom: 20px;}
.pb-30{padding-bottom: 30px;}
.pt-10{padding-top: 10px;}
.pt-20{padding-top: 20px;}
.pt-30{padding-top: 30px;}
.pr-10{padding-right: 10px;}
.pr-20{padding-right: 20px;}
.pr-30{padding-right: 30px;}
.pl-10{padding-left: 10px;}
.pl-20{padding-left: 20px;}
.pl-30{padding-left: 30px;}
.px-30{padding-left: 30px; padding-right: 30px;}
.px-20{padding-left: 20px; padding-right: 20px;}
.py-30{padding-top: 30px; padding-bottom: 30px;}
.py-20{padding-top: 20px; padding-bottom: 20px;}
.mb-30{margin-bottom: 30px;}
.mb-50{margin-bottom: 50px;}

.font-30{font-size: 30px; line-height: 1.46em;}
.font-24{font-size: 24px; line-height: 1.5em;}
.font-20{font-size: 20px; line-height: 1.5em;}
.font-18{font-size: 18px; line-height: 1.6em;}
.font-16{font-size: 16px; line-height: 1.75em;}
.font-14{font-size: 14px; line-height: 1.85em;}
.font-12{font-size: 12px; line-height: 2em;}

.weight-300{font-weight: 300;}
.weight-400{font-weight: 400;}
.weight-500{font-weight: 500;}
.weight-600{font-weight: 600;}
.weight-700{font-weight: 700;}
.weight-800{font-weight: 800;}

.text-blue{color: #1b00ff;}
.text-dark{color: #000000;}
.text-white{color: #ffffff;}
.height-100-p{height: 100%;}
.bg-white{background: #ffffff;}
.border-radius-10{
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
}
.border-radius-100{
	-webkit-border-radius: 100%;
	-moz-border-radius: 100%;
	border-radius: 100%;
}
.box-shadow{
	-webkit-box-shadow: 0px 0px 28px rgba(0, 0, 0, .08);
	-moz-box-shadow: 0px 0px 28px rgba(0, 0, 0, .08);
	box-shadow: 0px 0px 28px rgba(0, 0, 0, .08);
}

.gradient-style1{
	background-image: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);
}
.gradient-style2{
	background-image: linear-gradient( 135deg, #72EDF2 10%, #5151E5 100%);
}
.gradient-style3{
	background-image: radial-gradient( circle 732px at 96.2% 89.9%,  rgba(70,66,159,1) 0%, rgba(187,43,107,1) 92% );
}
.gradient-style4{
	background-image: linear-gradient( 135deg, #FF9D6C 10%, #BB4E75 100%);
}

/* widget style 1 */

.widget-style1{
	padding: 20px 10px;
}
.widget-style1 .circle-icon{
	width: 60px;
}
.widget-style1 .circle-icon .icon{
	width: 60px;
	height: 60px;
	background-image: linear-gradient(rgb(53, 108, 128) 14.6%, rgb(57, 187, 231));
	display: flex;
	align-items: center;
	justify-content: center;
}
.widget-style1 .widget-data{
	width: calc(100% - 150px);
	padding: 0 15px;
}
.widget-style1 .progress-data{
	width: 90px;
}
.widget-style1 .progress-data .apexcharts-canvas{
	margin: 0 auto;
}

.widget-style2 .widget-data{
	padding: 20px;
}

.widget-style3{
	padding: 30px 20px;
}
.widget-style3 .widget-data{
	width: calc(100% - 60px);
}
.widget-style3 .widget-icon{
	width: 60px;
	font-size: 45px;
	line-height: 1;
}

.apexcharts-legend-marker{
	margin-right: 6px !important;
}

</style>
