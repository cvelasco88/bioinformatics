<?php

namespace app\models\bio\biomolecule;

use stdClass;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class DeoxyribonucleicAcid extends NucleicAcid
{
    /** 
     * @return RibonucleicAcid
    */
    public function transcribe()
    {
        $pairs = [];

        foreach($this as $pair){
            $newPair = $pair->transcribe(NucleoBaseHelper::MODE_DNA);
            array_push($pairs, $newPair);
        }
        $newNA = new RibonucleicAcid($pairs);
        return $newNA;
    }
}
