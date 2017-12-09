<?php

namespace LoveLetter\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Manche
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Manche
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity="LoveLetter\PlatformBundle\Entity\Partie")
    */
    private $partie;
    
    /**
     * @var array
     *
     * @ORM\Column(name="pioche", type="array")
     */
    private $pioche;

    /**
     * @var array
     *
     * @ORM\Column(name="proteger", type="array")
     */
    private $proteger;
    
    /**
     * @var array
     *
     * @ORM\Column(name="perdu", type="array")
     */
    private $perdu;
    /**
    * @ORM\ManyToMany(targetEntity="LoveLetter\PlatformBundle\Entity\Joueur", cascade={"persist"})
    * @ORM\JoinTable(name="joueur_manche")
    */
    private $joueur;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="tourDe", type="integer")
     */
    private $tourDe;
    
    public function __construct()
    {
        $this->joueur = new ArrayCollection();
    }
    
    public function addjoueur($joueur)
    {
      $this->joueur[] = $joueur;
    }

    public function removejoueur(Joueur $joueur)
    {
      $this->joueur->removeElement($joueur);
    }

    public function getjoueur()
    {
      return $this->joueur;
    }
    
    public function setTourDe($tourDe)
    {
        $this->tourDe = $tourDe;

      return $this;
    }

    public function getTourDe()
    {
      return $this->tourDe;
    }
    
    public function setPartie(Partie $partie)
    {
      $this->partie = $partie;

      return $this;
    }

    public function getPartie()
    {
      return $this->partie;
    }
  
    public function setProteger($proteger)
    {
      $this->proteger = $proteger;

      return $this;
    }

    public function getProteger()
    {
      return $this->proteger;
    }
    
     public function setPerdu($perdu)
    {
      $this->perdu = $perdu;

      return $this;
    }

    public function getPerdu()
    {
      return $this->perdu;
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * Set pioche
     *
     * @param integer $pioche
     * @return Manche
     */
    public function setPioche($pioche)
    {
        $this->pioche = $pioche;

        return $this;
    }

    /**
     * Get pioche
     *
     * @return pioche
     */
    public function getPioche()
    {
        return $this->pioche;
    }
}
