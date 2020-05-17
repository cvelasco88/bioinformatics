<?php

namespace app\models\bio\biomolecule;

use stdClass;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class Gene extends stdClass
{
    /** @var NucleoBasePair nbp */
    public $nbp;
    
    /** */
    function __construct()
    {
        // print "En el constructor\n";
        // parent::__construct();
    }

    function __destruct()
    {
        // print "Destruyendo " . $this->name . "\n";
        // parent::__destruct();
    }
}
