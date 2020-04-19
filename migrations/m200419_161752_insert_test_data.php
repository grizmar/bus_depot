<?php

use yii\db\Migration;
use yii\db\Query;

/**
 * Class m200419_161752_insert_test_data
 */
class m200419_161752_insert_test_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('bus', ['name', 'speed'], $this->getBuses());
        $this->batchInsert('driver', ['full_name', 'birthday', 'bus'], $this->getDrivers());

        $this->getDrivers();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('driver');
        $this->delete('bus');
    }

    /**
     * @return array Возвращает массив автобусов для заполнения тестовых данных
     */
    protected function getBuses(): array
    {
        return [
            ['Scania', rand(40, 100)],
            ['Man', rand(40, 100)],
            ['TAZ', rand(40, 100)],
            ['PAZ', rand(40, 100)],
            ['Lada', rand(40, 100)],
            ['Ford', rand(40, 100)],
            ['Mersedes', rand(40, 100)],
            ['Audi', rand(40, 100)],
        ];
    }

    /**
     * @return array Возвращает массив водителей для заполнения тестовых данных
     */
    protected function getDrivers(): array
    {
        $busRows = (new Query())
            ->select(['id'])
            ->from('bus')
            ->all();

        $busCount = count($busRows);

        if ($busCount == 0) {
            throw new \yii\db\Exception('Ошибка получения списка автобусов из таблицы bus');
        }

        return [
            [
                'Иванов Сергей Александрович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Петров Андрей Викторович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Демченков Игорь Николаевич',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Харитонов Демид Демидович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Земляков Игорь Игоревич',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Хомяков Степан Демидович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Дартаньян Степан Степанович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Горемыков Левша Андреевич',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Ситников Виктор Геннадиевич',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Афанасьев Корнелий Богуславович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Блохин Корней Иосифович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Коновалов Юлиан Серапионович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Дьячков Дмитрий Георгиевич',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Маслов Игорь Адольфович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Орехов Георгий Тарасович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Родионов Азарий Дамирович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Маслов Власий Вячеславович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Смирнов Тимур Макарович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Сергеев Пантелеймон Данилович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Лазарев Марк Фролович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Лапин Клемент Львович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Иванков Овидий Яковович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Прохоров Севастьян Геннадиевич',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Кулаков Авраам Гордеевич',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Молчанов Эрик Мэлсович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Комиссаров Адам Тарасович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
            [
                'Журавлёв Родион Антонович',
                rand(1970, 2000) . '-' . sprintf("%02d", rand(1, 12)) . '-' . sprintf("%02d", rand(1, 28)),
                $busRows[rand(0, $busCount - 1)]['id']
            ],
        ];
    }
}
