<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Chef
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ChefRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Chef extends User
{

}