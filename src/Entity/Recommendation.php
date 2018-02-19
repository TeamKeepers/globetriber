<?php

namespace App\Entity;

use App\Entity\Place;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;

/**
 * Recommendation
 *
 * @ORM\Table(name="recommendation")
 * @ORM\Entity
 */
class Recommendation
{
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
     * @ORM\OneToMany(targetEntity="Place", mappedBy="recommendations")
     * @var Collection
     */
    private $place;

    /**
     * @var int|null
     * @ORM\ManyToOne(targetEntity="User", inversedBy="recommendations")
     * @var Collection
     */
    private $user;

    /**
     * @var bool
     *
     * @ORM\Column(name="validation", type="boolean", nullable=false)
     */
    private $validation;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;
    
    public function __construct() {
        $this->user = new ArrayCollection();
        $this->place = new ArrayCollection();
    }

    function getId() {
        return $this->id;
    }

    function getPlace() {
        return $this->place;
    }

    function getUser() {
        return $this->User;
    }

    function getValidation() {
        return $this->validation;
    }

    function getComment() {
        return $this->comment;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPlace($place) {
        $this->place = $place;
    }

    function setUser($User) {
        $this->User = $User;
    }

    function setValidation($validation) {
        $this->validation = $validation;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }



}
