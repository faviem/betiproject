<?php

namespace AppBundle\Repository;

/**
 * AppelRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AppelRepository extends \Doctrine\ORM\EntityRepository
{
<<<<<<< HEAD
    public function getSommeajouter($exo)
    {
//        $dql = "SELECT SUM(a.montantTtc) AS montantSum FROM AppBundle\Entity\Appel a " .
//            "WHERE a.estAnnuler = 0 AND a.exercice < :exo";
//
//        $balance =  $this->_em->createQuery($dql)
//            ->setParameter('exo', $exo)
//            ->getSingleScalarResult();
        $q = $this->createQueryBuilder('a')
            ->select('SUM(a.montantTtc)')
            ->where('a.estAnnuler = 0')
            ->andWhere('a.exercice < :exo')
            ->setParameter('exo', $exo);

        return $q->getQuery()->getSingleScalarResult();

    }

    public function getSommeannuler($exo)
    {
        $q = $this->createQueryBuilder('a')
            ->select('SUM(a.montantTtc)')
            ->where('a.estAnnuler = 1')
            ->andWhere('a.exercice < :exo')
            ->setParameter('exo', $exo);

        return $q->getQuery()->getSingleScalarResult();

    }

=======
>>>>>>> e90a8e86fcf344935894ebd685ca3527a71d55c4
}
