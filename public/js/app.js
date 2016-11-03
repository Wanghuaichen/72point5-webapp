var app = angular.module('app', []);

angular.element(function() {
	angular.bootstrap(document, ['app']);
});

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
