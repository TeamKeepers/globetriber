<?php

namespace App\Entity;

use App\Entity\Product\Place;
use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity
 */
class Media
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
     * @ORM\Column(name="place", type="integer", nullable=true)
     *  @ORM\ManyToOne(targetEntity="Place", inversedBy="medias")
     * 
     */
    private $place;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer", nullable=false)
     */
    private $size;

    function getId() {
        return $this->id;
    }

    function getPlace() {
        return $this->place;
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

    function setPlace($place) {
        $this->place = $place;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setSize($size) {
        $this->size = $size;
    }



}
