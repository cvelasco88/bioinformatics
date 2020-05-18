<?php

namespace app\models\bio\biomolecule\base;

use stdClass;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
final class Guanine extends BioBase
{
    const symbol = "G";

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
