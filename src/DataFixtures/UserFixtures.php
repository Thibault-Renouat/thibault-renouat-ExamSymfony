<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
   private $passwordEncoder;

   public function __construct(UserPasswordEncoderInterface $passwordEncoder)
   {
       $this->passwordEncoder=$passwordEncoder;

   }


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user= new User();
        $user->setEmail('journaliste@journal.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword(
            $this->passwordEncoder->encodePassword(
                $user,
                'journaliste'
            )
        );
        $manager->persist($user);

        $userAdmin= new User();
        $userAdmin->setEmail('admin@admin.com');
        $userAdmin->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $userAdmin->setPassword(
            $this->passwordEncoder->encodePassword(
                $userAdmin,
                'admin'
            )
        );
        $manager->persist($userAdmin);

        $manager->flush();
    }
}
