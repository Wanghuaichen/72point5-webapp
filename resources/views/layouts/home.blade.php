<html>
<head>
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

<body>
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
			</tr>
		</thead>
	@foreach ($samples as $sample)
		<tr>
			<td>{{ json_encode($sample->id) }}</td>
			<td>{{ json_encode($sample->body_temp) }}</td>
			<td>{{ json_encode($sample->ext_temp) }}</td>
			<td>{{ json_encode($sample->x) }}</td>
			<td>{{ json_encode($sample->y) }}</td>
			<td>{{ json_encode($sample->z) }}</td>
			<td>{{ json_encode($sample->respire) }}</td>
			<td>{{ json_encode($sample->cow_id) }}</td>
		</tr>
	@endforeach
	</table>
</body>

</html>
