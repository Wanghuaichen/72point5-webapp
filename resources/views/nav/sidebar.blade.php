<div ng-controller="NavController" class="sidebar">
	<div class="cow-icon"></div>

	<div class="action-button-container">
		<div ng-click="navTo('All Cows')" class="active action-button">
			<span>All Cows</span>
		</div>
		<div ng-click="navTo('Single Cow')" class="action-button">
			<span>Single Cow</span>
		</div>
		<div ng-click="navTo('About')" class="action-button">
			<span>About</span>
		</div>
	</div>

	<a target="_self" href="cowSamples.csv" class="download-button" download="cowSamples.csv"></a>
</div>
