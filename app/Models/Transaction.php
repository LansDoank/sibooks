<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = ['jumlah_buku','return_time','is_verified'];
    protected $with = ['book'];

    protected $casts = [
    'borrow_time' => 'datetime',
    'return_time' => 'datetime',
];

    public function book() : BelongsTo {
        return $this->belongsTo(Book::class);
    }
}
