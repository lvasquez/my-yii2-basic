<?php

namespace app\modules\sales\controllers;

use Yii;
use app\modules\sales\models\InvoiceDetail;
use app\modules\sales\models\InvoiceDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InvoicedetailController implements the CRUD actions for InvoiceDetail model.
 */
class InvoicedetailController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all InvoiceDetail models.
     * @return mixed
     */
    public function actionIndex($id)
    {
         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $invoice_detail = InvoiceDetail::find()->where(['invoice_id' => $id])->all();
        return $invoice_detail;
    }



   

    
}
