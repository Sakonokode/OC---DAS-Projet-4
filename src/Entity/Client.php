<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Client
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 * @ORM\Table(name="clients")
 * @ORM\HasLifecycleCallbacks()
 */
class Client extends User
{

}