<?php

namespace app\models\bio\component\organelle;

use app\models\bio\component\BioComponent;
use stdClass;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class Cytosol extends BioComponent
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
