<?php

namespace CommunityBundle\Repository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * MessageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MessageRepository extends \Doctrine\ORM\EntityRepository
{
    public function getOrderedList($page = 1, $amountPerPage = 10)
    {
        $query = $this->_em->createQuery(
            'SELECT m
                FROM CommunityBundle:Message as m
                ORDER BY m.creationDate DESC'            
        );

        $query->setFirstResult(($page - 1) * $amountPerPage)
              ->setMaxResults($amountPerPage);

        return new Paginator($query);
    }
}
