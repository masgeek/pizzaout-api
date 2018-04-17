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
        $dataProvider = $searchModel->GeneralSearch(Yii::$app->request->queryParams);

        return $this->render('general-reports', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'context' => ReportModel::CONTEXT_GENERAL,
        ]);
    }

    public function actionChefReports($chef_id = null)
    {
        $this->view->title = 'Chef Reports';

        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->GeneralSearch(Yii::$app->request->queryParams);

        return $this->render('general-reports', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'context' => ReportModel::CONTEXT_CHEF,
        ]);
    }

    public function actionDistrictReports($location_id = null)
    {
        $this->view->title = 'Location/District Reports';

        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->GeneralSearch(Yii::$app->request->queryParams);

        return $this->render('general-reports', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'context' => ReportModel::CONTEXT_LOCATION,
        ]);
    }


    public function actionRiderReports($rider_id=null)
    {
        $this->view->title = 'Rider Reports';

        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->GeneralSearch(Yii::$app->request->queryParams);

        return $this->render('general-reports', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'context' => ReportModel::CONTEXT_RIDER,
        ]);
    }

    public function actionSalesReports()
    {
        return $this->render('sales-reports');
    }

}
