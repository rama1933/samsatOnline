<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran1tahun extends Model
{
    use HasFactory;
    protected $table = 'tbl_pendaftaran_1_tahun';
    protected $guarded = [''];

    public function biodata()
    {
        return $this->hasOne(Biodata::class, 'id', 'biodata_id');
    }
}
