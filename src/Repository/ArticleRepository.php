<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\Catgories;
use App\Repository\CategoriesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

     /**
      * @return Article[] Returns an array of Article objects
      */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function articleCate($code)
    {
        return $this->createQueryBuilder('M')
        ->select('M')
        ->innerJoin('M.codeCate','c')
        ->where('M.codeCate= c.codeCate')
        ->andWhere('c.codeCate = :code')
        ->setParameter('code',$code)
        ->getQuery()
        ->getResult();
    }
    public function artPromo()
    {
    return $this->createQueryBuilder('ap')
    ->select('ap')
    ->where('ap.enPromo = :val')
    ->setParameter('val',1)
    ->orderBy('ap.prixPromoArt','DESC')
    ->getQuery()
    ->getResult();
}
}
