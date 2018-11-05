<?php

namespace Nfq\Akademija;

class BookingManager
{
    
    public static function bookRoom(Room $room, Reservation $reservation): void
    {
        try {
            $room->addReservation($reservation);
            echo 'Room <strong>'.$room->getRoomNumber().'</strong> successfully booked for <strong>'.$reservation->getGuest()->getFirstName().' '.$reservation->getGuest()->getLastName().'</strong> from <time>'.$reservation->getStartDate()->format('Y-m-d').'</time> to <time>'.$reservation->getEndDate()->format('Y-m-d').'</time>!';
            
        }
        catch (ReservableException $exception) {
            echo $exception->getMessage();
        }
    }
    
}
