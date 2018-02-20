<?php

namespace App\Entity;

use App\Entity\Place;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity
 */
class Media {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * 
     * @var Place
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="medias")
     */
    private $place;

    /**
     * @var string
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer", nullable=false)
     */
    private $size;

    public function __construct() {
        $this->place = new ArrayCollection;
    }

    function getId() {
        return $this->id;
    }
    public function getPlace(): Place {
        return $this->place;
    }

    public function setPlace(Place $place) {
        $this->place = $place;
        return $this;
    }

     

    function getPhoto() {
        return $this->photo;
    }

    function getSize() {
        return $this->size;
    }

    function setId($id) {
        $this->id = $id;
    }

      function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setSize($size) {
        $this->size = $size;
    }

}
