<?php

namespace app\models\bio\biomolecule\base;

use stdClass;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
abstract class BioBase
{

    /** */
    function __construct()
    {
        // parent::__construct();
    }

    /** getters & setters */
    
    /** 
     * @return string
    */
    public abstract function getSymbol();

    public function __toString()
    {
        return $this->getSymbol();
    }
}
