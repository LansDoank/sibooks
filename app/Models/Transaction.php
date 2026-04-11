<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = ['user_id','jumlah_buku','return_time','is_verified','book_image'];
    protected $with = ['book'];

    protected $casts = [
    'borrow_time' => 'datetime',
    'return_time' => 'datetime',
];

    public function book() : BelongsTo {
        return $this->belongsTo(Book::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
