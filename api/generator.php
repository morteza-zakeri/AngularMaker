<?php

if (file_get_contents("php://input")) {
    $elmArray = (file_get_contents("php://input"));
    $elmArray = json_decode($elmArray);
    foreach ($elmArray as $obj) {
        getParams($obj);
    }

} else {
    echo 'null';
}

function getParams($domElements)
{
//    $myfile = fopen("app.txt", "w") or die("Unable to open file!");
    $code = "";
    $module = "";
    $controller = "";
    $service = "";
    $factory = "";
    $dependencies = [];
    $url = "";

    for ($i = 0; $i < sizeof($domElements); $i++) {
        foreach ($domElements[$i] as $key => $val) {
            //echo $key . '=>' . $val . "\n";
            if ($key == 'moduleTitle') {
                $module = $val;
            }
            if ($key == 'controller') {
                $controller = $val;
            }
            if ($key == 'service') {
                $service = $val;
            }
            if ($key == 'factory') {
                $factory = $val;
            }
            if ($key == 'url') {
                $url = $val;
            }
            if ($key == 'dependencies') {
                $dependencies[$i] = $val;
            }
        }
    }
    $depString = "";
    $len = count($dependencies);
    $i = 0;
    foreach ($dependencies as $depend) {
        $i++;
        $depString .= "'" . $depend . "'";

        if ($i < $len) {
            $depString .= ", ";
        };
    }
    $code .= 'angular.module("' . $module . '" , [' . $depString . '])' . "\n\t\t";
    $code .= '.controller("' . $controller . '" , function ($scope,' . $service . '){
        })' . "\n\t\t";
    $code .= '.factory("' . $factory . '" , function($resource){
          return $resource("' . $url . '");
        })' . "\n\t\t";
    $code .= '.service("' . $service . '", function (' . $factory . '){
            var self = {
                //put your service variable and functions here
            };
            return self;
        })';

    //var_dump($dependencies);
    $response['message'] = ($code);
    echo json_encode($response);
}




