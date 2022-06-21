<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranKuasa extends Model
{
    use HasFactory;
    protected $table = 'tbl_pendaftaran_1_tahun_kuasa';
    protected $guarded = [''];

    public function biodata()
    {
        return $this->hasOne(Biodata::class, 'id', 'biodata_id');
    }
}
