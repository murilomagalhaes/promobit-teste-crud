<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagModel extends Model
{
    use HasFactory;

    protected $table = "tag";

    public function products()
    {
        return $this->belongsToMany(ProductModel::class, 'product_tag', 'tag_id', 'product_id');
    }
}
