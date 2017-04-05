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
	{{-- navigation --}}
	@include('nav/topbar')
	@include('nav/sidebar')

	{{-- tab accessed sections --}}
	@include('data/all')
	@include('data/single')
	@include('data/about')
</body>

</html>
