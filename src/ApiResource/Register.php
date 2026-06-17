<?php declare(strict_types=1);

namespace App\ApiResource;

use ApiPlatform\Metadata\Post;
use App\Entity\User;
use App\State\RegisterProcessor;
use Symfony\Component\Validator\Constraints as Assert;

#[Post(
    input: Register::class,
    output: User::class,
    processor: RegisterProcessor::class
)]
class Register
{
    #[Assert\NotBlank]
    #[Assert\Email]
    public string $email;
    public string $photo;
    public string $name;

    #[Assert\NotBlank]
    #[Assert\Length(min: 6, max: 40)]
    public string $password;
}
