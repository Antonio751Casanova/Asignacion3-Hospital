<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    protected $fillable = ['name', 'lastname', 'phone', 'email', 'date_of_birth'];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}