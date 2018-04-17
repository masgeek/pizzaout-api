<?php

namespace app\modules\reports\controllers;

use app\helpers\APP_UTILS;
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

        if (Yii::$app->request->isGet) {
            //set the title
            $search = Yii::$app->request->get('ReportSearch');

            $orderDate = $search['ORDER_DATE'];

            $date = explode("TO", $orderDate);

            $start = isset($date[0]) ? $date[0] : null;
            $end = isset($date[1]) ? $date[1] : null;

            $start = APP_UTILS::FormatDate(trim($start));
            $end = APP_UTILS::FormatDate(trim($end));


            if (strlen($start) > 2 && strlen($end) > 2) {
                $this->view->title = "Sales & General Reports between {$start} and {$end}";
            }
        }

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


    public function actionRiderReports($rider_id = null)
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
