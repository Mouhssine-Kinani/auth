<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = ['title', 'description', 'formateur_id'];

    public function formateur()
    {
        return $this->belongsTo(User::class, 'formateur_id');
    }

    public function apprenants()
    {
        return $this->belongsToMany(User::class, 'inscriptions');
    }
}
