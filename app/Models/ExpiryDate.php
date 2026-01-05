<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpiryDate extends Model
{
    protected $fillable = ['drug_name',
        'quantity',
        'expiry_date',];
}
