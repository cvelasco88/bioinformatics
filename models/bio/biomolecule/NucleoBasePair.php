<?php

namespace app\models\bio\biomolecule;

use stdClass;
use app\models\bio\biomolecule\NucleicAcid;

/**
 * ContactForm is the model behind the contact form.
 */
class NucleoBasePair
{
    /** @var NucleoBase $nbp1 */
    public $nbp1;
    /** @var NucleoBase $nbp2 */
    public $nbp2;

    /** */
    public function __construct($nbp1 = null, $nbp2 = null)
    {
        $this->nbp1 = $nbp1;
        $this->nbp2 = $nbp2;
    }

    /** */
    public function transcribe($mode = 0)
    {
        $tNbp1 = $this->nbp1->transcribe($mode);
        $tNbp2 = $this->nbp2->transcribe($mode);
        $nbpNew = new NucleoBasePair($tNbp1, $tNbp2);
        return $nbpNew;
    }
}
