<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['stock'];
    protected $with = ['kelas'];

    public function kelas(): BelongsTo {
        return $this->belongsTo(Kelas::class);
    }
}
