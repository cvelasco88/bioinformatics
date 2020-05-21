<?php

namespace app\models\bio\biomolecule;

use Iterator;

/**
 * ContactForm is the model behind the contact form.
 */
abstract class NucleicAcid extends Biomolecule implements Iterator
{
    /**
     */
    function __construct()
    {
    }

    /** */
    public abstract function getFirstStream();

    /** */
    public abstract function getSecondStream();

    function __toString()
    {        
        return strval($this->getFirstStream());
    }
}
