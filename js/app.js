"use strict";

var app = angular.module('appGenerator', [
        'ngResource',
    ])
    .config(['$resourceProvider', function($resourceProvider) {
      $resourceProvider.defaults.stripTrailingSlashes = false;
    }])
    .factory('SendElements', function ($resource) {
        return $resource('api/generator.php/', {}, {
            'get': {method: 'POST', isArray: false}
        });
    })
    .controller('MainController', function ($scope, SendElements) {

        var allElements = [];


        $scope.getForm = function (element) {
            allElements = [];
            $scope.isLoading = true;

            angular.forEach(element, function (data, key) {
                if (key == 'module') {
                    allElements.push({'moduleTitle': data});
                }
                if (key == 'controller') {
                    allElements.push({'controller': data});
                }
                if (key == 'factory') {
                    allElements.push({'factory': data});
                }
                if (key == 'service') {
                    allElements.push({'service': data});
                }
                if (key == 'url') {
                    allElements.push({'url': data});
                }
            })

            //allElements = JSON.stringify(allElements);
            var params = {'elements': allElements};
            console.log(params);
            SendElements.get(params, function (response) {

            }).$promise.then(function (response) {
                $scope.code = response;
                $scope.isLoading = false;
            })
        }
    })

