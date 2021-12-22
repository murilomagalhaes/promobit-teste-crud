<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = "product";
    protected $guarded = ['id'];
    public $timestamps = false;

    public function tags()
    {
        return $this->belongsToMany(TagModel::class, 'product_tag', 'product_id', 'tag_id');
    }
}
