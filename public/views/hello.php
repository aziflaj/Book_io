<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book.io</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/angular-route/angular-route.min.js"></script>
	<script src="js/ui-bootstrap-tpls-0.11.0.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/controllers/ctrl.js"></script>
    <script src="js/directives/directives.js"></script>
</head>

<body ng-app="book-io">
<my-header></my-header>

<div ng-view>
    <!-- VIEW HERE -->
</div>
</body>
</html>
