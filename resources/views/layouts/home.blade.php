<html>
<head>
	<title>72 Point 5</title>

	{{--css--}}
	<link rel='stylesheet' href='skeleton.css'/>
	<link rel='stylesheet' href='style.css'/>

	{{-- js --}}
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
	<script src="js/app.js"></script>
</head>

<body ng-app="app" ng-controller="MainController">
	<div class="row">
		<div class="two columns">
			@include('nav/sidebar')
		</div>

		<div class="nine columns">
			@include('data/all')
		</div>
	</div>
</body>

</html>
