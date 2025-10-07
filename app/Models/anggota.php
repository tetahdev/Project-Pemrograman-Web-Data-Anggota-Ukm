<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'kelas',
        'jenis_kelamin',
        'jabatan',
        'foto',
    ];

    public function pengurus(): HasMany
    {
        return $this->hasMany(Pengurus::class, 'anggota_id', 'id');
    }
}
