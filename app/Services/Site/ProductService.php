<?php

namespace App\Services\Site;

use App\Models\Product;

class ProductService
{
    public function all($product_type = false, $limit = false)
    {
        return Product::query()
            ->latest('id')
            ->byType($product_type)
            ->pagination($limit);
    }
}
