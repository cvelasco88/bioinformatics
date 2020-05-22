<?php

namespace app\models\bio\biomolecule;

use Iterator;

/**
 * ContactForm is the model behind the contact form.
 */
abstract class NucleicAcid extends Biomolecule implements Iterator
{
    /** @var int $mode */
    public $mode = NucleoBaseHelper::MODE_DNA;

    /**
     */
    function __construct()
    {
    }

    /**
     * @return NucleoBase[]
     */
    public abstract function getFirstStream();

    /** 
     * @return NucleoBase[]
    */
    public abstract function getSecondStream();

    /**
     * @return NucleicAcid
     */
    public abstract function invert();

    /**
     * @return NucleicAcid
     */
    public abstract function transcribe();

    /** */
    function __toString()
    {        
        return strval($this->getFirstStream());
    }
}
