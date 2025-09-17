<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = ['jumlah_buku','return_time'];
    protected $with = ['book'];

    public function book() : BelongsTo {
        return $this->belongsTo(Book::class);
    }
}
