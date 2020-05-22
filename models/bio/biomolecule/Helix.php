<?php

namespace app\models\bio\biomolecule;

use Iterator;

/**
 * ContactForm is the model behind the contact form.
 */
class Helix
{
    /** @var NucleicAcid $code */
    public $code;

    /** @param NucleicAcid $code */
    function __construct($code = null)
    {
        $this->code = $code;
    }

    function __toString()
    {
        return strval($this->code);
    }

    public function getStream(){
        return $this->code->getFirstStream();
    }

    public function getStreamReverse(){
        return $this->code->getSecondStream();
    }

    public function invert(){
        return $this->code->invert();
    }

    /**
     * @return NucleicAcid
     */
    public function transcribe(){
        return $this->code->transcribe();
    }
}
