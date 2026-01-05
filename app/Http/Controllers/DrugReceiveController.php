<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrugReceive;
use App\Models\DailyOrder;
use Illuminate\Support\Facades\DB;
use App\Models\ExpiryDate;




class DrugReceiveController extends Controller {
    public function create() {
        return view('drug_receive.create');
    }

    public function store(Request $request) {
        // Validate input
        $request->validate([
            'drug_name' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'expiry_date' => 'required|date|after:today',
        ]);

        // Create drug receive entry
        DrugReceive::create([
            'date' => now()->toDateString(),
            'drug_name' => $request->drug_name,
            'quantity' => $request->quantity,
            'expiry_date' => $request->expiry_date,
        ]);

        // Save to expiry_dates table
    ExpiryDate::create([
        
        'date' => now()->toDateString(),
            'drug_name' => $request->drug_name,
            'quantity' => $request->quantity,
            'expiry_date' => $request->expiry_date,
    ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Drug received successfully!');
    }
    
    public function showDetails(Request $request)
{
    // Start query builder for DrugReceive
    $query = DrugReceive::query();

    // If a drug name is specified, apply the filter
    if ($request->has('drug_name') && !empty($request->drug_name)) {
        $query->where('drug_name', 'like', '%' . $request->drug_name . '%');
    }

    // Group by drug name and sum the received quantity
    $drugReceives = $query->select('drug_name', DB::raw('SUM(quantity) as total_received_quantity'))
                          ->groupBy('drug_name')
                          ->get();

    // Process each drug to calculate used quantity & balance quantity
    foreach ($drugReceives as $drugReceive) {
        // Get total daily used quantity from DailyOrder table
        $daily_used_quantity = DailyOrder::where('drug_name', $drugReceive->drug_name)
                                         ->sum('quantity');

        // Calculate balance quantity
        $balance_quantity = $drugReceive->total_received_quantity - $daily_used_quantity;

        // Assign calculated values to the object
        $drugReceive->daily_used_quantity = $daily_used_quantity;
        $drugReceive->balance_quantity = $balance_quantity;

        // Check if stock is low (Threshold: 10)
        $drugReceive->is_low_stock = $balance_quantity <= 50;
    }

    // Return the view with the processed data
    return view('drug_receive.details', compact('drugReceives'));
}

    public function closeExpireDrugs()
{
    // Get the date for two months from now
    $twoMonthsFromNow = now()->addMonths(2)->toDateString();

    // Fetch drugs with expiry date within 2 months
    $closeExpireDrugs = DB::table('expiry_dates')
        ->where('expiry_date', '<=', $twoMonthsFromNow)
        ->where('expiry_date', '>=', now()->toDateString())
        ->get();

    return view('drug-receive.close-expire', compact('closeExpireDrugs'));
}

public function showDrugReceiveDetails(Request $request)
{
    // Start query to fetch data from the existing drug_receives table
    $query = DrugReceive::query();

    // If a drug name is specified, apply the search filter
    if ($request->has('drug_name') && !empty($request->drug_name)) {
        $query->where('drug_name', 'like', '%' . $request->drug_name . '%');
    }

    // Get the records ordered by date (latest first)
    $drugReceives = $query->orderBy('date', 'desc')->get();

    // Return the view with the data
    return view('drug_receive.details_date_wise', compact('drugReceives'));
}


}
