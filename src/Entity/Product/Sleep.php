<?php

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Console\Helper\Table;

/**
 * Sleep
 * Note that this class extends Place
 * @ORM\Table(name="sleep")
 * @ORM\Entity
 * @Table(indexes={
 *          @Index(name="bed_index", columns={"bed"}), 
 *          @Index(name="wifi_index", columns={"wifi"}), 
 *          @Index(name="desk_index", columns={"desk"}), 
 *          @Index(name="airConditioning_index", columns={"airConditioning"}), 
 *          @Index(name="washingMachine_index", columns={"washingMachine"}), 
 *          @Index(name="outlet_index", columns={"outlet"}), 
 *          @Index(name="other_index", columns={"other"})
 * }) 
 * 
 */
class Sleep extends Place {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     */
    private $id;

    /**
     * @var int|null
     * @ORM\OneToOne(targetEntity="Place", mappedBy="amenities")
     * @ORM\Column(name="id_place", type="integer", nullable=true)
     */
    private $place;

    /**
     * @var int
     *
     * @ORM\Column(name="bed", type="integer", nullable=false)
     */
    private $bed;

    /**
     * @var string
     *
     * @ORM\Column(name="wifi", type="string", length=32, nullable=false)
     */
    private $wifi;

    /**
     * @var bool
     *
     * @ORM\Column(name="desk", type="boolean", nullable=false)
     */
    private $desk;

    /**
     * @var bool
     *
     * @ORM\Column(name="air_conditioning", type="boolean", nullable=false)
     */
    private $airConditioning;

    /**
     * @var bool
     *
     * @ORM\Column(name="washing_machine", type="boolean", nullable=false)
     */
    private $washingMachine;

    /**
     * @var string
     *
     * @ORM\Column(name="outlet", type="string", length=255, nullable=false)
     */
    private $outlet;

    /**
     * @var string
     *
     * @ORM\Column(name="other", type="string", length=255, nullable=false)
     */
    private $other;
    
    function getId() {
        return $this->id;
    }

    function getPlace() {
        return $this->place;
    }

    function getBed() {
        return $this->bed;
    }

    function getWifi() {
        return $this->wifi;
    }

    function getDesk() {
        return $this->desk;
    }

    function getAirConditioning() {
        return $this->airConditioning;
    }

    function getWashingMachine() {
        return $this->washingMachine;
    }

    function getOutlet() {
        return $this->outlet;
    }

    function getOther() {
        return $this->other;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPlace($place) {
        $this->place = $place;
    }

    function setBed($bed) {
        $this->bed = $bed;
    }

    function setWifi($wifi) {
        $this->wifi = $wifi;
    }

    function setDesk($desk) {
        $this->desk = $desk;
    }

    function setAirConditioning($airConditioning) {
        $this->airConditioning = $airConditioning;
    }

    function setWashingMachine($washingMachine) {
        $this->washingMachine = $washingMachine;
    }

    function setOutlet($outlet) {
        $this->outlet = $outlet;
    }

    function setOther($other) {
        $this->other = $other;
    }



}
