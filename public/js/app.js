var app = angular.module('app', []);

angular.element(function() {
	angular.bootstrap(document, ['app']);
});

// use brackets compatible with Blade
app.config(function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
})

app.controller("MainController", ['$scope', '$http', function($scope, $http) {
	$scope.title = "All Cows";
	$scope.normal_samples = [];

	// retrieve all unrefined, raw samples from db
	$scope.getAllRawSamples = function getAllSamples() {
		$http.post('/getAllRaw').then(
			function success(response) {
				$scope.normal_samples = response.data;
			},
			function error(response) {
				console.log("Error getting normal samples");
			}
		);
	};

	// get all samples and set loop on database
	$scope.getAllRawSamples();
	window.setInterval(function() {
		$scope.getAllRawSamples();
	}, 3000);
}]);

app.controller("NavController", ['$scope', function($scope) {

	$scope.navTo = function(location) {
		var buttons = document.getElementsByClassName('action-button');
		[].forEach.call(buttons, function(button) {
			if (location == button.innerText) {
				button.classList.add("active");	
			} else {
				button.classList.remove("active");
			}
		});
	}
}]);
