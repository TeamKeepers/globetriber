<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     * 
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=100, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=100, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="bithdate", type="date", nullable=false)
     */
    private $bithdate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="activity_status", type="boolean", nullable=false)
     */
    private $activityStatus;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_profile", type="string", length=255, nullable=false)
     */
    private $photoProfile;

    /*
     * @ var user
     * @ORM\Column(name="createdPlace", type="string", length=100, nullable=false)
     * @ORM\OneToMany(targetEntity="Place", mappedBy="user")
     */
    private $createdPlaces;

    /*
     * @ var user
     * @ORM\Column(name="createdPlace", type="integer", nullable=false)
     * @ORM\OneToMany(targetEntity="Place", mappedBy="owner")
     */
    private $ownedPlaces;

    /**
     * @ORM\Column(name="recommendations", type="integer", nullable=true)
     * @ORM\OneToMany(targetEntity="Recommendation", mappedBy="user")
     * 
     */
    private $recommendations;

    /**
     * Many Users have Many Users.
     * @ORM\Column(name="friendsWithMe", type="integer", nullable=false)
     * @ManyToMany(targetEntity="User", mappedBy="myFriends")
     */
    private $friendsWithMe;

    /**
     * Many Users have many Users.
     * @ORM\Column(name="myFriends", type="integer", nullable=false)
     * @ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
     * @JoinTable(name="tribe",
     *      joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="friend_user_id", referencedColumnName="id")}
     *      )
     */
    private $myFriends;

    /**
     * Many Users have Many Groups.
     * @ORM\Column(name="messages", type="integer", nullable=false)
     * @ManyToMany(targetEntity="Tchat", inversedBy="users")
     * @JoinTable(name="tchat")
     */
    private $messages;

    public function __construct() {
        $this->friendsWithMe = new ArrayCollection();
        $this->myFriends = new ArrayCollection();
        $this->messages = new ArrayCollection();
    }

    function getId() {
        return $this->id;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getBithdate(): DateTime {
        return $this->bithdate;
    }

    function getDescription() {
        return $this->description;
    }

    function getActivityStatus() {
        return $this->activityStatus;
    }

    function getStatus() {
        return $this->status;
    }

    function getPhotoProfile() {
        return $this->photoProfile;
    }

    function getCreatedPlaces() {
        return $this->createdPlaces;
    }

    function getOwnedPlaces() {
        return $this->ownedPlaces;
    }

    function getRecommendations() {
        return $this->recommendations;
    }

    function getFriendsWithMe() {
        return $this->friendsWithMe;
    }

    function getMyFriends() {
        return $this->myFriends;
    }

    function getMessages() {
        return $this->messages;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setBithdate(DateTime $bithdate) {
        $this->bithdate = $bithdate;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setActivityStatus($activityStatus) {
        $this->activityStatus = $activityStatus;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setPhotoProfile($photoProfile) {
        $this->photoProfile = $photoProfile;
    }

    function setCreatedPlaces($createdPlaces) {
        $this->createdPlaces = $createdPlaces;
    }

    function setOwnedPlaces($ownedPlaces) {
        $this->ownedPlaces = $ownedPlaces;
    }

    function setRecommendations($recommendations) {
        $this->recommendations = $recommendations;
    }

    function setFriendsWithMe($friendsWithMe) {
        $this->friendsWithMe = $friendsWithMe;
    }

    function setMyFriends($myFriends) {
        $this->myFriends = $myFriends;
    }

    function setMessages($messages) {
        $this->messages = $messages;
    }


}
