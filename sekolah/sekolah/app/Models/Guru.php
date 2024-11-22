<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'nama',
        'mapel',
        'kelas',
        'alamat',
        'nohp'
    ];
    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'guru_id');
    }
}
