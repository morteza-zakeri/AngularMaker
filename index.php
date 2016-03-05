<!doctype html >
<html lang="en" ng-app="appGenerator">
<head>
    <meta charset="UTF-8">
    <title>Angular Maker</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css.map">
    <link rel="stylesheet" href="css/spinner.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
    <div class="image-responsive text-center">
        <img src="image/logo.png" alt="" height="100">
    </div>
</header>

<div class="container-fluid" ng-controller="MainController">
    <span><div class="loader" ng-show="isLoading">Loading...</div></span>

    <div class="row">
        <form class="form-horizontal" name="gform" ng-submit="getForm(e)">
            <fieldset>

                <legend class="text-center">Angular File Config</legend>
                <div class="col-md-7">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="module">Module Title</label>

                        <div class="col-md-4">
                            <input id="module"
                                   name="module"
                                   type="text"
                                   required
                                   ng-model="e.module"
                                   placeholder="Module"
                                   class="form-control input-md">

                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="ctrl">Controller Title</label>

                        <div class="col-md-4">
                            <input id="ctrl"
                                   name="ctrl"
                                   type="text"
                                   required
                                   ng-model="e.controller"
                                   placeholder="Controller"
                                   class="form-control input-md">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="fact">Factory Title</label>

                        <div class="col-md-4">
                            <input id="fact"
                                   name="fact"
                                   required
                                   ng-model="e.factory"
                                   type="text"
                                   placeholder="Factory"
                                   class="form-control input-md">

                        </div>
                        <div class="col-md-6">
                            <input id="url"
                                   name="url"
                                   ng-model="e.url"
                                   type="text"
                                   required
                                   placeholder="URL"
                                   class="form-control input-md">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="serv">Service Title</label>

                        <div class="col-md-4">
                            <input id="serv"
                                   name="serv"
                                   ng-model="e.service"
                                   type="text"
                                   required
                                   placeholder="Service"
                                   class="form-control input-md">
                        </div>
                        <div class="col-md-4">
                            <button id="plus_ctrl" name="plus_ctrl" class="btn btn-primary">+</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="generate">Make Angular File</label>

                        <div class="col-md-6">
                            <button type="submit" name="generate" class="btn btn-success">Source Code</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Dependency</th>
                            <th>URL</th>
                            <th>Value</th>
                            <th>Version</th>
                            <th class="text-center">Select</th>
                        </tr>
                        <tr ng-repeat="depend in depends">
                            <td>{{depend.title}}</td>
                            <td><a href="{{depend.url}}" target="new">Download</a></td>
                            <td>{{depend.value}}</td>
                            <td>{{depend.version}}</td>
                            <td class="text-center">
                                <input type="checkbox"
                                       ng-model="selectedDep"
                                       value="{{$index}}"
                                       ng-change="change(depend,selectedDep,$index)"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </fieldset>
        </form>
    </div>
    <hr>

    <div class="code col-md-10 col-md-offset-1 table-responsive" ng-show="code">
        <h2> Result :</h2>
        <pre>{{code.message}}</pre>
    </div>
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid">
            Angular Maker 0.4 Alpha <br> Copyright &copy | Last update : 5 March 2016
            <a href="http://mortezazakeri.com" target="new">
                Morteza Zakeri
            </a>
            <?php echo date("Y"); ?>
        </div>
    </nav>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/angular.min.js"></script>
<script src="js/angular-resource.min.js"></script>
<script src="js/app.js"></script>


</body>

</html>