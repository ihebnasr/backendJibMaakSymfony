<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Article;
use App\Entity\Categories;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
public function __construct(UserPasswordEncoderInterface $passwordEncoder)
{
$this->passwordEncoder = $passwordEncoder;
}
public function load(ObjectManager $manager)
{
        $user = new User();
        $user->setEmail('john@wick.us');
        $user->setPassword('john');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'wick'));
        $manager->persist($user);
        $user2 = new User();
        $user2->setEmail('jack@dalton.us');
        $user2->setPassword('jack');
        $user2->setPassword($this->passwordEncoder->encodePassword($user2, 'dalton'));
        $manager->persist($user2);
        $namescate = ['Vetement', 'Telphone', 'PC', 'Accessoires', 'tablet'];
        $img = ['VetementImg', 'TelphoneImg', 'PCImg', 'AccessoiresImg', 'tabletImg'];
        $arti=['Vest', 'Ponatlon', 'Pull', 'Chemise'];
        $artImg=['VestImg', 'PonatlonImg', 'PullImg', 'ChemiseImg'];
        for ($c = 0; $c < 5; $c++) {
            $categ = new Categories();
            $categ->setDesignatioCate($namescate[$c]);
            $categ->setImageCate($img[$c]);
            $manager->persist($categ);
          
        }
        // for($a = 0; $a<5; $a++){
        //     $art= new Article();
        //     $art->setDesignationArt($arti[$a])
        //     ->setPrixArt(100.00)
        //     ->setDateCration(new DateTime())
        //     ->setDateModifArt(new DateTime())
        //     ->setImage($artImg[$a]);
        //     $manager->persist($art);

        //}
        $manager->flush();

}

}
