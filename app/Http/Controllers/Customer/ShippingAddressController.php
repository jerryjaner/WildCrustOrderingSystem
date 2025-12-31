<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\DeliveryAddress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Customer\ShippingAddressStoreRequest;

class ShippingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.shipping-address.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShippingAddressStoreRequest $request)
    {
         $validatedData = $request->validated();

        // Here you would typically create the delivery address in the database
         DeliveryAddress::create($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'Delivery address created successfully',
        ]);
    }

    /**
     * Display the specified resource records with filtering.
     */
    public function record(Request $request)
    {
        $addresses = DeliveryAddress::where('user_id', Auth::user()->id)->get();

        if ($addresses->count() > 0) {
            $i = 1;
            $output = '<table class="table table-striped table-row-bordered gy-5 gs-7" id="shipping_address_record_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Phone Number</th>
                                <th>Complete Address</th>
                                <th>Default</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>';

            foreach ($addresses as $data) {
                $status = $data->is_default
                            ? "<span class='badge badge-success'>Default</span>"
                            : "<span class='badge badge-secondary'>Not Default</span>";

                    // Delete button
                    $deleteButton = '<button class="btn btn-sm btn-danger shipping_address_delete" data-id="'.$data->id.'">
                        <i class="bi bi-trash me-1"></i>Delete
                    </button>
                    ';

                $output .= '<tr>
                                <td>'.$i++.'</td>
                                <td>'.$data->full_name.'</td>
                                <td>'.$data->phone.'</td>
                                <td>'.$data->street.', '.$data->barangay.', '.$data->city.', '.$data->province.', '.$data->postal_code.'</td>
                                <td>'.$status.'</td>
                                <td>'.$deleteButton.'</td>
                            </tr>';
            }

            $output .= '</tbody></table>';
            return response($output);
        }

        return response('<h3 class="text-center text-black mt-5">No record present in the database!</h3>');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DeliveryAddress::findOrFail($id);
        $query->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Delivery address deleted successfully',
        ]);
    }
}
