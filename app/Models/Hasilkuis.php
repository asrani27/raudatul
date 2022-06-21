<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasilkuis extends Model
{
    use HasFactory;
    protected $table = 'hasil_kuis';
    protected $guarded = ['id'];

    public function pertanyaan()
    {
        return $this->belongsTo(Kuesioner::class, 'kuesioner_id');
    }
}
