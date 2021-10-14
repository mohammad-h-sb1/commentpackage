<?php

namespace Saberycategory\Cms\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Sabery\Package\models\Product;

class Category extends Model
{
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
