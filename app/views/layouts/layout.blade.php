<!DOCTYPE html>
<html lang="en">
  	<head>
		<meta charset="utf-8">
		<title>Allocation System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{ HTML::style('assets/plugins/twitter-bootstrap/css/bootstrap.css') }}
		{{ HTML::style('assets/plugins/twitter-bootstrap/css/bootswatch.min.css') }}
		{{ HTML::style('assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css') }}
		{{ HTML::style('assets/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css') }}
		{{ HTML::style('assets/plugins/DataTables-1.10.4/css/jquery.dataTables.min.css') }}
		{{ HTML::style('assets/css/styles.css') }}
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
		  <script src="../bower_components/respond/dest/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
		body {
			  padding-top: 50px;
			}
		</style>
  	</head>
  	<body>
		<div class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
			<div class="navbar-header">
			  <a href="../" class="navbar-brand">Allocation System</a>
			  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			</div>
			<div class="navbar-collapse collapse" id="navbar-main">
			  <ul class="nav navbar-nav">
				<li class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Transaction <span class="caret"></span></a>
				  <ul class="dropdown-menu" aria-labelledby="themes">
					<li>{{ HTML::linkRoute('activity.index', 'Activity') }}</li>	
				  </ul>
				</li>
				<li>
				  <a href="../help/">Help</a>
				</li>
				
			  </ul>

			  <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">User <span class="caret"></span></a>
				  <ul class="dropdown-menu" aria-labelledby="download">
					<li><a href="./bootstrap.min.css">Profile</a></li>
					<li><a href="./bootstrap.css">Logout</a></li>
				  </ul>
				</li>
			  </ul>

			</div>
		  </div>
		</div>

		<div class="container">
			@yield('content')
			<!-- <footer>
				<div class="row">
				  <div class="col-lg-12">

					<ul class="list-unstyled">
					  <li class="pull-right"><a href="#top">Back to top</a></li>
					  <li><a href="http://news.bootswatch.com" onclick="pageTracker._link(this.href); return false;">Blog</a></li>
					  <li><a href="http://feeds.feedburner.com/bootswatch">RSS</a></li>
					  <li><a href="https://twitter.com/bootswatch">Twitter</a></li>
					  <li><a href="https://github.com/thomaspark/bootswatch/">GitHub</a></li>
					  <li><a href="../help/#api">API</a></li>
					  <li><a href="../help/#support">Support</a></li>
					</ul>
					<p>Made by <a href="http://thomaspark.me" rel="nofollow">Thomas Park</a>. Contact him at <a href="mailto:thomas@bootswatch.com">thomas@bootswatch.com</a>.</p>
					<p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/gh-pages/LICENSE">MIT License</a>.</p>
					<p>Based on <a href="http://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p>

				  </div>
				</div>

			</footer> -->
		</div>
	{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
	{{ HTML::script('assets/plugins/twitter-bootstrap/js/bootstrap.min.js') }}

	{{ HTML::script('assets/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js') }}

	{{ HTML::script('assets/plugins/DataTables-1.10.4/js/jquery.dataTables.min.js') }}

	{{ HTML::script('assets/js/selectchain.js') }}

	{{ HTML::script('assets/js/function.js') }}

	<script type="text/javascript">
		function GetSelectValues(select) {
		  var foo = []; 
			select.each(function(i, selected){ 
			  foo[i] = $(selected).val(); 
			});
			return foo;
		}

		function GetSelectValue(select) {
		  var foo = []; 
			select.each(function(i, selected){ 
			  	foo[i] = $(selected).text(); 
			});
			if(foo.length > 1){
				return 'MULTI';
			}else{
				return foo[0];
			}
		}

		function GetSelectText(select) {
		  var foo = []; 
			select.each(function(i, selected){ 
			  	foo[i] = $(selected).text(); 
			});
			return foo;
		}

		

		$(document).ready(function() {
		@section('page-script')

        @show
        });
    </script>
  	</body>
</html>
