<?php

namespace App\Entity;

use App\Entity\Place;
use Doctrine\ORM\Mapping as ORM;

/**
 * Recommendation
 *
 * @ORM\Table(name="recommendation")
 * @ORM\Entity(repositoryClass="App\Repository\RecommandationRepository")
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
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="recommendations")
     * @var Place
     */
    private $place;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="recommendations")
     * @var User
     */
    private $user;

    /**
     * @var bool
     *
     * @ORM\Column(name="validation", type="boolean")
     */
    private $validation;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535)
     */
    private $comment;
    

    function getId() {
        return $this->id;
    }

    function getPlace() {
        return $this->place;
    }

    function getUser() {
        return $this->user;
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
        $this->user = $User;
    }

    function setValidation($validation) {
        $this->validation = $validation;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }



}
