<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;
    /**
     * Get the schema that owns the Api
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schema()
    {
        return $this->belongsTo(Schema::class, 'schema_id');
    }
}
