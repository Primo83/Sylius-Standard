<?php

declare(strict_types=1);

namespace App\Form\Extension;

use App\Entity\Product\Product;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('color', ChoiceType::class, [
                'required' => true,
                'label' => 'app.form.product.color.choice',
                'choices' => [
                    'app.form.product.color.blue' => Product::BLUE,
                    'app.form.product.color.red' => Product::RED,
                    'app.form.product.color.green' => Product::GREEN,
                ],
            ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
