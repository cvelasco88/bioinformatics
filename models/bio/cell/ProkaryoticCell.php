<?php

namespace app\models\bio\cell;

/**
 * ContactForm is the model behind the contact form.
 */
class ProkaryoticCell extends Cell
{
    /**
     * @var Gene[] $genes
     */
    public $genes;
    

    /** 
     * @param Gene[] $genes
    */
    function __construct($genes = null)
    {
        $this->genes = $genes;
    }

    function __destruct()
    {
        // print "Destruyendo " . $this->name . "\n";
        // parent::__destruct();
    }
}
