<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('nbsstest1@gmail.com');
        $user->setPassword('$2y$13$IXIk24oxZTrshcxotczgIOmBqYEtGG3T0WZGUNaGTmPaw4D8HRptW');
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        $user1 = new User();
        $user1->setEmail('nbsstest2@gmail.com');
        $user1->setPassword('$2y$13$7Bykcrk753g9INzeISCcz.g7xhpSKBxiMjUgWicWZT9s5WCvx5lp.');
        $user1->setRoles(['ROLE_ADMIN']);
        $manager->persist($user1);

        $manager->flush();
    }

    /**
     * Nous permet de classer les fixtures pour pouvoir les éxecuter séparement
     *
     * @return array
     */
    public static function getGroups(): array
    {
        return ['userGroup'];
    }
}
