<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schema extends Model
{
    use HasFactory;
    /**
     * Get the api that owns the Schema
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function api()
    {
        return $this->belongsTo(Api::class);
    }
}
