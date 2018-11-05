<?php

namespace Nfq\Akademija;

class Bedroom extends Room
{
    public function __construct(int $roomNumber, int $bedCount)
    {
        parent::__construct($roomNumber, $bedCount);
        
        $this->setBedCount(2);
        $this->setRoomType('Gold');
        $this->setIsRestroom(true);
        $this->setIsBalcony(true);
        $this->setExtras([
            'TV',
            'Air conditioner',
            'Refrigerator',
            'Minibar',
            'Bathtub',
        ]);
    }
}