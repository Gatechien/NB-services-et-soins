<?php

namespace App\Serializer;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class DoctrineDenormalizer implements DenormalizerInterface
{

    /**
    * Instance de EntityManagerInterface
    * @var EntityManagerInterface
    */
    private $entityManagerInterface;
    
    /**
    * Constructor
    */
    public function __construct(EntityManagerInterface $entityManagerInterface)
    {
        $this->entityManagerInterface = $entityManagerInterface;
    }

    /**
     * Appel quand on a besoin de denormaliser
     *
     * @param [type] $data : la valeur que l'on tente de dénormalizer (dans notre cas un ID)
     * @param string $type :  le type que l'on veut obtenir (dans notre cas une entity)
     * @param string|null $format
     */
    public function supportsDenormalization($data, string $type, ?string $format = null)
    {
        $dataIsId = is_numeric($data);
        $typeIsEntity = strpos($type, 'App\Entity') === 0; // ma chaine commence par App\Entity

        return $typeIsEntity && $dataIsId;
    }

    /**
     * Si je suis dans le cas où $data est un ID ET $type est une Entity
     *
     * @param [type] $data : la valeur que l'on tente de denormaliser (dans notrec cas un ID)
     * @param string $type : le type que l'on veut obtenir (dans notre cas un Entity)
     * @param string|null $format
     * @param array $context
     */
    public function denormalize($data, string $type, ?string $format = null, array $context = [])
    {
        //? ici on veut faire appel à Doctrine
        // pour faire un find() avec l'ID fournit
        $denormalizedEntity = $this->entityManagerInterface->find($type, $data);
        return $denormalizedEntity;
    }
}