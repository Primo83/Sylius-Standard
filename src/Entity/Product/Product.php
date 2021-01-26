<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Exception;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Product\Model\ProductTranslationInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product")
 */
class Product extends BaseProduct
{
    // ToDo kolory powinny być zamkniete w klasie wraz z walidacją
    // ToDo wyjątek powinien mieć swoją klasę
    // ToDo powinien byc obsłuzony wyjątek
    // ToDo translacja na kolory w obiekcie
    public const AVAILABLE_COLORS = [self::BLUE, self::GREEN, self::RED];
    public const BLUE = 'blue';
    public const GREEN = 'green';
    public const RED = 'red';

    /**
     * @ORM\Column(type="string", length=7, nullable=true)
     * @Assert\Choice(choices=Product::AVAILABLE_COLORS, message="Choice supported color.")
     * @Assert\NotBlank
     */
    private string $color;

    protected function createTranslation(): ProductTranslationInterface
    {
        return new ProductTranslation();
    }

    public function setColor(string $color): void
    {
        if (!in_array($color, self::AVAILABLE_COLORS)) {
            throw new Exception('Color is invalid');
        }

        $this->color = $color;
    }

    public function color(): string
    {
        return $this->color;
    }
}
