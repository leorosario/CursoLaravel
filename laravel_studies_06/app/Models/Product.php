<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    //many to many
    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class, "orders", "product_id", "client_id");
    }
}
