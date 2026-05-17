<?php

namespace App\Catalog\Application\Products;

use App\Catalog\Domain\Products\ProductRepository;

class PublishProductService
{
    public function __construct(private ProductRepository $products)
    {
    }

    public function handle(PublishProductCommand $command): void
    {
        $product = $this->products->findForPublication($command->productId);
        $requiredAttributes = $this->products->requiredAttributesForProduct($command->productId);

        $product->publish($requiredAttributes);

        $this->products->savePublished($product, $command->actorId);
    }
}
