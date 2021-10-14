<?php

namespace Saberycategory\Cms\App\confing;

use Saberycategory\Cms\App\Models\Comment;

class mine
{
    public function comment()
    {
        return Comment::all();
    }
}
