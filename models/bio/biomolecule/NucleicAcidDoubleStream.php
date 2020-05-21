<?php

namespace app\models\bio\biomolecule;


/**
 * ContactForm is the model behind the contact form.
 */
class NucleicAcidDoubleStream extends NucleicAcid
{
    /** */
    private $index = 0;

    /** @var NucleoBasePair[] $elems */
    public $elems;    
    /** @var int $mode */
    public $mode = NucleoBaseHelper::MODE_DNA;

    /**
     * @param NucleoBasePair[] $elems
     */
    function __construct($elems = [])
    {
        $this->elems = $elems;
    }

    /** Array Methods */

    public function current()
    {
        return $this->elems[$this->index];
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
        return isset($this->elems[$this->key()]);
    }

    public function rewind()
    {
        $this->index = 0;
    }

    public function reverse()
    {
        $this->elems = array_reverse($this->elems);
        $this->rewind();
    }

    public function __toString()
    {
        return join("", array_map(function($nbp){
            /** @var NucleoBasePair $nbp */
            return strval($nbp->first);
        }, $this->elems));
    }

    /** */
    public function getFirstStream(){
        return array_map(function($elem){
            /** @var NucleoBasePair $elem */
            return $elem->first;
        }, $this->elems);
    }

    /** */
    public function getSecondStream(){
        return array_map(function($elem){
            /** @var NucleoBasePair $elem */
            return $elem->second;
        }, $this->elems);
    }
}
