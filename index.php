<!doctype html >
<html lang="en" ng-app="appGenerator">
<head>
    <meta charset="UTF-8">
    <title>Angular Maker</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css.map">
    <link rel="stylesheet" href="css/spinner.css">
</head>
<body>
<header>
    <div class="image-responsive text-center">
        <img src="image/logo.png" alt="" height="100">
    </div>
</header>

<div class="container" ng-controller="MainController">
    <span><div class="loader" ng-show="isLoading">Loading...</div></span>
    <form class="form-horizontal" name="gform" ng-submit="getForm(e)">
        <fieldset>

            <legend>Angular File Config</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="module">Module Title</label>

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
                <label class="col-md-4 control-label" for="ctrl">Controller Title</label>

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
                <label class="col-md-4 control-label" for="fact">Factory Title</label>

                <div class="col-md-4">
                    <input id="fact"
                           name="fact"
                           required
                           ng-model="e.factory"
                           type="text"
                           placeholder="Factory"
                           class="form-control input-md">

                </div>
                <div class="col-md-4">
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
                <label class="col-md-4 control-label" for="serv">Service Title</label>

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
                <label class="col-md-4 control-label" for="generate">Make Angular File</label>

                <div class="col-md-4">
                    <button type="submit" name="generate" class="btn btn-success">Source Code</button>
                </div>
            </div>
        </fieldset>
    </form>
    <hr>

    <div class="code" ng-show="code">
        <h2> Result :</h2>
        <pre>{{code.message}}</pre>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/angular.min.js"></script>
<script src="js/angular-resource.min.js"></script>
<script src="js/app.js"></script>


<nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        Angular Maker 0.3 Alpha <br> Copyright &copy
        <a href="http://mortezazakeri.com" target="new">
            Morteza Zakeri
        </a>
        <?php echo date("Y"); ?>
    </div>
</nav>

</body>
</html>