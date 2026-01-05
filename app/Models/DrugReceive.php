<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugReceive extends Model {
    use HasFactory;

    protected $fillable = ['date', 'drug_name', 'quantity', 'expiry_date'];
    
}

