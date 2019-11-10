angular.module('apigit', ['ngRoute', 'ngResource'])
	.config(function($routeProvider, $locationProvider) {

		$locationProvider.html5Mode(true);

		$routeProvider.when('/api/users', {
			templateUrl: '/api/partials/principal.html',
			controller: 'UsersController'
		});

		$routeProvider.when('/api/users/:userLogin', {
			templateUrl: 'partials/principal.html',
			controller: 'UsersController'
		});

		$routeProvider.when('/api/users/:userLogin/repos', {
			templateUrl: 'partials/principal.html',
			controller: 'UsersController'
		});

		$routeProvider.otherwise({redirectTo: '/'});

	});