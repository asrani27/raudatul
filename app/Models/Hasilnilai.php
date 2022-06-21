<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasilnilai extends Model
{
    use HasFactory;
    protected $table = 'hasil_nilai';
    protected $guarded = ['id'];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumni_id');
    }
}
