<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drugs;

class DrugController extends Controller
{
    public function index()
    {
        // Fetch all drugs and calculate balance quantity
        $drugs = Drugs::all()->map(function ($drug) {
            $drug->balance_quantity = $drug->received_quantity - $drug->used_quantity;
            return $drug;
        });

        return view('drug-details', compact('drugs'));
    }
    
}
