<?php

namespace app\models\bio\cell;

use stdClass;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
abstract class Cell extends stdClass
{
    public $membrane; // envelope
    public $cytoplasm;
    /** @var Biomolecule[] $biomolecules */
    public $biomolecules;
    public $cytoskeleton;

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
