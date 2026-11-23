<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() { return view('customers.index', ['customers' => Customer::latest('created_at')->paginate(10)]); }
    public function create() { return view('customers.form', ['customer' => new Customer(), 'heading' => 'Add customer']); }
    public function store(Request $request) { $customer = new Customer(); $this->save($request, $customer); return redirect()->route('customers.index')->with('success', 'Customer added.'); }
    public function edit(Customer $customer) { return view('customers.form', compact('customer') + ['heading' => 'Edit customer']); }
    public function update(Request $request, Customer $customer) { $this->save($request, $customer); return redirect()->route('customers.index')->with('success', 'Customer updated.'); }
    public function destroy(Customer $customer) { if ($customer->sales()->exists()) return back()->with('error', 'This customer has sales and cannot be deleted.'); $customer->delete(); return back()->with('success', 'Customer deleted.'); }
    private function save(Request $request, Customer $customer): void { $customer->fill($request->validate(['full_name'=>['required','string','max:100'],'email'=>['required','email','max:100'],'phone'=>['nullable','string','max:20']]))->save(); }
}
