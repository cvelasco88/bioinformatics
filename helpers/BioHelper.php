<?php

namespace app\helpers;

use app\models\bio\biomolecule\Helix;
use app\models\bio\biomolecule\HelixSimple;
use app\models\bio\biomolecule\NucleicAcidSimpleStream;
use app\models\bio\biomolecule\NucleoBase;
use app\models\bio\biomolecule\NucleoBaseHelper;
use Exception;
use stdClass;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class BioHelper
{
    /** 
     * Create Helix
     * @param string $str
    */
    public static function createHelix($str)
    {
        $nbArray = [];
        $count = strlen($str);
        for ($i = 0; $i < $count; $i++){
            $char = $str[$i];
            $nb = NucleoBaseHelper::getBaseBySymbol($char);
            array_push($nbArray, $nb);
        }
        $naSimple = new NucleicAcidSimpleStream($nbArray);
        $helix = new Helix($naSimple);
        return $helix;
    }
}
