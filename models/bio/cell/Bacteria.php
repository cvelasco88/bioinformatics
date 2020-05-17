<?php

namespace app\models\bio\cell;

/**
 * ContactForm is the model behind the contact form.
 */
class Bacteria extends ProkaryoticCell
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

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
