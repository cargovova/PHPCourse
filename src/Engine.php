<?php
namespace app;
/*
 * Запуск двигателя.
 * Свойства: начальный такт, последний такт, количество циклов тактов.
 * Метод: запустить двигатель (последовательно 4 такта)
 */
class Engine
{

    const INIT_STATE = [
        0,1,3,2
    ];

    const COUNT_STATES = 4;

    public $countCicles;

    private $cylinders;

    public function __construct()
    {
        $this->countCicles = 5;
        for ($state = 0; $state < self::COUNT_STATES; $state++) {
            $this->cylinders[] = new Cylinder(self::INIT_STATE[$state]);
        }
    }

    function runEngine()
    {
        for ($counter = 0; $counter < $this->countCicles; $counter++) {
            \sleep(2);
            foreach ($this->cylinders as $key=>$cylinder) {
                $cylinder->run();
                echo 'Cylinder' . ++$key . ': ' . PHP_EOL;
                $cylinder->getStatus();
            }
        }
    }
}