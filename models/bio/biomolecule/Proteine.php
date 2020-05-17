<?php

namespace app\models\bio\biomolecule;

use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class Proteine extends Biomolecule
{
    public $name;

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
