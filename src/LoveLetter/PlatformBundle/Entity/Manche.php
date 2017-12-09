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
     * @ORM\Column(name="array", type="array")
     */
    private $pioche;

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
