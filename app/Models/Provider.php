<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProviderUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;

    /**
     * Method users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->using(ProviderUser::class)->withPivot('token', 'secret_token')->withTimestamps();
    }
}
