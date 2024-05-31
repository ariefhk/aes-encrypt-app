<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Files extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $fillable = ['name', 'original_name', 'status', 'location', 'size', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
