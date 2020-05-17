<?php

namespace app\models\bio\biomolecule\base;

use stdClass;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
final class Cytosine extends BioBase
{
    const symbol = "C";

    /** */
    function __construct()
    {
        parent::__construct();
    }

    /* getters & setters */

    /** */
    public function getSymbol() {
        return self::symbol;
    }
}
