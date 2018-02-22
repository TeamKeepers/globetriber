<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Tchat
 *
 * @ORM\Table(name="tchat")
 * @ORM\Entity
 */
class Tchat
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
     * @ManyToMany(targetEntity="User", mappedBy="messages")
     * @var Collection
     */
    private $users;
  

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var DateTime
     * @ORM\Column(name="sent_time", type="datetime", nullable=false)
     */
    private $sentTime;

    public function __construct() {
        $this->users = new ArrayCollection();
    }
   
    function getId() {
        return $this->id;
    }

    function getUsers() {
        return $this->users;
    }

    function getContent() {
        return $this->content;
    }

    function getSentTime(): DateTime {
        return $this->sentTime;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsers($users) {
        $this->users = $users;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setSentTime(DateTime $sentTime) {
        $this->sentTime = $sentTime;
    }



}
