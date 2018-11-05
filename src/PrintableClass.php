<?php

namespace Nfq\Akademija;

trait PrintableClass
{

    public function __toString()
    {
        return \serialize($this);
    }

}