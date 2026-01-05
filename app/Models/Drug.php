<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Drug;
Drug::create(['name' => 'Paracetamol']);
Drug::create(['name' => 'Ibuprofen']);
exit;


class Drug extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}

