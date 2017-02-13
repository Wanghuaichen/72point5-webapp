<html>
<head>
	<title>72 Point 5</title>

	{{--css--}}
	<link rel='stylesheet' href='style.css'/>
	<link rel='stylesheet' href='skeleton.css'/>

	{{-- js --}}
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
	<script src="js/app.js"></script>
</head>

<body ng-app="app" ng-controller="MainController">
	@include('nav/sidebar')

<h1 ng-model="title"><% title %></h1>
	<table class="u-full-width">
		<thead>
			<tr>
				<th>ID</th>
				<th>Body Temp</th>
				<th>External Temp</th>
				<th>X</th>
				<th>Y</th>
				<th>Z</th>
				<th>Heart Rate</th>
				<th>Cow ID</th>
				<th>Timestamp</th>
				<th>Error Code</th>
			</tr>
		</thead>
		<tr ng-repeat="sample in samples">
			<td><% sample.id %></td>
			<td><% sample.body_temp %></td>
			<td><% sample.ext_temp %></td>
			<td><% sample.x %></td>
			<td><% sample.y %></td>
			<td><% sample.z %></td>
			<td><% sample.respire %></td>
			<td><% sample.cow_id %></td>
			<td><% sample.timestamp * 1000 | date:'medium' %></td>
			<td><% sample.error %></td>
		</tr>
	</table>
</body>

</html>
