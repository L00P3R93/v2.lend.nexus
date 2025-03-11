<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {
        $query = $request->input('query');
        if (!$query) {
            return Response::json([]);
        }
        $results = Customer::search($query)
            ->take(10)
            ->get()
            ->map(function ($customer) {
                return array_filter([
                    "id" => $customer->id,
                    "bio" => "<strong>Name: </strong>".$customer->getCustomerName()."<br><strong>Phone: </strong>".$customer->primaryPhone.", <strong>ID: </strong>".$customer->idNo."<br>",
                    "productName" => "<strong>Product: </strong>".$customer->product?->name.", ", // Ensure no error if product is null
                    "bank" => $customer->product_id == 1 ? "<strong>Bank: </strong>".$customer->bank?->name." | ".$customer->branch?->name."<br>" : null, // Conditional relationship
                    "loan" => optional($customer->loans()->latest('id')->first())->id,
                    "status" => optional($customer->loans()->latest('id')->first())?->getStatusBadge(),
                ]);
            });

        return Response::json($results);
    }
}
