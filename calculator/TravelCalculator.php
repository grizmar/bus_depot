<?php
namespace app\calculator;

use Exception;
use GuzzleHttp\Client;
use RuntimeException;

class TravelCalculator
{
    const URI = 'https://maps.googleapis.com/maps/api/distancematrix/json';
    const UNITS = 'imperial';
    //TODO Поскольку api платный ключа нет, следует вынести в конфиг
    const API_KEY = '';

    /**
     * Получает дистанцию между двумя городами в метрах
     * @param string $origins начальный город
     * @param string $destinations конечный город
     * @return int
     * @throws Exception|RuntimeException
     */
    public static function getDistance(string $origins, string $destinations) {
        $uri     = static::URI;
        $units   = static::UNITS;
        $api_key = static::API_KEY;

//        $client  = new Client();
//
//        $res             = $client->get("{$uri}?units={$units}&origins={$origins}&destinations={$destinations}&key={$api_key}");
//        $responseContent = $res->getBody();


//        if (empty($responseContent)) {
//            throw new \RuntimeException('Возникла ошибка при обращении к сервису googleapis');
//        }

//        $responseData = json_decode($responseContent, true);

        //TODO здесь подставляются тестовые данные, так как отсутствует ключ для api googleapis
        $responseData = static::$testResponse;

        if (empty($responseData)) {
            throw new RuntimeException('Возникла ошибка обработки данных от googleapis');
        }

        if (empty($responseData['status']) || $responseData['status'] != 'OK') {
            throw new RuntimeException('Возникла ошибка получения дистанции от googleapis');
        }

        if (empty($responseData['rows'])) {
            throw new RuntimeException('Возникла ошибка получения дистанции от googleapis. Ответ не соответствует формату в документации');
        }

        $minDistance = null;

        foreach ($responseData['rows'] as $rows) {
            foreach ($rows['elements'] as $element) {
                $distance = $element['distance']['value'];

                if ($minDistance === null || $minDistance > $distance) {
                    $minDistance = (int)$distance;
                }
            }
        }

        if ($minDistance === null) {
            throw new Exception('Возникла ошибка получения дистанции от googleapis. Сервис googleapis не смог расчитать дистанцию по заданным городам');
        }

        return $minDistance;
    }

    /**
     * @var array Тестовый массив с ответом от googleapis
     * https://developers.google.com/maps/documentation/distance-matrix/intro?hl=ru
     */
    protected static $testResponse = [
        'status'                => 'OK',
        'origin_addresses'      =>
            [
                0 => 'Vancouver, BC, Canada',
                1 => 'Seattle, État de Washington, États-Unis',
            ],
        'destination_addresses' =>
            [
                0 => 'San Francisco, Californie, États-Unis',
                1 => 'Victoria, BC, Canada',
            ],
        'rows'                  =>
            [
                0 =>
                    [
                        'elements' =>
                            [
                                0 =>
                                    [
                                        'status'   => 'OK',
                                        'duration' =>
                                            [
                                                'value' => 340110,
                                                'text'  => '3 jours 22 heures',
                                            ],
                                        'distance' =>
                                            [
                                                'value' => 1734542,
                                                'text'  => '1 735 km',
                                            ],
                                    ],
                                1 =>
                                    [
                                        'status'   => 'OK',
                                        'duration' =>
                                            [
                                                'value' => 24487,
                                                'text'  => '6 heures 48 minutes',
                                            ],
                                        'distance' =>
                                            [
                                                'value' => 129324,
                                                'text'  => '129 km',
                                            ],
                                    ],
                            ],
                    ],
                1 =>
                    [
                        'elements' =>
                            [
                                0 =>
                                    [
                                        'status'   => 'OK',
                                        'duration' =>
                                            [
                                                'value' => 288834,
                                                'text'  => '3 jours 8 heures',
                                            ],
                                        'distance' =>
                                            [
                                                'value' => 1489604,
                                                'text'  => '1 490 km',
                                            ],
                                    ],
                                1 =>
                                    [
                                        'status'   => 'OK',
                                        'duration' =>
                                            [
                                                'value' => 14388,
                                                'text'  => '4 heures 0 minutes',
                                            ],
                                        'distance' =>
                                            [
                                                'value' => 135822,
                                                'text'  => '136 km',
                                            ],
                                    ],
                            ],
                    ],
            ],
    ];
}