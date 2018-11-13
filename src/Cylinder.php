<?php
namespace app;

class Cylinder
{
    // Константа состояний элементов цилиндра для каждого такта цилиндра
    const STATES = [
        [
            'piston' => false,
            'inputFlap' => true,
            'outputFlap' => false,
            'lamp' => false
        ],
        [
            'piston' => true,
            'inputFlap' => false,
            'outputFlap' => false,
            'lamp' => false
        ],
        [
            'piston' => false,
            'inputFlap' => false,
            'outputFlap' => false,
            'lamp' => true
        ],
        [
            'piston' => true,
            'inputFlap' => false,
            'outputFlap' => true,
            'lamp' => false
        ]
    ];

    private $piston;
    private $inputFlap;
    private $outputFlap;
    private $lamp;
    private $currentState;

    public function __construct($state)
    {
        $this->currentState = $state;
        $this->setStates($this->currentState);
    }

    public function run()
    {
        $this->setNextState();
        $this->setStates($this->currentState);
    }

    public function getStatus()
    {
        $this->getPistonStatus();
        $this->getInputFlapStatus();
        $this->getOutputFlapStatus();
        $this->getLampStatus();
    }

    private function getPistonStatus()
    {
        switch ($this->piston) {
            case true:
                echo 'piston up' . PHP_EOL;
                break;
            case false:
                echo 'piston down' . PHP_EOL;
                break;
        }
    }

    private function getInputFlapStatus()
    {
        switch ($this->inputFlap) {
            case true:
                echo 'input flap opened' . PHP_EOL;
                break;
            case false:
                echo 'input flap close' . PHP_EOL;
                break;
        }
    }
    
    private function getOutputFlapStatus()
    {
        switch ($this->outputFlap) {
            case true:
                echo 'output flap opened' . PHP_EOL;
                break;
            case false:
                echo 'output flap close' . PHP_EOL;
                break;
        }
    }
    
    private function getLampStatus()
    {
        switch ($this->lamp) {
            case true:
                echo 'flash' . PHP_EOL;
                break;
            case false:
                echo 'not flash' . PHP_EOL;
                break;
        }
    }
    
    private function setStates($state)
    {
        $this->piston = self::STATES[$state]['piston'];
        $this->inputFlap = self::STATES[$state]['inputFlap'];
        $this->outputFlap = self::STATES[$state]['outputFlap'];
        $this->lamp = self::STATES[$state]['lamp'];
    }

    private function setNextState()
    {
        if ($this->currentState === 3) {
            $this->currentState = 0;
        } else {
            $this->currentState ++;
        }
    }
}