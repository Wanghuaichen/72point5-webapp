<div class="single-cow-data">
	<h1>Single Cows</h1>
	<div class="single-cow-list" ng-repeat="i in numCows">
		<p ng-click="getSingleSamples(i)" class="single-cow-button"><% i %></p>
	</div>

	<h4>Cow #<% single_samples.normal[0].cow_id %></h4>

	<table class="u-full-width">
		<caption>Normal Samples</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>Timestamp Received</th>
				<th>Body Temp</th>
				<th>External Temp</th>
				<th>Infrared Heart Rate Monitor (Raw Value)</th>
				<th>Cow ID</th>
				<th>Error Code</th>
			</tr>
		</thead>
		<tr ng-repeat="sample in single_samples.normal">
			<td><% sample.id %></td>
			<td><% sample.timestamp * 1000 | date:'medium' %></td>
			<td><% sample.body_temp %></td>
			<td><% sample.ext_temp %></td>
			<td><% sample.heart_rate %></td>
			<td><% sample.cow_id %></td>
			<td><% sample.error %></td>
		</tr>
	</table>

	<table class="u-full-width">
		<caption>Acceleration Samples</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>Timestamp Received</th>
				<th>X
				<th>Y</th>
				<th>Z</th>
				<th>Cow ID</th>
				<th>Error Code</th>
			</tr>
		</thead>
		<tr ng-repeat="sample in accel_samples">
			<td><% sample.id %></td>
			<td><% sample.timestamp * 1000 | date:'medium' %></td>
			<td><% sample.x %></td>
			<td><% sample.y %></td>
			<td><% sample.z %></td>
			<td><% sample.cow_id %></td>
			<td><% sample.error %></td>
		</tr>
	</table>
</div>
