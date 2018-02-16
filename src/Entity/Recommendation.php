<?php

namespace App\Entity;

use App\Entity\Product\Place;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="place", type="integer", nullable=true)
     */
    private $place;

    /**
     * @var int|null
     * @ORM\ManyToOne(targetEntity="User", inversedBy="recommendations")
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $User;

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
