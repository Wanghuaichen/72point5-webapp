<div ng-controller="NavController" class="sidebar">
	<div class="cow-icon"></div>

	<div class="action-button-container">
		<div ng-click="navTo('All Cows')" class="active action-button">
			<span>All Cows</span>
		</div>
		<div ng-click="navTo('Single Cow')" class="action-button">
			<span>Single Cow</span>
		</div>
		<div ng-click="navTo('Graphs')" class="action-button">
			<span>Graphs</span>
		</div>
		<div ng-click="navTo('About')" class="action-button">
			<span>About</span>
		</div>
	</div>

	<button ng-click="downloadCsv()" class="download-button"></button>
	<div class="download-button-result">
		<p>Your download is complete!</p>
	</div>
</div>
