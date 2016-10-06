/**
 * Created by adm on 26.07.2016.
 */
angular
    .module('studentRouter',['ui.router']).
config(function ($stateProvider, $urlRouterProvider, $locationProvider) {
    $stateProvider
        .state('students', {
            url: "/students",
            cache         : false,
            controller: function($scope){
                $scope.changePageHeader('Студент');
            },
            templateUrl: basePath+"/_teacher/cabinet/loadPage/?page=student",
        })
        .state('students/courses', {
            url: "/students/courses",
            cache         : false,
            controller: function($scope){
                $scope.changePageHeader('Курси/модулі');
            },
            templateUrl: basePath+"/_teacher/_student/student/index/id/"+user,
        })
        .state('students/consultations', {
            url: "/students/consultations",
            cache         : false,
            controller: function($scope){
                $scope.changePageHeader('Консультації');
            },
            templateUrl: basePath+"/_teacher/_student/student/consultations/id/"+user,
        })
        .state('student/finances', {
            url: "/students/finances",
            cache         : false,
            controller: function($scope){
                $scope.changePageHeader('Фінанси');
            },
            templateUrl: basePath+"/_teacher/_student/student/finances/id/"+user,
        })
        .state('students/viewConsultation/:consultationId', {
            url: "/students/viewConsultation/:consultationId",
            cache         : false,
            controller: function($scope){
                $scope.changePageHeader('Консультація');
            },
            templateUrl: function($stateParams){
                return basePath+"/_teacher/_student/student/consultation/id/"+$stateParams.consultationId;
            }
        })
        .state('students/agreement/:agreementId', {
            url: "/students/agreement/:agreementId",
            cache         : false,
            templateUrl: function($stateParams){
                return basePath+"/_teacher/_student/student/agreement/id/"+$stateParams.agreementId;
            }
        })
});
