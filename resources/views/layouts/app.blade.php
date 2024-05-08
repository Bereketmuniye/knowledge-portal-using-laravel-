<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Knowledge Portal System</title>
 <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/materialize/css/materialize.min.css')}}" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="{{ asset("assets/css/bootstrap.css")}}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{ asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{ asset('assets/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{ asset('assets/css/custom-styles.css')}}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('assets/js/Lightweight-Chart/cssCharts.css')}}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="index.html"><i class="large material-icons">track_changes</i> <strong>KM Portal</strong></a>

		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
				<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown4"><i class="fa fa-envelope fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown3"><i class="fa fa-tasks fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown2"><i class="fa fa-bell fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>gh</b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a></li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
            <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content w250">
    <li>
        <div>
            <i class="fa fa-comment fa-fw"></i> New Comment
            <span class="pull-right text-muted small">4 min</span>
        </div>
    </li>
    <li class="divider"></li>
    <li>
        <div>
            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
            <span class="pull-right text-muted small">12 min</span>
        </div>
    </li>
    <li class="divider"></li>
    <li>
        <div>
            <i class="fa fa-envelope fa-fw"></i> Message Sent
            <span class="pull-right text-muted small">4 min</span>
        </div>
    </li>
    <li class="divider"></li>
    <li>
        <div>
            <i class="fa fa-tasks fa-fw"></i> New Task
            <span class="pull-right text-muted small">4 min</span>
        </div>
    </li>
    <li class="divider"></li>
    <li>
        <div>
            <i class="fa fa-upload fa-fw"></i> Server Rebooted
            <span class="pull-right text-muted small">4 min</span>
        </div>
    </li>
    <li class="divider"></li>
    <li>
        <a class="text-center" href="#">
            <strong>See All Alerts</strong>
            <i class="fa fa-angle-right"></i>
        </a>
    </li>
</ul>
<ul id="dropdown3" class="dropdown-content dropdown-tasks w250">
    <li>
		<a href="#">
			<div>
				<p>
					<strong>Task 1</strong>
					<span class="pull-right text-muted">60% Complete</span>
				</p>
				<div class="progress progress-striped active">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
						<span class="sr-only">60% Complete (success)</span>
					</div>
				</div>
			</div>
		</a>
	</li>
	<li class="divider"></li>
	<li>
		<a href="#">
			<div>
				<p>
					<strong>Task 2</strong>
					<span class="pull-right text-muted">28% Complete</span>
				</p>
				<div class="progress progress-striped active">
					<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
						<span class="sr-only">28% Complete</span>
					</div>
				</div>
			</div>
		</a>
	</li>
	<li class="divider"></li>
	<li>
		<a href="#">
			<div>
				<p>
					<strong>Task 3</strong>
					<span class="pull-right text-muted">60% Complete</span>
				</p>
				<div class="progress progress-striped active">
					<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
						<span class="sr-only">60% Complete (warning)</span>
					</div>
				</div>
			</div>
		</a>
	</li>
	<li class="divider"></li>
	<li>
		<a href="#">
			<div>
				<p>
					<strong>Task 4</strong>
					<span class="pull-right text-muted">85% Complete</span>
				</p>
				<div class="progress progress-striped active">
					<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
						<span class="sr-only">85% Complete (danger)</span>
					</div>
				</div>
			</div>
		</a>
	</li>
	<li class="divider"></li>
	<li>
</ul>
<ul id="dropdown4" class="dropdown-content dropdown-tasks w250 taskList">
    <li>
        <a href="#">
            <div>
                <strong>John Doe</strong>
                <span class="pull-right text-muted">
                    <em>Today</em>
                </span>
            </div>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
        </a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="#">
            <div>
                <strong>John Smith</strong>
                <span class="pull-right text-muted">
                    <em>Yesterday</em>
                </span>
            </div>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</p>
        </a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="#">
            <div>
                <strong>John Smith</strong>
                <span class="pull-right text-muted">
                    <em>Yesterday</em>
                </span>
            </div>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the...</p>
        </a>
    </li>
    <li class="divider"></li>
    <li>
        <a class="text-center" href="#">
            <strong>Read All Messages</strong>
            <i class="fa fa-angle-right"></i>
        </a>
    </li>
</ul>
	   <!--/. NAV TOP  -->
       @include('layouts.navigation')
        <!-- /. NAV SIDE  -->

		<div id="page-wrapper">
        @yield('content')
        </div>


            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{{ asset('assets/js/jquery-1.10.2.js')}}"></script>

	<!-- Bootstrap Js -->
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

	<script src="{{ asset('assets/materialize/js/materialize.min.js')}}"></script>

    <!-- Metis Menu Js -->
    <script src="{{ asset('assets/js/jquery.metisMenu.js')}}"></script>
    <!-- Morris Chart Js -->
    <script src="{{ asset('assets/js/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{ asset('assets/js/morris/morris.js')}}"></script>


	<script src="{{ asset('assets/js/easypiechart.js')}}"></script>
	<script src="{{ asset('assets/js/easypiechart-data.js')}}"></script>

	 <script src="{{ asset('assets/js/Lightweight-Chart/jquery.chart.js')}}"></script>\

    <!-- Custom Js -->
    <script src="{{ asset('assets/js/custom-scripts.js')}}"></script>

      <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <!-- Button extension JS -->
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>



<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
  <script>
$(document).ready(function() {
  $('#datatable-buttons').DataTable({
    dom: 'Bfrtip',
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
});
</script>
</body>

</html>
