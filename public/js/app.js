var app = angular.module('app', []);
angular.element(function() {
	angular.bootstrap(document, ['app']);
});

// use brackets compatible with Blade
app.config(function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
})

app.controller("MainController", ['$scope', '$rootScope', '$http', function($scope, $rootScope, $http) {
	$scope.title = "All Cows";

	// retrieve all latest samples from db
	$scope.getLatestSamples = function getLatestSamples() {
		$http.post('/getLatestSamples').then(
			function success(response) {
				$scope.all_samples = response.data;
			},
			function error(response) {
				console.log("Error getting normal samples");
			}
		);
	};

	// get all cow id's for single cow list
	$scope.getCowIds = function getCowIds() {
		$http.post('/getNumCows').then(
			function success(response) {
				$scope.cowIds = response.data;
			},
			function error(response) {
				console.log("Error getting cow id's");
			}
		);
	};

	// get all the samples for one cow
	$rootScope.getSingleSamples = function getSingleSamples(cow_id) {
		$http({
			url: '/getSingleSamples',
			method: 'POST',
			data: {'cowId': cow_id},
		}).then(
			function success(response) {
				$scope.single_samples = response.data;
			},
			function error(response) {
				console.log("Error getting single sanples for: " + cow_id);
			}
		);
		$scope.getCowIds();
	};

	// get all latest samples and set loop on database
	$scope.getLatestSamples();
	window.setInterval(function() {
		$scope.getLatestSamples();
	}, 1500);
}]);

app.controller("NavController", ['$scope', '$rootScope', '$http', function($scope, $rootScope, $http) {
	// navigation between areas of site, and management of nav bar visual effects
	$scope.navTo = function(location) {
		var buttons = document.getElementsByClassName('action-button');
		[].forEach.call(buttons, function(button) {
			if (location == button.innerText) {
				button.classList.add("active");	
				$scope.changeLocation(button.innerText);
			} else {
				button.classList.remove("active");
			}
		});
	}

	// manage the main contents of the single page app
	$scope.changeLocation = function(location) {
		if (location == "All Cows") {
			document.getElementsByClassName("all-cow-data")[0].classList.add("show");
			document.getElementsByClassName("about-data")[0].classList.remove("show");
			document.getElementsByClassName("single-cow-data")[0].classList.remove("show");

		} else if (location == "Single Cow") {
			document.getElementsByClassName("single-cow-data")[0].classList.add("show");
			document.getElementsByClassName("all-cow-data")[0].classList.remove("show");
			document.getElementsByClassName("about-data")[0].classList.remove("show");
			$rootScope.getSingleSamples(1);

		} else if (location == "About") {
			document.getElementsByClassName("about-data")[0].classList.add("show");
			document.getElementsByClassName("all-cow-data")[0].classList.remove("show");
			document.getElementsByClassName("single-cow-data")[0].classList.remove("show");
		} 
	}
}]);
