/**
 * Created by Wizlight on 04.12.2015.
 */
'use strict';

/* App Module */
angular
    .module('lessonApp', ['ui.bootstrap', 'ipCookie','ui.router']);

angular
    .module('lessonEdit', ['ngCkeditor']);

angular
    .module('mainApp', ['mainApp.directives']);