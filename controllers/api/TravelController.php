<?php

namespace app\controllers\api;

use app\calculator\TravelCalculator;
use app\models\Driver;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Uri;
use http\Exception\RuntimeException;
use Yii;
use app\models\Bus;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\log\Logger;
use yii\web\Controller;
use yii\web\Response;

/**
 * TravelController
 */
class TravelController extends Controller
{
    /**
     * Список водителей с расчетом времени в пути между указанными городами
     *
     * GET params:
     *      id идентификатор водителя
     *      origins начальный город для расчета дистанции
     *      destinations конечный город для расчета дистанции
     *      limit лимит выводимых записей
     *      offset смещение при выборке
     *
     * @return array
     * @throws Exception
     */
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $response = [];
        $request  = Yii::$app->request;

        $origins      = $request->get('origins');
        $destinations = $request->get('destinations');

        if (empty($origins)) {
            return ['error' => 'Не указан параметр origins (Начальный город для определения дистанции'];
        }

        if (empty($destinations)) {
            return ['error' => 'Не указан параметр destinations (Конечный город для определения дистанции'];
        }

        try {
            $distance = TravelCalculator::getDistance($origins, $destinations);

            $drivers = $this->getDriversQuery($distance)->all();
        } catch (Exception $e) {
            Yii::getLogger()->log($e->getMessage(), Logger::LEVEL_ERROR);

            return ['error' => 'Возникла ошибка при расчете дистанции между городами, попробуйте позже'];
        }

        if (count($drivers) == 0) {
            return [];
        }

        /** @var Driver $driver */
        foreach($drivers as $driver) {
            $burthdate = new \DateTime($driver['birthday']);
            $age       = $burthdate->diff(new \DateTime())->format("%Y");

            $response[] = [
                'id' => $driver['id'],
                'name' => $driver['full_name'],
                'birth_date' => $driver['birthday'],
                'age' => $age,
                'travel_time' => $driver['travel_time']
            ];
        }

        return $response;
    }

    /**
     * Возвращает запрос для получения списка водителей с расчетом времени в пути по указанной дистанции
     *
     * @param $distance int Дистанция между городами
     *
     * @return Query
     */
    protected function getDriversQuery($distance) {
        $request  = Yii::$app->request;

        $query = (new Query())
            ->select(['driver.id', 'driver.full_name', "DATE_FORMAT(driver.birthday, '%Y-%m-%d') as birthday", "ceil({$distance} / (bus.speed * 8)) as travel_time"])
            ->from(Driver::tableName())
            ->join('inner join', 'bus', '`driver`.bus = `bus`.id')
            ->orderBy('travel_time asc');

        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->get('offset')) {
            $query->limit($request->get('offset'));
        }

        if ($request->get('id')) {
            $query->andWhere('driver.id = :id', [':id' => $request->get('id')]);
        }

        return $query;
    }
}
