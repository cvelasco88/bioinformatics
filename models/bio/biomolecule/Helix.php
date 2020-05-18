<?php

namespace app\models\bio\biomolecule;

use Iterator;

/**
 * ContactForm is the model behind the contact form.
 */
class Helix extends Biomolecule implements Iterator
{
    /** @var NucleoBase[] $nbpArray */
    public $nbpArray;
    /** */
    private $index = 0;

    /**
     * @param NucleoBase[] $nbpArray
     */
    function __construct($nbpArray = [])
    {
        $this->nbpArray = $nbpArray;
    }

    /** Array Methods */

    public function current()
    {
        return $this->nbpArray[$this->index];
    }

    public function next()
    {
        $this->index++;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return isset($this->nbpArray[$this->key()]);
    }

    public function rewind()
    {
        $this->index = 0;
    }

    public function reverse()
    {
        $this->nbpArray = array_reverse($this->nbpArray);
        $this->rewind();
    }

    public function __toString()
    {
        return join("", array_map(function($nb){
            return strval($nb);
        }, $this->nbpArray));
    }
}
