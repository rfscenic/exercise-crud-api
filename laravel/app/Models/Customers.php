<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = "customers";

    protected $fillable = [
        'customer_id',
        'nama_customer',
        'Tanggal_lahir',
        'Provinsi_alamat',
        'jenis_kelamin',
        'status_nikah',
        'gaji'
    ];
}
