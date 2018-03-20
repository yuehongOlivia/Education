<?php
/**
 * Created by PhpStorm.
 * User: Zhuoq
 * Date: 16/03/2018
 * Time: 15:36
 */

namespace AppBundle\Repository;


use Doctrine\ORM\NonUniqueResultException;

class QuestionRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByIdJoinedToCategory()
    {
        $query = $this->getEntityManager()
            ->createQuery(
                'SELECT a, q FROM AppBundle:Question a
                JOIN a.reponse q');

        try {
            return $query->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
        }
    }
}