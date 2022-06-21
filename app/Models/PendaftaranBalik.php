<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranBalik extends Model
{
    use HasFactory;
    protected $table = 'tbl_pendaftaran_balik_nama';
    protected $guarded = [''];

    public function biodata()
    {
        return $this->hasOne(Biodata::class, 'id', 'biodata_id');
    }
}
