<?php
/**
 * Created by PhpStorm.
 * User: qwertmax
 * Date: 27.02.14
 * Time: 16:43
 */
?>
<html>
  <head>
    <script src="js/libs/jquery.js"></script>
    <script src="js/libs/angular.min.js"></script>
    <script src="js/libs/angular-resource.js"></script>
    <script src="js/app/js/app.js"></script>
    <script src="js/app/js/controllers.js"></script>
    <script src="js/app/js/services.js"></script>
    <link rel="stylesheet" type="text/css" href="js/app/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="js/app/css/style.css">

  </head>
  <body ng-app="profilesApp">
    <header class="navbar navbar-inverse navbar-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AngularJS Profiles Prototype</a>
        </div>
      </div>
    </header>

    <div class="container" ng-view>

      <div ng-controller="MainCtrl">
        <div id="top">
          <div id="selected-technology">
            <div ng-repeat="t in technologyArray">{{t.value}}<span class="close" ng-click="close_technology(t)">x</span></div>
          </div>
        </div>

        <div id="left">

          <input type="text" ng-model="technologySearch" />
          <div id="technology">
            <div ng-repeat="t in technology | filter:technologySearch" ng-click="addTechnology(t)">{{t.value}}</div>
          </div>
        </div>
        <div id="right">
          <div id="profile">
            <div ng-repeat="p in profiles | technologyFilter:technologyArray" class="profile-item">
              <div class="name">{{p.name}}</div>
              <div class="link"><a href="{{p.link}}">link</a></div>
              <div>{{p.tids | json}}</div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <hr/>
    <footer class="navbar">
      <div class="container">
        <p>&copy; <a href="http://www.burningbuttons.com">BurningButtons 2013</a></p>
      </div>
    </footer>

  </body>
</html>
