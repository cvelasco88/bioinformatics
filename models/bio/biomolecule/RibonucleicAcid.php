<?php

namespace app\models\bio\biomolecule;

use stdClass;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class RibonucleicAcid extends NucleicAcid
{
    /** 
     * @return DeoxyribonucleicAcid
    */
    public function transcribe()
    {
        $pairs = [];

        foreach($this as $pair){
            $newPair = $pair->transcribe(NucleoBaseHelper::MODE_RNA);
            array_push($pairs, $newPair);
        }
        $newNA = new DeoxyribonucleicAcid($pairs);
        return $newNA;
    }
}
