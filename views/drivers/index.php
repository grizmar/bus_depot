<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Водители';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'full_name',
            [
                'attribute' => 'birthday',
                'format' => ['date', 'php:d.m.Y']
            ],
            'bus0.name',
            'bus0.speed',
        ],
    ]); ?>


</div>
