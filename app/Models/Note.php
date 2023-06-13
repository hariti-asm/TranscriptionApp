<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = 'notes' ;
    protected $ $fillable =[

        'filename',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
