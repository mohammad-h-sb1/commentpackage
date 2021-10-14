<?php

namespace Saberycategory\Cms\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Sabery\Package\models\Product;

class Comment extends Model
{
    protected $guarded=[];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
