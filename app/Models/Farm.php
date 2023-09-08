<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'seller_id',
        'farm_province',
        'farm_municipality',
        'farm_barangay',
        'farm_coordinates',
        'farm_size',
        'farm_type',
        'farm_crops',
        'farm_livestocks',
        'farm_vegetables',
        'farm_products',
        'gross_harvest',
        'net_harvest',
        'beneficiary',
        'beneficiary_specify',
        'aid_received',
    ];

    public function Province() {
        return $this->hasOne(Province::class, 'provCode', 'farm_province');
    }

    public function Municipality() {
        return $this->hasOne(Municipality::class, 'citymunCode', 'farm_municipality');
    }

    public function Barangay() {
        return $this->hasOne(Barangay::class, 'brgyCode', 'farm_barangay');
    }
}
