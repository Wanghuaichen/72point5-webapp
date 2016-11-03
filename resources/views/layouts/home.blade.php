<html>
<head>
	<title>72 Point 5</title>

	{{-- js --}}
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
	<script src="js/app.js"></script>
	<script>
		if ("{{ env('APP_ENV') }}" == 'prod') {
			var head = document.getElementsByTagName('head')[0];
			var script = document.createElement('script');
			script.type = 'text/javascript';
			script.src = 'public/js/app.js';
			head.appendChild(script)
		}
	</script>
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
			</tr>
		</thead>
	@foreach ($samples as $sample)
		<tr>
			<td>{{ $sample->id }}</td>
			<td>{{ $sample->body_temp }}</td>
			<td>{{ $sample->ext_temp }}</td>
			<td>{{ $sample->x }}</td>
			<td>{{ $sample->y }}</td>
			<td>{{ $sample->z }}</td>
			<td>{{ $sample->respire }}</td>
			<td>{{ $sample->cow_id }}</td>
			<td>{{ date("Y-m-d H:i:s", $sample->timestamp) }}</td>
		</tr>
	@endforeach
	</table>
</body>

</html>
