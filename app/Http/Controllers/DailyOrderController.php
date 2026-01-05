<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyOrder;

class DailyOrderController extends Controller
{
    public function index()
    {
        return view('daily-order');
    }

    public function store(Request $request) {
        $request->validate([
            'date' => 'required|date',
            'bht_no' => 'required|string',
            'drug_names' => 'required|array',
            'quantities' => 'required|array',
            'drug_names.*' => 'required|string',
            'quantities.*' => 'required|integer|min:1',
        ]);

        foreach ($request->drug_names as $index => $drugName) {
            DailyOrder::create([
                'date' => $request->date,
                'bht_no' => $request->bht_no,
                'drug_name' => $drugName,
                'quantity' => $request->quantities[$index],
            ]);
        }

        return redirect()->route('daily-order.index')->with('success', 'Daily Order saved successfully!');
    }

    public function show(Request $request) {
        $query = DailyOrder::orderBy('date', 'asc');

        if ($request->has('search') && !empty($request->search)) {
            $query->where('drug_name', 'like', '%' . $request->search . '%');
        }

        $orders = $query->get();
        return view('daily-order-details', compact('orders'));
    }
}
