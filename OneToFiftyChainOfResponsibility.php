<?php
include 'handlers.php';

class OneToFiftyChainOfResponsibility
{
    private $minValue = 1;
    private $maxValue = 50;

    public function generate()
    {
        $divisionByFive = new DivisionByFiveHandler();
        $divisionBySeven = new DivisionBySevenHandler();

        $final = new FinalValueHandler();

        $divisionByFive->setNext($divisionBySeven)->setNext($final);

        $generator = $this->generator($divisionByFive);
        foreach ($generator as $value) {
            echo "$value\n";
        }
    }


    private function generator(Handler $handler)
    {
        for ($i = $this->minValue; $i <= $this->maxValue; $i++) {
            $result = $handler->handle($i);
            yield $result;
        }
    }

    // Setters
    public function setMinValue($value)
    {
        if (isset($value) && $value != 0) $this->minValue = $value;
    }

    public function setMaxValue($value)
    {
        if (isset($value) && $value != 0) $this->maxValue = $value;
    }

}