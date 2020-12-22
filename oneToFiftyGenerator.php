<?php


class oneToFiftyGenerator
{
    private $minValue = 1;
    private $maxValue = 50;
    private $currentValue = 0;
    private $currentText = '';
    private $fifeWord = 'да';
    private $sevenWord = 'нет';

    public function generate()
    {

        $generator = $this->generator();
        foreach ($generator as $value) {
            echo "$value\n";
        }
    }


    private function generator()
    {

        for ($i = $this->minValue; $i <= $this->maxValue; $i++) {
            $this->currentValue = $i;
            $this->currentText = '';

            $this->checkDivisionByFive();
            $this->checkDivisionBySeven()  ;

            yield $this->getCurrentValue();
        }
    }

    private function checkDivisionByFive()
    {
        $this->currentText .= (($this->currentValue % 5) === 0) ? $this->fifeWord : '';
    }

    private function checkDivisionBySeven()
    {
        $this->currentText .= (($this->currentValue % 7) === 0) ? $this->sevenWord : '';
    }

    private function getCurrentValue()
    {
        return ($this->currentText != "") ? $this->currentText : $this->currentValue;
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