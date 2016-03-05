"use strict";

var app = angular.module('appGenerator', [
        'ngResource',
    ])
    .config(['$resourceProvider', function ($resourceProvider) {
        $resourceProvider.defaults.stripTrailingSlashes = false;
    }])
    .factory('SendElements', function ($resource) {
        return $resource('api/generator.php/', {}, {
            'get': {method: 'POST', isArray: false}
        });
    })
    .controller('MainController', function ($scope, SendElements) {
        $scope.selectDept = false;
        var allElements = [];
        $scope.depends = [
            {
                "title": 'Angular Resource',
                "value": 'ngResource',
                "url": "https://cdn.jsdelivr.net/angularjs/1.5.0/angular-resource.min.js",
                "version": "1.5.0"
            },
            {
                "title": 'Angular Route',
                "value": 'ui.router',
                "url": "https://cdn.jsdelivr.net/angularjs/1.5.0/angular-route.min.js",
                "version": "1.5.0"
            }
        ]

        //check if dependency checked or not
        $scope.allDep = [];
        $scope.change = function (depend, status, index) {

            if (status == true) {
                addDep(depend);
            } else if (status == false) {
                if (depend) {
                    removeDep(depend);
                }
            }

            function addDep(dep) {
                $scope.allDep.push(dep);
                console.log($scope.allDep);
            }

            function removeDep(depend) {
                angular.forEach($scope.allDep, function (data) {
                    if (depend == data) {
                        var indexDelete = ($scope.allDep.indexOf(data));
                        $scope.allDep.splice(indexDelete, 1);
                    }
                })
            }
        };


        $scope.checkDep = function () {

        }

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

            angular.forEach($scope.allDep, function (data) {
                allElements.push({'dependencies': data.value})
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

