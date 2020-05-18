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
class NucleoBaseHelper
{
    const MODE_DNA = 0;
    const MODE_RNA = 1;

    /**
     * @param string $symbol
     */
    static function getBaseBySymbol($symbol){
        $bioBase = null;
        $symbol = strtoupper($symbol);
        switch($symbol){
            case Adenine::symbol:
                $bioBase = new Adenine;
            break;
            case Cytosine::symbol:
                $bioBase = new Cytosine;
            break;
            case Guanine::symbol:
                $bioBase = new Guanine;
            break;
            case Tymine::symbol:
                $bioBase = new Tymine;
            break;
            case Uracil::symbol:
                $bioBase = new Uracil;
            break;
        }
        return $bioBase;
    }

    /** 
     * @param string $value
     * @param int $mode (0 = dna, 1 = rna)
    */
    static function complementary($value, $mode = self::MODE_DNA)
    {
        $result = null;

        switch($mode){
            case self::MODE_DNA:
                $result = self::complementaryDNA($value);
            break;
            case self::MODE_RNA:
                $result = self::complementaryRNA($value);
            break;
        }

        return $result;
    }

    /** 
     * @param string $value
    */
    static function complementaryDNA($value)
    {
        $result = null;

        switch($value){
            case Adenine::symbol:
                $result = Tymine::symbol;
            break;
            case Tymine::symbol:
                $result = Adenine::symbol;
            break;
            case Cytosine::symbol:
                $result = Guanine::symbol;
            break;
            case Guanine::symbol:
                $result = Cytosine::symbol;
            break;
        }

        return $result;
    }

    /** 
     * @param string $value
    */
    static function complementaryRNA($value)
    {
        $result = null;

        switch($value){
            case Adenine::symbol:
                $result = Uracil::symbol;
            break;
            case Uracil::symbol:
                $result = Adenine::symbol;
            break;
            case Cytosine::symbol:
                $result = Guanine::symbol;
            break;
            case Guanine::symbol:
                $result = Cytosine::symbol;
            break;
        }

        return $result;
    }

    /**
     * @param string $value
     * @param int $mode (0 = dna, 1 = rna)
     */
    static function transcribe($value, $mode = self::MODE_DNA)
    {
        $result = null;
        switch($mode){
            case self::MODE_DNA:
                $result = self::transcribeDNA($value);
            break;
            case self::MODE_RNA:
                $result = self::transcribeRNA($value);
            break;
        }

        return $result;
    }

    /**
     * @param string $value
     */
    static function transcribeDNA($value)
    {
        $result = null;
        switch($value){
            case Adenine::symbol:
                $result = Uracil::symbol;
            break;
            case Tymine::symbol:
                $result = Adenine::symbol;
            break;
            case Cytosine::symbol:
                $result = Guanine::symbol;
            break;
            case Guanine::symbol:
                $result = Cytosine::symbol;
            break;
        }
        return $result;
    }

    /**
     * @param string $value
     */
    static function transcribeRNA($value)
    {
        $result = null;
        switch($value){
            case Adenine::symbol:
                $result = Tymine::symbol;
            break;
            case Uracil::symbol:
                $result = Adenine::symbol;
            break;
            case Cytosine::symbol:
                $result = Guanine::symbol;
            break;
            case Guanine::symbol:
                $result = Cytosine::symbol;
            break;
        }

        return $result;
    }

}
