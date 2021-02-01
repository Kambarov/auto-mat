<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    /**
     * @var Product
     */
    private $upload;

    public function __construct()
    {
        $this->upload = new Product();
    }

    public function all()
    {
        return Product::latest('id')
            ->paginate(config('app.per_page'));
    }

    public function create(array $attributes)
    {
        $attributes['image_url'] = '/'.$this->upload->uploadFile($attributes['image_url']);
        return Product::create($attributes);
    }

    public function update(array $attributes, Product $product)
    {
        if(array_key_exists('image_url', $attributes)) {
            $product->removeFile();

            $attributes['image_url'] = '/'.$this->upload->uploadFile($attributes['image_url']);
        }
        return $product->update($attributes);
    }

    public function delete(Product $product)
    {
        $product->removeFile();

        return $product->delete();
    }
}
