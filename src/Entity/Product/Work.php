<?php

namespace App\Entity\Product;

use App\Entity\Product\Place;
use Symfony\Component\Console\Helper\Table;


/**
 * Description of Work
 * Note that this class extends Place
 * @author Laeti
 * @ORM\Table(name="work")
 * @ORM\Entity
 * @Table(indexes={
 *          @Index(name="capacity_index", columns={"capacity"}), 
 *          @Index(name="privateDesk_index", columns={"privateDesk"}), 
 *          @Index(name="computer_index", columns={"computer"}), 
 *          @Index(name="printer_index", columns={"printer"}), 
 *          @Index(name="scanner_index", columns={"scanner"}), 
 *          @Index(name="projector_index", columns={"projector"}), 
 *          @Index(name="napStation_index", columns={"napStation"}), 
 *          @Index(name="whiteBoard_index", columns={"whiteBoard"}), 
 *          @Index(name="terrace_index", columns={"terrace"}), 
 *          @Index(name="freeDrink_index", columns={"freeDrink"}), 
 *          @Index(name="freeSnack_index", columns={"freeSnack"})
 * }) 
 */
class Work extends Place {

    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="capacity", type="integer", nullable=false)
     * @var int
     */
    private $capacity;

    /**
     * @ORM\Column(name="privateDesk", type="boolean", nullable=false)
     * @var bool 
     */
    private $privateDesk;

    /**
     * @ORM\Column(name="computer", type="boolean", nullable=false)
     * @var bool
     */
    private $computer;

    /**
     * @ORM\Column(name="printer", type="boolean", nullable=false)
     * @var bool 
     */
    private $printer;

    /**
     * @ORM\Column(name="scanner", type="boolean", nullable=false)
     * @var bool 
     */
    private $scanner;

    /**
     * @ORM\Column(name="projector", type="boolean", nullable=false)
     * @var bool 
     */
    private $projector;

    /**
     * @ORM\Column(name="napStation", type="boolean", nullable=false)
     * @var bool 
     */
    private $napStation;

    /**
     * @ORM\Column(name="whiteBoard", type="boolean", nullable=false)
     * @var bool 
     */
    private $whiteBoard;

    /**
     * @ORM\Column(name="terrace", type="boolean", nullable=false)
     * @var bool 
     */
    private $terrace;

    /**
     * @ORM\Column(name="freeDrink", type="boolean", nullable=false)
     * @var bool 
     */
    private $freeDrink;

    /**
     * @ORM\Column(name="freeSnack", type="boolean", nullable=false)
     * @var bool 
     */
    private $freeSnack;

    function getId() {
        return $this->id;
    }

    function getCapacity() {
        return $this->capacity;
    }

    function getPrivateDesk() {
        return $this->privateDesk;
    }

    function getComputer() {
        return $this->computer;
    }

    function getPrinter() {
        return $this->printer;
    }

    function getScanner() {
        return $this->scanner;
    }

    function getProjector() {
        return $this->projector;
    }

    function getNapStation() {
        return $this->napStation;
    }

    function getWhiteBoard() {
        return $this->whiteBoard;
    }

    function getTerrace() {
        return $this->terrace;
    }

    function getFreeDrink() {
        return $this->freeDrink;
    }

    function getFreeSnack() {
        return $this->freeSnack;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    function setPrivateDesk($privateDesk) {
        $this->privateDesk = $privateDesk;
    }

    function setComputer($computer) {
        $this->computer = $computer;
    }

    function setPrinter($printer) {
        $this->printer = $printer;
    }

    function setScanner($scanner) {
        $this->scanner = $scanner;
    }

    function setProjector($projector) {
        $this->projector = $projector;
    }

    function setNapStation($napStation) {
        $this->napStation = $napStation;
    }

    function setWhiteBoard($whiteBoard) {
        $this->whiteBoard = $whiteBoard;
    }

    function setTerrace($terrace) {
        $this->terrace = $terrace;
    }

    function setFreeDrink($freeDrink) {
        $this->freeDrink = $freeDrink;
    }

    function setFreeSnack($freeSnack) {
        $this->freeSnack = $freeSnack;
    }


}
