<?php

namespace app\models\bio\biomolecule\base;

use stdClass;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
abstract class BioBase extends stdClass
{

    /** */
    function __construct()
    {
        // parent::__construct();
    }

    /** getters & setters */
    
    /** */
    public abstract function getSymbol();
}