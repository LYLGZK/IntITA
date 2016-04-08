<?php

class ConsultantController extends TeacherCabinetController
{
    public function actionModules($id)
    {
        $consultant = RegisteredUser::userById($id);
        $modules = $consultant->getAttributesByRole(UserRoles::CONSULTANT)[0];

        $this->renderPartial('/_consultant/_modules', array(
            'attribute' => $modules,
            'user' => $consultant
        ), false, true);
    }

    public function actionConsultations()
    {
        $this->renderPartial('/_consultant/_consultations', array(), false, true);
    }

    public function actionGetConsultationsList(){
        echo Consultationscalendar::consultationsList(Yii::app()->user->getId());
    }
}