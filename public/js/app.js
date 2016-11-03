var app = angular.module('app', []);

app.config(function($interpolateProvider) {
	// use brackets compatible with Blade
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
})

app.controller("MainController", ['$scope', 
	function($scope) {
		$scope.title = "Cow Samples";
	}
]);
