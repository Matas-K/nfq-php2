<?php

namespace Nfq\Akademija;

class Reservation
{
    use PrintableClass;
    
    private $startDate;
    private $endDate;
    private $guest;
    
    public function __construct(\DateTimeInterface $startDate, \DateTimeInterface $endDate, HumanInterface $guest)
    {
        if(!$this->isValidInterval($startDate, $endDate)){
            throw new ReservationException('End date must be later than start date');
        }
        
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->guest = $guest;
    }
    
    public function getStartDate(): \DateTimeInterface
    {
        return $this->startDate;
    }

    public function getEndDate(): \DateTimeInterface
    {
        return $this->endDate;
    }

    public function getGuest(): HumanInterface
    {
        return $this->guest;
    }

    public function setStartDate(\DateTimeInterface $startDate): Reservation
    {
        if(!$this->isValidInterval($startDate, $this->endDate)){
            throw new ReservationException('Start date must be before end date');
        }
        
        $this->startDate = $startDate;
        return $this;
    }

    public function setEndDate(\DateTimeInterface $endDate): Reservation
    {
        if(!$this->isValidInterval($this->startDate, $endDate)){
            throw new ReservationException('End date must be later than start date');
        }
        
        $this->endDate = $endDate;
        return $this;
    }

    public function setGuest(HumanInterface $guest): Reservation
    {
        $this->guest = $guest;
        return $this;
    }

    protected function isValidInterval(\DateTimeInterface $startDate, \DateTimeInterface $endDate): bool
    {
        return ($startDate <= $endDate);
    }
}