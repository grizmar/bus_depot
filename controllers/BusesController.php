<?php

namespace app\controllers;

use Yii;
use app\models\Bus;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * BusesController implements the CRUD actions for Bus model.
 */
class BusesController extends Controller
{
    /**
     * Lists all Bus models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Bus::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
