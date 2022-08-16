<?php

namespace App\DataFixtures;
use App\Entity\Recruitment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
//NOTE a supprimer au deploiment final

    class RecruitmentFixture extends Fixture implements FixtureGroupInterface
    {
        public function load(ObjectManager $manager): void
        {
            $recruitment = new Recruitment();
            $recruitment->setTitle('AVS ou AMP ou Aide-soignante');
            $recruitment->setTitleDescription('Aide à la personne');
            $recruitment->setDescription('Aide à la toilette, aide à l\'habillage, aide au lever, aide aux déplacements, courses, préparation et aide à la  prise de repas, accompagnement aux sorties');
            $recruitment->setTitleDescription2('Aides ménagères ');
            $recruitment->setDescription2('Entretien du linge, entretien du cadre de vie, ménage ');
            $recruitment->setTitleDescription3('Garde d\'enfants ');
            $recruitment->setDescription3('Accompagnement aux gestes de la vie quotidienne, aide au repas, accompagnement aux sorties, aide aux devoirs pour un enfant en situation de handicap (dès septembre 2022)');
            $recruitment->setWeSearch('Nous recherchons une personne polyvalente, aimant prendre des initiatives, ayant un sens de l\'organisation, aimant le relationnel avec les bénéficiaires et le partage avec ses collègues de travail. ');
            $recruitment->setAvantage('Voiture de société selon disponibilité et planning, des plannings permettant d\'équilibrer vie personnelle et professionnelle, entreprise à taille humaine, chèque cadeau ');
            $recruitment->setLicenceRequeried('Être titulaire d\'un diplôme ou titre de niveau V (auxiliaire de vie, aide médico psychologique, assistante de vie, aide-soignante, auxiliaire de gérontologie ) ou diplôme CAP petite enfance ou expérience dans la garde d\'enfant ');
            $recruitment->setExperienceRequeried(' ');
            $recruitment->setDriveLicense('1 ');
            $recruitment->setDeplacementInfo('Frais kilométriques à 0,40 € si véhicule de société non disponible ');
            $recruitment->setTypeContrat('CDI à temps partiel ');
            $recruitment->setWorkingHour(' 100 heures par mois évolutif');
            $recruitment->setDayOff('Tous les mercredis');
            $recruitment->setSalary('À partir de 11,07 € brut de l\'heure et valorisation selon profil et expérience ');
            $recruitment->setOpportunity('Prise de poste dès que possible, venez nous rejoindre!! ');         
            $recruitment->setVisibility('1');
            $manager->persist($recruitment);

            $recruitment = new Recruitment();
            $recruitment->setTitle('Annonce invisible');
            $recruitment->setTitleDescription('Aide à la personne');
            $recruitment->setDescription ('Aide à la toilette, aide à l\'habillage, aide au lever, aide aux déplacements, courses, préparation et aide à la  prise de repas, accompagnement aux sorties');
            $recruitment->setTitleDescription2 ('Aides ménagères ');
            $recruitment->setDescription2 ('Entretien du linge, entretien du cadre de vie, ménage ');
            $recruitment->setTitleDescription3 ('Garde d\'enfants ');
            $recruitment->setDescription3 ('Accompagnement aux gestes de la vie quotidienne, aide au repas, accompagnement aux sorties, aide aux devoirs pour un enfant en situation de handicap (dès septembre 2022)');
            $recruitment->setWeSearch ('Nous recherchons une personne polyvalente, aimant prendre des initiatives, ayant un sens de l\'organisation, aimant le relationnel avec les bénéficiaires et le partage avec ses collègues de travail. ');
            $recruitment->setAvantage ('voiture de société selon disponibilité et planning, des plannings permettant d\'équilibrer vie personnelle et professionnelle, entreprise à taille humaine, chèque cadeau ');
            $recruitment->setLicenceRequeried ('Être titulaire d\'un diplôme ou titre de niveau V (auxiliaire de vie, aide médico psychologique, assistante de vie, aide-soignante, auxiliaire de gérontologie ) ou diplôme CAP petite enfance ou expérience dans la garde d\'enfant ');
            $recruitment->setExperienceRequeried (' ');
            $recruitment->setDriveLicense ('1 ');
            $recruitment->setDeplacementInfo ('Frais kilométriques à 0,40 € si véhicule de société non disponible ');
            $recruitment->setTypeContrat ('CDI à temps partiel ');
            $recruitment->setWorkingHour (' 100 heures par mois évolutif');
            $recruitment->setDayOff ('Tous les mercredis');
            $recruitment->setSalary ('À partir de 11,07 € brut de l\'heure et valorisation selon profil et expérience ');
            $recruitment->setOpportunity ('Prise de poste dès que possible, venez nous rejoindre!! ');
            $recruitment->setVisibility ('0');
            $manager->persist($recruitment);

            $manager->flush();
        }

        /**
         * Nous permet de classer les fixtures pour pouvoir les éxecuter séparement
         *
         * @return array
         */
        public static function getGroups(): array
        {
            return ['recruitmentGroup'];
        }
    }