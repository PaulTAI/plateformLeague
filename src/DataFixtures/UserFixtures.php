<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $em)
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            $user = (new User())
                ->setNickname($faker->firstname)
                ->setEmail($faker->email)
                ->setCreatedAt(new \DateTime())
                ->setIsBan(false)
                ->setIsVerified(true)
                ->setRoles(['ROLE_USER'])
            ;

             $user->setPassword($this->passwordEncoder->encodePassword(
                 $user,
                 'Emoro4@kzd'
             ));

            $em->persist($user);

        }

        $em->persist($user);

        $em->flush();
    }
}
