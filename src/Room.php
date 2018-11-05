<?php

namespace Nfq\Akademija;

class Room implements ReservableInterface
{
    use PrintableClass;
    
    private const ROOM_TYPES = ['Standard', 'Gold', 'Diamond'];

    private $roomType = '';
    private $isRestroom = false;
    private $isBalcony = false;
    private $bedCount = 0;
    private $roomNumber = 0;
    private $extras = [];
    private $price = 0;
    private $reservations = [];
    
    public function __construct(int $roomNumber, int $bedCount)
    {
        $this->roomNumber = $roomNumber;
        $this->bedCount = $bedCount;
    }
    
    public function getRoomType(): string
    {
        return $this->roomType;
    }

    public function getIsRestroom(): bool
    {
        return $this->isRestroom;
    }

    public function getIsBalcony(): bool
    {
        return $this->isBalcony;
    }

    public function getBedCount(): int
    {
        return $this->bedCount;
    }

    public function getRoomNumber(): int
    {
        return $this->roomNumber;
    }

    public function getExtras(): array
    {
        return $this->extras;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setRoomType(string $roomType): ReservableInterface
    {
        if(!in_array($roomType, self::ROOM_TYPES)){
            throw new ReservableException(sprintf('Unknown room type %s', $roomType));
        }
        
        $this->roomType = $roomType;
        return $this;
    }

    public function setIsRestroom(bool $isRestroom): ReservableInterface
    {
        $this->isRestroom = $isRestroom;
        return $this;
    }

    public function setIsBalcony(bool $isBalcony): ReservableInterface
    {
        $this->isBalcony = $isBalcony;
        return $this;
    }

    public function setBedCount(int $bedCount): ReservableInterface
    {
        $this->bedCount = $bedCount;
        return $this;
    }

    public function setRoomNumber(int $roomNumber): ReservableInterface
    {
        $this->roomNumber = $roomNumber;
        return $this;
    }

    public function setExtras(array $extras): ReservableInterface
    {
        $this->extras = $extras;
        return $this;
    }

    public function setPrice(float $price): ReservableInterface
    {
        $this->price = $price;
        return $this;
    }
    
    public function addReservation(Reservation $reservation): ReservableInterface
    {
        $startDate = $reservation->getStartDate()->getTimestamp();
        $endDate = $reservation->getEndDate()->getTimestamp();
        
        foreach ($this->reservations as $oneReservation) {
            $oneStartDate = $oneReservation->getStartDate()->getTimestamp();
            $oneEndDate = $oneReservation->getEndDate()->getTimestamp();
            
            if($oneReservation === $reservation){
                throw new ReservableException('Reservation already exists!');
            }
            else if($startDate < $oneEndDate && $endDate > $oneStartDate){
                throw new ReservableException('Reservation is not possible!');
            }
        }
        
        $this->reservations[] = $reservation;
        return $this;
    }
    
    public function removeReservation(Reservation $reservation): ReservableInterface
    {
        foreach($this->reservations as $key => $oneReservation){
            if($oneReservation === $reservation){
                unset($this->reservations[$key]);
                return $this;
            }
        }
        
        return $this;
    }
}