<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $table = 'tags';

    protected $fillable = [
        'text',
    ];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class,'contacts_users');
    }
}
