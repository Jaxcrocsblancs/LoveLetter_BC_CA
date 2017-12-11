<?php

namespace LoveLetter\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Partie
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
     * @var string
     *
     * @ORM\Column(name="nomPartie", type="string", length=255)
     */
    private $nomPartie;

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
     * Set nomPartie
     *
     * @param string $nomPartie
     * @return Partie
     */
    public function setNomPartie($nomPartie)
    {
        $this->nomPartie = $nomPartie;

        return $this;
    }

    /**
     * Get nomPartie
     *
     * @return string 
     */
    public function getNomPartie()
    {
        return $this->nomPartie;
    }
}
