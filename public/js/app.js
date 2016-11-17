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
	$scope.title = "Cow Samples (RAW)";
	$scope.samples = [];

	$scope.getAllSamples = function getAllSamples() {
		$http.post('/all').then(
			function success(response) {
				$scope.samples = response.data;
			}, 
			function error(response) {
				console.log("Error getting samples");
			}
		);
	};

	// get all samples and set loop on database
	$scope.getAllSamples();
	window.setInterval(function() {
		$scope.getAllSamples();
	}, 3000);
}]);
