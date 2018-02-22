<?php

namespace App\Entity;

use App\Entity\Place;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * User
 * 
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * 
 * @UniqueEntity(fields="email", message="Email déjà enregistré")
 * @UniqueEntity(fields="username", message="Pseudo déjà enregistré")
 * 
 */
class User implements UserInterface, \Serializable {

    /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * 
     */
    private $id;

    /**
     * 
     * @ORM\Column(name="firstname", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     * 
     */
    private $firstname;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="lastname", type="string", length=100, nullable=false)
     */
    private $lastname;

    /**
     * 
     * @ORM\Column(name="email", type="string", length=255, nullable=false, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     * 
     */
    private $email;

    /**
     *
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * 
     */
    private $username;

    /**
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     * 
     */
    private $plainPassword;

    /**
     *
     * @ORM\Column(name="password", type="string", length=255)
     * 
     */
    private $password;

    /**
     *
     * @ORM\Column(name="birthdate", type="date")
     * @Assert\DateTime()
     * 
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=2000)
     */
    private $description;

    /**
     * @var string
     * 
     * @ORM\Column(name="town", type="string", length=100, nullable=true)
     */
    protected $town;

    /**
     * @var bool
     *
     * @ORM\Column(name="activity_status", type="boolean", options={"default":false})
     */
    private $activityStatus;

    /**
     *
     * @ORM\Column(name="roles", type="string")
     */
    private $roles;

    /**
     *
     * @ORM\Column(name="photo_profile", type="string", length=255, options={"default":"default"})
     * @Assert\Image(
     *     minWidth=200,
     *     maxWidth=800,
     *     maxSize="600k",
     *     corruptedMessage="Veuillez fournir un document valide."
     * )
     * 
     */
    private $photoProfile;

    /**
     *
     * @ORM\OneToMany(targetEntity="Place", mappedBy="user")
     * @var  Collection
     * 
     */
    private $createdPlaces;

    /**
     * 
     * @ORM\OneToMany(targetEntity="Place", mappedBy="owner")
     * @var Collection
     * 
     */
    private $ownedPlaces;

    /**
     * 
     * @ORM\OneToMany(targetEntity="Recommendation", mappedBy="user")
     * @var Collection
     * 
     */
    private $recommendations;

    /**
     * @var int|null
     * @ORM\OneToMany(targetEntity="Tribe", mappedBy="idSender")
     * @var Collection
     */
    private $myFriends;

    /**
     * @var int|null
     * @ORM\OneToMany(targetEntity="Tribe", mappedBy="idReceiver")
     * @var Collection
     */
    private $friendsWithMe;

    /**
     * Many Users have Many Tchat .
     * @ManyToMany(targetEntity="Tchat", inversedBy="users")
     * 
     * @var Collection
     */
    private $messages;

    public function __construct() {
        $this->friendsWithMe = new ArrayCollection();
        $this->myFriends = new ArrayCollection();
        $this->messages = new ArrayCollection();
    }

    /** @see \Serializable::serialize() */
    public function serialize() {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
                // see section on salt below
                // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized) {
        list (
                $this->id,
                $this->username,
                $this->password,
                // see section on salt below
                // $this->salt
                ) = unserialize($serialized);
    }

    public function getSalt() {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function getRoles() {
        // nos rôles seront stockés sous ce format: "ROLE_USER|ROLE_ADMIN"
        return explode('|', $this->roles);
    }

    public function eraseCredentials() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPlainPassword() {
        return $this->plainPassword;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function getTown() {
        return $this->town;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getActivityStatus() {
        return $this->activityStatus;
    }

    public function getPhotoProfile() {
        return $this->photoProfile;
    }

    public function getCreatedPlaces(): Collection {
        return $this->createdPlaces;
    }

    public function getOwnedPlaces(): Collection {
        return $this->ownedPlaces;
    }

    public function getRecommendations(): Collection {
        return $this->recommendations;
    }

    public function getFriendsWithMe(): Collection {
        return $this->friendsWithMe;
    }

    public function getMyFriends(): Collection {
        return $this->myFriends;
    }

    public function getMessages() {
        return $this->messages;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    public function setPlainPassword($plainPassword) {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function setBirthdate(\DateTime $birthdate) {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function setTown($town) {
        $this->town = $town;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setActivityStatus($activityStatus) {
        $this->activityStatus = $activityStatus;
        return $this;
    }

    public function setPhotoProfile($photoProfile) {
        $this->photoProfile = $photoProfile;
        return $this;
    }

    public function setCreatedPlaces(Collection $createdPlaces) {
        $this->createdPlaces = $createdPlaces;
        return $this;
    }

    public function setOwnedPlaces(Collection $ownedPlaces) {
        $this->ownedPlaces = $ownedPlaces;
        return $this;
    }

    public function setRecommendations(Collection $recommendations) {
        $this->recommendations = $recommendations;
        return $this;
    }

    public function setFriendsWithMe(Collection $friendsWithMe) {
        $this->friendsWithMe = $friendsWithMe;
        return $this;
    }

    public function setMyFriends(Collection $myFriends) {
        $this->myFriends = $myFriends;
        return $this;
    }

    public function setMessages($messages) {
        $this->messages = $messages;
        return $this;
    }

    public function setRoles($roles) {
        $this->roles = $roles;
        return $this;
    }

}
