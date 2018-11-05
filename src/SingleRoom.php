<?php

namespace Nfq\Akademija;

class SingleRoom extends Room
{
    public function __construct(int $roomNumber, int $bedCount)
    {
        parent::__construct($roomNumber, $bedCount);
        
        $this->setBedCount(1);
        $this->setRoomType('Standard');
        $this->setIsRestroom(true);
        $this->setIsBalcony(false);
        $this->setExtras([
            'TV',
            'Air conditioner',
        ]);
    }
}