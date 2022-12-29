<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'contacts';

    protected $fillable = [
        'firstname',
        'lastname',
        'patrony',
        'email',
        'phone',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'contacts_tags');
    }
}
