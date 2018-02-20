<?php

namespace App\Entity;

use App\Entity\Booking;
use App\Entity\Media;
use App\Entity\Recommendation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Index;
use Symfony\Bridge\Doctrine\Tests\Fixtures\User;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Collection;


/**
 * Place
 * @ORM\Entity(repositoryClass="PlaceRepository")
 * @Table(
 *      name="place",
 *      indexes={
 *          @Index(name="bed_index", columns={"bed"}), 
 *          @Index(name="desk_index", columns={"desk"}), 
 *          @Index(name="airConditioning_index", columns={"airConditioning"}), 
 *          @Index(name="washingMachine_index", columns={"washingMachine"}), 
 *          @Index(name="outlet_index", columns={"outlet"}), 
 *          @Index(name="other_index", columns={"other"}),
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
 *
 */
class Place {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     */
    protected $id;

    /**
     * @var string
     * @Assert\Length(min=2, max= 100)
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    protected $title;

    /**
     * @var string
     * @Assert\Length(min=2, max= 1000)
     * @ORM\Column(name="description", type="text", length=1000, nullable=false)
     */
    protected $description;
    
        /**
     * @var string
     * @ORM\Column(name="internet", type="string", length=100, nullable=false)
     * @Assert\Choice({"wifi", "ethernet", "fibre", "adsl"})
     */
    protected $internet;

    /**
     * @var string
     * @ORM\Column(type="string")
     * 
     */
    protected $image;

    /**
     * @ORM\Column(name="accessibility", type="boolean", nullable=false)
     * @var bool
     */
    protected $accessibility;

    /**
     * @var bool
     *
     * @ORM\Column(name="kitchen", type="boolean", nullable=false)
     */
    protected $kitchen;

    /**
     * @ORM\Column(name="parking", type="boolean", )
     * @var bool
     */
    protected $parking;

    /**
     * @Assert\Length(min=5, max= 255)
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     * @var string
     */
    protected $address;

    /**
     * @var string
     * @Assert\Length(min=2, max= 100)
     * @ORM\Column(name="town", type="string", length=100, nullable=false)
     */
    protected $town;

    /**
     * @var string
     * 
     * @ORM\Column(name="lng", type="decimal", precision=11, scale=8)
     */
    protected $lng;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="decimal", precision=11, scale=08)
     */
    protected $lat;

    /**
     * @var string
     * @Assert\Length(min=2, max= 100)
     * @ORM\Column(name="country", type="string", length=100, nullable=false)
     */
    protected $country;

     /**
     * @var int
     *
     * @ORM\Column(name="bed", type="integer", nullable=false)
     */
    private $bed;


    /**
     * @var bool
     * 
     * @ORM\Column(name="desk", type="boolean", nullable=false)
     */
    private $desk;

    /**
     * @var bool
     *
     * @ORM\Column(name="airConditioning", type="boolean", nullable=false)
     */
    private $airConditioning;

    /**
     * @var bool
     *
     * @ORM\Column(name="washingMachine", type="boolean", nullable=false)
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
    
    /**
     * @var user
     * @var Collection
     * @ORM\ManyToOne(targetEntity="User", inversedBy="createdPlaces")
     */
    private $user;

    /**
     * @var Collection
     * @ORM\ManyToOne(targetEntity="User", inversedBy="ownedPlace")
     */
    private $owner;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="place")
     *  
     */
    private $bookings;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Media", mappedBy="place")
     * 
     */
    private $medias;

    /**
     *  
     * @var Collection
     * @ORM\ManyToOne(targetEntity="Recommendation", inversedBy="place")
     */
    private $recommendations;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $types;
    
    public function __construct(){
        $this->user = new ArrayCollection();
        $this->owner = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->medias = new ArrayCollection();
        $this->recommendations = new ArrayCollection();
     
    }
    
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getInternet() {
        return $this->internet;
    }

    public function getImage() {
        return $this->image;
    }

    public function getAccessibility() {
        return $this->accessibility;
    }

    public function getKitchen() {
        return $this->kitchen;
    }

    public function getParking() {
        return $this->parking;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getTown() {
        return $this->town;
    }

    public function getLng() {
        return $this->lng;
    }

    public function getLat() {
        return $this->lat;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getBed() {
        return $this->bed;
    }

    public function getDesk() {
        return $this->desk;
    }

    public function getAirConditioning() {
        return $this->airConditioning;
    }

    public function getWashingMachine() {
        return $this->washingMachine;
    }

    public function getOutlet() {
        return $this->outlet;
    }

    public function getOther() {
        return $this->other;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function getPrivateDesk() {
        return $this->privateDesk;
    }

    public function getComputer() {
        return $this->computer;
    }

    public function getPrinter() {
        return $this->printer;
    }

    public function getScanner() {
        return $this->scanner;
    }

    public function getProjector() {
        return $this->projector;
    }

    public function getNapStation() {
        return $this->napStation;
    }

    public function getWhiteBoard() {
        return $this->whiteBoard;
    }

    public function getTerrace() {
        return $this->terrace;
    }

    public function getFreeDrink() {
        return $this->freeDrink;
    }

    public function getFreeSnack() {
        return $this->freeSnack;
    }

    public function getUser(): user {
        return $this->user;
    }

    public function getOwner(): Collection {
        return $this->owner;
    }

    public function getBookings(): Collection {
        return $this->bookings;
    }

    public function getMedias(): Collection {
        return $this->medias;
    }

    public function getRecommendations(): Collection {
        return $this->recommendations;
    }

    public function getTypes() {
        return $this->types;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setInternet($internet) {
        $this->internet = $internet;
        return $this;
    }

    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    public function setAccessibility($accessibility) {
        $this->accessibility = $accessibility;
        return $this;
    }

    public function setKitchen($kitchen) {
        $this->kitchen = $kitchen;
        return $this;
    }

    public function setParking($parking) {
        $this->parking = $parking;
        return $this;
    }

    public function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    public function setTown($town) {
        $this->town = $town;
        return $this;
    }

    public function setLng($lng) {
        $this->lng = $lng;
        return $this;
    }

    public function setLat($lat) {
        $this->lat = $lat;
        return $this;
    }

    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }

    public function setBed($bed) {
        $this->bed = $bed;
        return $this;
    }

    public function setDesk($desk) {
        $this->desk = $desk;
        return $this;
    }

    public function setAirConditioning($airConditioning) {
        $this->airConditioning = $airConditioning;
        return $this;
    }

    public function setWashingMachine($washingMachine) {
        $this->washingMachine = $washingMachine;
        return $this;
    }

    public function setOutlet($outlet) {
        $this->outlet = $outlet;
        return $this;
    }

    public function setOther($other) {
        $this->other = $other;
        return $this;
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
        return $this;
    }

    public function setPrivateDesk($privateDesk) {
        $this->privateDesk = $privateDesk;
        return $this;
    }

    public function setComputer($computer) {
        $this->computer = $computer;
        return $this;
    }

    public function setPrinter($printer) {
        $this->printer = $printer;
        return $this;
    }

    public function setScanner($scanner) {
        $this->scanner = $scanner;
        return $this;
    }

    public function setProjector($projector) {
        $this->projector = $projector;
        return $this;
    }

    public function setNapStation($napStation) {
        $this->napStation = $napStation;
        return $this;
    }

    public function setWhiteBoard($whiteBoard) {
        $this->whiteBoard = $whiteBoard;
        return $this;
    }

    public function setTerrace($terrace) {
        $this->terrace = $terrace;
        return $this;
    }

    public function setFreeDrink($freeDrink) {
        $this->freeDrink = $freeDrink;
        return $this;
    }

    public function setFreeSnack($freeSnack) {
        $this->freeSnack = $freeSnack;
        return $this;
    }

    public function setUser(user $user) {
        $this->user = $user;
        return $this;
    }

    public function setOwner(Collection $owner) {
        $this->owner = $owner;
        return $this;
    }

    public function setBookings(Collection $bookings) {
        $this->bookings = $bookings;
        return $this;
    }

    public function setMedias(Collection $medias) {
        $this->medias = $medias;
        return $this;
    }

    public function setRecommendations(Collection $recommendations) {
        $this->recommendations = $recommendations;
        return $this;
    }

    public function setTypes($types) {
        $this->types = $types;
        return $this;
    }


}