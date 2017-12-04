<?php

namespace LoveLetter\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
    * \ManyToOne(targetEntity="LoveLetter\PlatformBundle\Entity\Utilisateur")
    *
    private $utilisateur;*/

    /**
    * @ORM\ManyToMany(targetEntity="LoveLetter\PlatformBundle\Entity\Carte", cascade={"persist"})
    * @ORM\JoinTable(name="CarteMain_Joueur")
    */
    private $carteMain;
    
     /**
    * @ORM\ManyToMany(targetEntity="LoveLetter\PlatformBundle\Entity\Carte", cascade={"persist"})
    * @ORM\JoinTable(name="CarteJouer_Joueur")
    */
    private $carteJouer;

     public function __construct()
    {
        $this->score=0;
        $this->carteMain = new ArrayCollection();
        $this->carteJouer = new ArrayCollection();
    }
      /**
     * Set pioche
     *
     * @param integer $carteMain
     * @return carteMain
     */
    public function addCarteMain($carteMain)
    {
        $this->carteMain[] = $carteMain;
    }
   
    public function removeCarteMain(Carte $carteMain)
    {
      $this->carteMain->removeElement($carteMain);
    }
    
    /**
     * Get carteMain
     *
     * @return carteMain
     */
    public function getCarteMain()
    {
        return $this->carteMain;
    }
    
      /**
     * Set carteJouer
     *
     * @param integer $carteJouer
     * @return carteJouer
     */
    public function setCarteJouer($carteJouer)
    {
        $this->carteJouer = $carteJouer;

        return $this;
    }

    /**
     * Get pioche
     *
     * @return pioche
     */
    public function getCarteJouer()
    {
        return $this->carteJouer;
    }
    
    /*
    public function setUtilisateur(Utilisateur $utilisateur)
   {
     $this->utilisateur = $utilisateur;

     return $this;
   }

   public function getUtilisateur()
   {
     return $this->utilisateur;
   }*/
   
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
