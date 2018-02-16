<?php

namespace App\Entity\Product;

use App\Entity\Booking;
use App\Entity\Media;
use App\Entity\Recommendation;
use App\Entity\Sleep;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\InheritanceType;
use Symfony\Bridge\Doctrine\Tests\Fixtures\User;

// The @DiscriminatorMap specifies which values of the discriminator column identify a row as being of which type.
/**
 * Place
 *
 * @ORM\Table(name="place")
 * @ORM\Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"sleep" = "Sleep", "work" ="Work"})
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
     * @ORM\Column(type="string")
     * @Assert\Image(minWidth=300, MinHeight=300, maxSize="1024k")
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
     * @ORM\Column(name="parking", type="boolean", nullable=false)
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
     * @ORM\Column(name="lng", type="decimal", precision=11, scale=8, nullable=false)
     */
    protected $lng;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="decimal", precision=11, scale=08 nullable=false)
     */
    protected $lat;

    /**
     * @var string
     * @Assert\Length(min=2, max= 100)
     * @ORM\Column(name="country", type="string", length=100, nullable=false)
     */
    protected $country;

    /**
     * @var user
     * @ORM\Column(name="user", type="integer", nullable=true)
     *  @ORM\ManyToOne(targetEntity="User", inversedBy="createdPlaces")
     */
    private $user;

    /**
     * @var user
     * @ORM\Column(name="owner", type="integer", nullable=true)
     * @ORM\ManyToOne(targetEntity="User", inversedBy="ownedPlace")
     */
    private $owner;

    /**
     * @ORM\Column(name="bookings", type="integer", nullable=true)
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="place")
     *  
     */
    private $bookings;

    /**
     * @ORM\Column(name="medias", type="integer", nullable=true)
     * @ORM\OneToMany(targetEntity="Media", mappedBy="place")
     * @var 
     */
    private $medias;

    /**
     *  
     * @ORM\Column(name="recommendations", type="integer", nullable=true)
     * @ORM\ManyToOne(targetEntity="Recommendation", inversedBy="place")
     */
    private $recommendations;

}
