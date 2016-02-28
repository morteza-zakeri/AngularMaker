"use strict";

angular.module('name', [
        'array Of dependecies'
    ])
    .constant('constantname', 'constantvlue')

    .factory('factoryname', function ($resource) {
        return $resource('url', {
                alias: {method: 'methodname'}
            },
            {param1: '@param1', 'param2': '@param2'})
    })
    .controller('controllername', function ($scope, servicename) {

        $scope.service = servicename;
        $scope.service.methodname(val1, val2);
        $scope.service.then(function (response) {
            console.log(response)
        })

    })
    .service('servicename', function (factoryname) {

        var self = {

            response: null,
            methodPromise: null,
            'methodname': function (val1, val2) {

                var params = {
                    'param1': val1,
                    'param2': val2,
                };
                self.methodPromise = factoryname.method(params, function () {

                }).$promise.then(function (response) {
                    self.response = response;
                }, function (err) {
                    console.error(err)
                })
            }
        }
        return self;
    })
