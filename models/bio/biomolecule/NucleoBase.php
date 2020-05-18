<?php

namespace app\models\bio\biomolecule;

use stdClass;
use app\models\bio\biomolecule\base\Adenine;
use app\models\bio\biomolecule\base\Cytosine;
use app\models\bio\biomolecule\base\Guanine;
use app\models\bio\biomolecule\base\Tymine;
use app\models\bio\biomolecule\base\Uracil;

/**
 * ContactForm is the model behind the contact form.
 */
class NucleoBase extends stdClass
{
    /** @var BioBase bioBase */
    public $bioBase;

    /** 
     * @param BioBase $bioBase
    */
    function __construct($bioBase = null)
    {
        // parent::__construct();
        $this->bioBase = $bioBase;
    }

    /**
     * @return string
     */
    public function getSymbol(){
        return $this->bioBase->getSymbol();
    }

    /**
     * @param int $mode (0 = dna, 1 = rna)
     * @return string
     */
    public function complementary($mode = 0){
        $currentSymbol = $this->bioBase->getSymbol();
        $symbol = NucleoBaseHelper::complementary($currentSymbol, $mode);
        $complementary = NucleoBaseHelper::getBaseBySymbol($symbol);
        $nb = new NucleoBase($complementary);
        return $nb;
    }

    /**
     * @param int $mode (0 = dna, 1 = rna)
     * @return string
     */
    public function transcribe($mode = 0){
        $currentSymbol = $this->bioBase->getSymbol();
        $symbol = NucleoBaseHelper::transcribe($currentSymbol, $mode);
        $complementary = NucleoBaseHelper::getBaseBySymbol($symbol);
        $nb = new NucleoBase($complementary);
        return $nb;
    }

    public function __toString()
    {
        return $this->getSymbol();
    }
}
