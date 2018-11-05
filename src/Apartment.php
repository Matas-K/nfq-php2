<?php

namespace Nfq\Akademija;

class Apartment extends Room
{
    public function __construct(int $roomNumber, int $bedCount)
    {
        parent::__construct($roomNumber, $bedCount);
        
        $this->setBedCount(4);
        $this->setRoomType('Diamond');
        $this->setIsRestroom(true);
        $this->setIsBalcony(true);
        $this->setExtras([
            'TV',
            'Air conditioner',
            'Refrigerator',
            'Kitchen box',
            'Mini-bar',
            'Bathtub',
            'Free Wi-fi',
        ]);
    }
}