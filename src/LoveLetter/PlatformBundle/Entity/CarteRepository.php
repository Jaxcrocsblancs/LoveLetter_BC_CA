<?php
// src/OC/PlatformBundle/Entity/AdvertRepository.php

namespace LoveLetter\PlatformBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CarteRepository extends EntityRepository
{
  public function Url($id)
  {
      
    $query = $this->_em->createQuery('SELECT url FROM LoveLetterPlatformBundle:Carte a WHERE a.id = :id');
    $query->setParameter('id', $id);
  
    // Utilisation de getSingleResult car la requête ne doit retourner qu'un seul résultat
    return $query->getSingleResult();
  }
}