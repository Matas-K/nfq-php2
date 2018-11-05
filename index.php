<?php

require 'vendor/autoload.php';

use Nfq\Akademija\{
    SingleRoom,
    Guest,
    Reservation,
    BookingManager
};

$room = new SingleRoom(1408, 99);
$guest = new Guest('Vardenis', 'Pavardenis');
$startDate = new \DateTime('2018-11-01');
$endDate = new \DateTime('2018-11-05');
$reservation = new Reservation($startDate, $endDate, $guest);
BookingManager::bookRoom($room, $reservation);