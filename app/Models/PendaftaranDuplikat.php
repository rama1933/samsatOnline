<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranDuplikat extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'tbl_pendaftaran_duplikat';
    protected $guarded = [''];

    public function biodata()
    {
        return $this->hasOne(Biodata::class, 'id', 'biodata_id');
    }
}
