/**
 * Created by adm on 08.08.2016.
 */
angular
    .module('teacherApp')
    .controller('modulemanageCtrl',modulemanageCtrl);

function modulemanageCtrl ($scope, $http, DTOptionsBuilder, DTColumnDefBuilder){

    $scope.selectedTeacher=null;

    $http.get('/_teacher/_admin/module/getModulesList').then(function (data) {
        $scope.modulesList = data.data["data"];
    });

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withPaginationType('simple_numbers')
        .withLanguageSource('//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json');

    $scope.dtColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0).withOption('width', '8%'),
        DTColumnDefBuilder.newColumnDef(1).withOption('width', '15%'),
        DTColumnDefBuilder.newColumnDef(2).withOption('width', '8%'),
        DTColumnDefBuilder.newColumnDef(4).withOption('width', '10%'),
        DTColumnDefBuilder.newColumnDef(5).withOption('width', '17%'),
        DTColumnDefBuilder.newColumnDef(6).withOption('width', '10%'),
        DTColumnDefBuilder.newColumnDef(7).withOption('width', '10%'),
    ];

    $scope.addTeacher = function(moduleId, role, userId){
        $http({
            method: "POST",
            url:  "/_teacher/_admin/teachers/setTeacherRoleAttribute",
            data: $jq.param({"user":userId, "role":role, "attribute":"module", "attributeValue":moduleId }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
        }).success(function(response){
            if (response == "success") {
                bootbox.alert("Операцію успішно виконано.", function () {
                        switch (role) {
                            case "trainer":
                                break;
                            case "author":
                                location.hash = "module/view/"+moduleId;
                                break;
                            case "consultant":
                                location.hash = "module/view/"+moduleId;
                                break;
                            case "teacher_consultant":
                                break;
                        }
                }
                )}
            else {
                switch (role) {
                    case "trainer":
                        showDialog(response);
                        break;
                    case "author":
                        showDialog("Обраний модуль вже присутній у списку модулів даного викладача");
                        break;
                    case "consultant":
                        showDialog("Консультанту вже призначений даний модуль для консультацій");
                        break;
                    case "teacher_consultant":
                        showDialog("Обраний модуль вже присутній у списку модулів даного викладача");
                        break;
                    default:
                        showDialog("Операцію не вдалося виконати");
                        break;
                }
                }
        })
    };

    $scope.getTeachers = function(value) {
        return $http.get(basePath+'/_teacher/_admin/module/teachersByQuery', {
            params: {
                query: value
            }
        }).then(function(response){
            if (response.data.results)
                return response.data.results.map(function(item){
                    console.log(item);
                    return item;
                });
        });
    };

    $scope.onSelect = function ($item) {
        $scope.selectedTeacher = $item;
        console.log($item);
    };

    $scope.changeStatus = function(moduleId, status){
        var url;
        switch (status){
            case 'delete':
                url = basePath+'/_teacher/_admin/module/delete/id/'+moduleId;
                break;
            case 'restore':
                url = basePath+'/_teacher/_admin/module/restore/id/'+moduleId;
                break;
        }
        bootbox.confirm("Ви впевнені?", function (result) {
            if(result){
                $http({
                    method: "POST",
                    url:  url,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                }).success(function(message){
                    bootbox.alert(message);
                    location.hash = '/module/view/'+moduleId;
                }).error(function(){
                    bootbox.alert("Операцію не вдалося виконати.");
                })
            }
            else
            {
                bootbox.alert("Операцію відмінено");
            }
        })
    };
}
