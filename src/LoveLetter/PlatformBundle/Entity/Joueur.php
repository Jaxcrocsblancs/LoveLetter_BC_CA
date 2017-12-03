<?php

namespace LoveLetter\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Joueur
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
     * @var integer
     *
     * @ORM\Column(name="Score", type="integer")
     */
    private $score;
    
    /**
    * @ORM\ManyToOne(targetEntity="LoveLetter\PlatformBundle\Entity\Utilisateur")
    */
    private $utilisateur;
    
    /**
    * @ORM\ManyToOne(targetEntity="LoveLetter\PlatformBundle\Entity\tourJeu")
    */
    private $tourJeu;
    
    /**
    * @ORM\ManyToMany(targetEntity="LoveLetter\PlatformBundle\Entity\Carte", cascade={"persist"})
    * @ORM\JoinTable(name="joueur_carteMain")
    */
    private $carteMain;
    
    /**
    * @ORM\ManyToMany(targetEntity="LoveLetter\PlatformBundle\Entity\Carte", cascade={"persist"})
    * @ORM\JoinTable(name="joueur_carteJouer")
    */
    private $carteJouer;
    
    public function __construct()
    {
        $this->carteMain = new ArrayCollection();
        $this->carteJouer = new ArrayCollection();
    }
    
    public function addCarteMain(Carte $carteMain)
    {
      $this->carteMain[] = $carteMain;
    }

    public function removeCarteMain(Carte $carteMain)
    {
      $this->carteMain->removeElement($carteMain);
    }

    public function getCartesMain()
    {
      return $this->carteMain;
    }
    
     public function addCarteJouer(Carte $carteJouer)
    {
      $this->carteJouer[] = $carteJouer;
    }

    public function removeCarteJouer(Carte $carteJouer)
    {
      $this->carteJouer->removeElement($carteJouer);
    }

    public function getCartesJouer()
    {
      return $this->carteJouer;
    }
    
    public function setUtilisateur(Utilisateur $utilisateur)
   {
     $this->utilisateur = $utilisateur;

     return $this;
   }

   public function getUtilisateur()
   {
     return $this->utilisateur;
   }
   
    public function setTourJeu(tourJeu $tourJeu)
   {
     $this->tourJeu = $tourJeu;

     return $this;
   }

   public function getTourJeu()
   {
     return $this->tourJeu;
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
     * Set score
     *
     * @param integer $score
     * @return Joueur
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer 
     */
    public function getScore()
    {
        return $this->score;
    }
}
