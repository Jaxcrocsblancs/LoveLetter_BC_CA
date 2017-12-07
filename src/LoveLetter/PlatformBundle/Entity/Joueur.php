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
     * @var array
     *
     * @ORM\Column(name="carteMain", type="array")
     */
    private $carteMain;
    
    /**
     * @var array
     *
     * @ORM\Column(name="carteJouer", type="array")
     */
    private $carteJouer;

     public function __construct()
    {
        $this->score=0;
    }
    
    public function setCarteMain($carteMain){
        $this->carteMain = $carteMain;
        return $this;
    }
    
    public function getCarteMain(){
        return $this->carteMain;
    }
    
    public function setCarteJouer($carteJouer){
        $this->carteJouer = $carteJouer;
        return $this;
    }
    
    public function getCarteJouer(){
        return $this->carteJouer;
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
