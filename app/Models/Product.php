<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'type',
        'image_url',
        'price'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        return $this->attributes['slug'] = Str::slug($value);
    }

//    public function setImageUrlAttribute($value)
//    {
//        $file = self::uploadFile($value);
//
//        return $this->attributes['image_url'] = '/'.$file;
//    }

    public function uploadFile(UploadedFile $file)
    {
        return Storage::putFileAs('uploads/products', $file, Str::random('8').$file->getClientOriginalName());
    }

    public function removeFile()
    {
        if (Storage::exists($this->image_url))
            return Storage::delete($this->image_url);
        else
            return true;
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product');
    }

    public function baskets()
    {
        return $this->belongsToMany(Basket::class, 'basket_product')->withPivot('price', 'count');
    }

    public function scopePagination($query, $limit)
    {
        if (!is_null($limit)) {
            if ($limit === '0')
                return $query->get();
            else
                return $query->paginate($limit);
        } else {
            return $query->paginate(config('app.per_page'));
        }
    }

    public function scopeByType($query, $type)
    {
        if ($type)
            return $query->where('type', $type);
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, ' ', ' ');
    }
}
