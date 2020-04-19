<?php

namespace app\controllers;

use app\models\Driver;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * DriversController implements the CRUD actions for Driver model.
 */
class DriversController extends Controller
{
    /**
     * Lists all Driver models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Driver::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
