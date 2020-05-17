<?php

namespace app\models\bio\biomolecule;

use Iterator;

/**
 * ContactForm is the model behind the contact form.
 */
class NucleicAcid extends Biomolecule implements Iterator
{
    /** @var NucleoBasePair[] $nbpPairs */
    public $nbpPairs;
    /** */
    private $index = 0;

    /**
     * @param NucleoBasePair[] $nbpPairs
     */
    function __construct($nbpPairs = [])
    {
        $this->nbpPairs = $nbpPairs;
    }

    /** Array Methods */

    public function current()
    {
        return $this->nbpPairs[$this->index];
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
        return isset($this->nbpPairs[$this->key()]);
    }

    public function rewind()
    {
        $this->index = 0;
    }

    public function reverse()
    {
        $this->nbpPairs = array_reverse($this->nbpPairs);
        $this->rewind();
    }
}
{
    
}
