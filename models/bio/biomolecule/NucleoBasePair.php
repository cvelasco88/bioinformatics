<?php

namespace app\models\bio\biomolecule;

use stdClass;
use app\models\bio\biomolecule\NucleicAcid;

/**
 * ContactForm is the model behind the contact form.
 */
class NucleoBasePair
{
    /** @var NucleoBase $first */
    public $first;
    /** @var NucleoBase $second */
    public $second;

    /** */
    public function __construct($first = null, $second = null)
    {
        $this->first = $first;
        $this->second = $second;
    }

    /** */
    public function transcribe($mode = 0)
    {
        $tFirst = $this->first->transcribe($mode);
        $tSecond = $this->second->transcribe($mode);
        $nbpNew = new NucleoBasePair($tFirst, $tSecond);
        return $nbpNew;
    }
}
