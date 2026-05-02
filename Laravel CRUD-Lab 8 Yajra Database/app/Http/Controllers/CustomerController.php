<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $customers = Customer::select('id', 'name', 'email', 'phone');
            return DataTables::of($customers)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('customers.show', $row->id).'" class="btn btn-info btn-sm">View</a> ';
                    $actionBtn .= '<a href="'.route('customers.edit', $row->id).'" class="btn btn-warning btn-sm">Edit</a> ';
                    $actionBtn .= '<form action="'.route('customers.destroy', $row->id).'" method="POST" class="d-inline" onsubmit="return confirm(\'Are you sure?\')">';
                    $actionBtn .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
                    $actionBtn .= '<input type="hidden" name="_method" value="DELETE">';
                    $actionBtn .= '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
                    $actionBtn .= '</form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
