<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

     protected $guarded = [];
    //
    // app/Models/Page.php

protected $fillable = ['slug', 'title', 'content', 'meta_title', 'meta_description'];

// علاقة مع المستخدم إذا أردت تتبع من قام بالتعديل
public function user()
{
    return $this->belongsTo(User::class);
}
}
