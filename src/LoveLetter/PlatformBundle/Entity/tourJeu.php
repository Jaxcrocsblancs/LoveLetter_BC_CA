<?php

namespace LoveLetter\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * tourJeu
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class tourJeu
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
     * @ORM\Column(name="tourJeu_id", type="integer")
     */
    private $numTour;

    /**
    * @ORM\ManyToOne(targetEntity="LoveLetter\PlatformBundle\Entity\Manche")
    * @ORM\JoinColumn(nullable=false)
    */
    private $manche;
    
    public function setManche(Manche $manche)
    {
      $this->manche = $manche;

      return $this;
    }

    public function getManche()
    {
      return $this->manche;
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
     * Set numTour
     *
     * @param integer $numTour
     * @return tourJeu
     */
    public function setNumTour($numTour)
    {
        $this->numTour = $numTour;

        return $this;
    }

    /**
     * Get numTour
     *
     * @return integer 
     */
    public function getNumTour()
    {
        return $this->numTour;
    }
}
