<?php

namespace App\DataFixtures;

use App\Entity\User;
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
        $manager->flush();
}

}
