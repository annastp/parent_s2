<?php

namespace Pn\PnBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * JobRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JobRepository extends EntityRepository
{
    public function getAnnonce($parent, $max = null)
    {
        $qb = $this->createQueryBuilder('j')
            ->where('j.parent = :parent')
            ->setParameter('parent', $parent)
            ->andwhere('j.status = \'annonce\'');

        if($max)
        {
            $qb->setMaxResults($max);
        }

        $query = $qb->getQuery();

        return $query->getResult();
    }

    public function getFromSearch($search, $max = null)
    {
        $qb = $this->createQueryBuilder('b')
            ->where('b.address LIKE :search')
            ->setParameter('search', '%'.$search.'%');
        if($max)
        {
            $qb->setMaxResults($max);
        }

        $query = $qb->getQuery();

        return $query->getResult();
    }
}
