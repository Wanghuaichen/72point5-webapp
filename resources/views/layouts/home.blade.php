<html>
<head>
	<title>72 Point 5</title>

	{{-- js --}}
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
	<script src="js/app.js"></script>
</head>

<style>
	table {
		border-collapse: collapse;
	}
	th, td {
		padding: 4px;
	}
	table, th, td {
		border: 1px solid black;
	}
</style>

<body ng-app="app" ng-controller="MainController">
<h1 ng-model="title"><% title %></h1>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Body Temp</th>
				<th>External Temp</th>
				<th>X</th>
				<th>Y</th>
				<th>Z</th>
				<th>Respiration Rate</th>
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
