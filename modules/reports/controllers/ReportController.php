<?php

namespace app\modules\reports\controllers;

use app\model_extended\ReportModel;
use Yii;
use app\models_search\ReportSearch;

class ReportController extends \yii\web\Controller
{

    public function actionGeneralReports()
    {
        $this->view->title = 'Sales & General Reports';

        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('general-reports', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'context' => ReportModel::CONTEXT_GENERAL,
        ]);
    }

    public function actionChefReports()
    {
        return $this->render('chef-reports');
    }

    public function actionDistrictReports()
    {
        return $this->render('district-reports');
    }


    public function actionRiderReports()
    {
        return $this->render('rider-reports');
    }

    public function actionSalesReports()
    {
        return $this->render('sales-reports');
    }

}
