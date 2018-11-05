<?php

namespace Nfq\Akademija;

interface ReservableInterface
{
    public function addReservation(Reservation $reservation): ReservableInterface;
    
    public function removeReservation(Reservation $reservation): ReservableInterface;
}