<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderExtra extends Model
{
    use HasFactory;

    protected $fillable = ['order_line_id', 'extra_id', 'quantity'];

    public function extra() {
        return $this->belongsTo(Extra::class);
    }

}
