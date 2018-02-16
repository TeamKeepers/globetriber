<?php

namespace App\Entity;

use App\Entity\Product\Place;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table(name="booking")
 * @ORM\Entity
 */
class Booking
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     * @ORM\Column(name="id_place", type="integer", nullable=true)
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="bookings")
     * 
     */
    private $place;

    /**
     *  @var DateTime
     *  @ORM\Column(name="arrival_date", type="date", nullable=false)
     * 
     */
    private $arrivalDate;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="departure_date", type="date", nullable=false)
     */
    private $departureDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="booking_status", type="boolean", nullable=false)
     */
    private $bookingStatus;

    function getId() {
        return $this->id;
    }

    function getPlace() {
        return $this->place;
    }

    function getArrivalDate(): DateTime {
        return $this->arrivalDate;
    }

    function getDepartureDate(): DateTime {
        return $this->departureDate;
    }

    function getBookingStatus() {
        return $this->bookingStatus;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPlace($place) {
        $this->place = $place;
    }

    function setArrivalDate(DateTime $arrivalDate) {
        $this->arrivalDate = $arrivalDate;
    }

    function setDepartureDate(DateTime $departureDate) {
        $this->departureDate = $departureDate;
    }

    function setBookingStatus($bookingStatus) {
        $this->bookingStatus = $bookingStatus;
    }



}
