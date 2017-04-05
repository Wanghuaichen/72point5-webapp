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

	// retrieve all unrefined, raw samples from db
	$scope.getNewestSamples = function getNewestSamples() {
		$http.post('/getNormalSamples').then(
			function success(response) {
				$scope.normal_samples = response.data;
			},
			function error(response) {
				console.log("Error getting normal samples");
			}
		);

		$http.post('/getAccelSamples').then(
			function success(response) {
				$scope.accel_samples = response.data;
			},
			function error(response) {
				console.log("Error getting acceleration samples");
			}
		);
	};

	$scope.getCowIds = function getCowIds() {
		$http.post('/getNumCows').then(
			function success(response) {
				$scope.cowIds = response.data;
			},
			function error(response) {
				console.log("Error getting num cows");
			}
		);
	};

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
				console.log("Error getting single sanples: " + cow_id);
			}
		);
		$scope.getCowIds();
	};

	// get all samples and set loop on database
	$scope.getNewestSamples();
	window.setInterval(function() {
		$scope.getNewestSamples();
	}, 1500);
}]);

app.controller("NavController", ['$scope', '$rootScope', '$http', function($scope, $rootScope, $http) {
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
