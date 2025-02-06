<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller {
    public function index() {
        return Customer::all();
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'ico_customers' => 'required|string|max:20',
            'dic_customers' => 'required|string|max:20',
            'street' => 'required|string',
            'postal_code' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);
        return Customer::create($validatedData);
    }

    public function show(Customer $customer) {
        return $customer;
    }

    public function update(Request $request, Customer $customer) {
        $customer->update($request->all());
        return $customer;
    }

    public function destroy(Customer $customer) {
        $customer->delete();
        return response()->noContent();
    }
}
