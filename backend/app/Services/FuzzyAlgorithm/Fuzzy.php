<?php

namespace App\Services\FuzzyAlgorithm;

class Fuzzy
{
    private $uLeft = 0;
    private $uCenter = 0;
    private $uRight = 0;
    private $x;
    private $leftC;
    private $leftD;
    private $ctrA;
    private $ctrB;
    private $ctrC;
    private $rightA;
    private $rightB;

    public function __construct($x, $a, $b, $c)
    {
        $this->x = $x;
        $this->leftC = $a;
        $this->leftD = $b;
        $this->ctrA = $a;
        $this->ctrB = $b;
        $this->ctrC = $c;
        $this->rightA = $b;
        $this->rightB = $c;
    }

    public function fuzzification()
    {
        // Fuzzification for the left trapezoid
        if ($this->x <= $this->leftC) {
            $this->uLeft = 1;
        }
        if ($this->x > $this->leftC && $this->x < $this->leftD) {
            $this->uLeft = ($this->leftD - $this->x) / ($this->leftD - $this->leftC);
        }
        if ($this->x >= $this->leftD) {
            $this->uLeft = 0;
        }

        // Fuzzification for the center triangle
        if ($this->x <= $this->ctrA || $this->x >= $this->ctrC) {
            $this->uCenter = 0;
        }
        if ($this->x > $this->ctrA && $this->x < $this->ctrB) {
            $this->uCenter = ($this->x - $this->ctrA) / ($this->ctrB - $this->ctrA);
        }
        if ($this->x === $this->ctrB) {
            $this->uCenter = 1;
        }
        if ($this->x > $this->ctrB && $this->x < $this->ctrC) {
            $this->uCenter = ($this->ctrC - $this->x) / ($this->ctrC - $this->ctrB);
        }

        // Fuzzification for the right trapezoid
        if ($this->x <= $this->rightA) {
            $this->uRight = 0;
        }
        if ($this->x > $this->rightA && $this->x < $this->rightB) {
            $this->uRight = ($this->x - $this->rightA) / ($this->rightB - $this->rightA);
        }
        if ($this->x >= $this->rightB) {
            $this->uRight = 1;
        }

        return ["lRes"=>$this->uLeft, "mRes"=>$this->uCenter, "rRes"=>$this->uRight];
    }


}
