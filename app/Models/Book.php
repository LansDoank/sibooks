<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','stock','author','publisher','grade_id','qr_code','image','year'];
    protected $with = ['kelas'];

    public function kelas(): BelongsTo {
        return $this->belongsTo(Kelas::class);
    }

    public function grade(): BelongsTo {
        return $this->belongsTo(Grade::class);
    }

    public function transaction() {
        return $this->hasMany(Transaction::class);
    }
}
