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
}
