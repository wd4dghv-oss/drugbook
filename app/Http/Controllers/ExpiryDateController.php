<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpiryDate; // ✅ Make sure to import the correct model
use Carbon\Carbon;   // ✅ Import Carbon for date calculations

class ExpiryDateController extends Controller
{
    public function index()
    {
        // ✅ Get drugs that will expire within the next 2 months
        $closeExpireDrugs = ExpiryDate::where('expiry_date', '<=', Carbon::now()->addMonths(2))
                                ->orderBy('expiry_date', 'asc')
                                ->get();

        return view('close-expiry-drugs', compact('closeExpireDrugs'));
    }

    // ✅ Remove a drug from the list
    public function destroy($id)
{
    $drug = ExpiryDate::findOrFail($id);
    $drug->delete();

    return redirect()->route('drug.close-expiry')->with('success', 'Drug entry removed successfully.');
}
}
