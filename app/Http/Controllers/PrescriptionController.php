<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prescription;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prescriptions = Prescription::latest('prescription_date')->get();

        return view('prescriptions.index', compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prescriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'reference_number' => ['nullable', 'string', 'max:255'],
            'date' => ['required', 'date'],

            'right_sph' => ['nullable', 'numeric'],
            'right_cyl' => ['nullable', 'numeric'],
            'right_axis' => ['nullable', 'integer', 'between:0,180'],
            'right_add' => ['nullable', 'numeric'],

            'left_sph' => ['nullable', 'numeric'],
            'left_cyl' => ['nullable', 'numeric'],
            'left_axis' => ['nullable', 'integer', 'between:0,180'],
            'left_add' => ['nullable', 'numeric'],

            'pd' => ['nullable', 'string', 'max:20'],
            'notes' => ['nullable', 'string'],
            'amount_due' => ['nullable', 'numeric', 'min:0'],
        ]);

        $prescription = Prescription::create([
            'customer' => $validated['customer'],
            'address' => $validated['address'] ?? null,
            'reference_number' => $validated['reference_number'] ?? null,
            'created_by' => auth()->id(),
            'prescription_date' => $validated['date'],

            'right_sphere' => $validated['right_sph'] ?? null,
            'right_cylinder' => $validated['right_cyl'] ?? null,
            'right_axis' => $validated['right_axis'] ?? null,
            'right_add' => $validated['right_add'] ?? null,

            'left_sphere' => $validated['left_sph'] ?? null,
            'left_cylinder' => $validated['left_cyl'] ?? null,
            'left_axis' => $validated['left_axis'] ?? null,
            'left_add' => $validated['left_add'] ?? null,

            'pd' => $validated['pd'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'amount_due' => $validated['amount_due'] ?? null,
        ]);

        return redirect()
            ->route('prescriptions.show', $prescription)
            ->with('success', 'Prescription saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        return view('prescriptions.show', compact('prescription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescription $prescription)
    {
        return view('prescriptions.edit', compact('prescription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prescription $prescription)
    {
        $validated = $request->validate([
            'customer' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'reference_number' => ['nullable', 'string', 'max:255'],
            'date' => ['required', 'date'],

            'right_sph' => ['nullable', 'numeric'],
            'right_cyl' => ['nullable', 'numeric'],
            'right_axis' => ['nullable', 'integer', 'between:0,180'],
            'right_add' => ['nullable', 'numeric'],

            'left_sph' => ['nullable', 'numeric'],
            'left_cyl' => ['nullable', 'numeric'],
            'left_axis' => ['nullable', 'integer', 'between:0,180'],
            'left_add' => ['nullable', 'numeric'],

            'pd' => ['nullable', 'string', 'max:20'],
            'notes' => ['nullable', 'string'],
            'amount_due' => ['nullable', 'numeric', 'min:0'],
        ]);

        $prescription->update([
            'customer' => $validated['customer'],
            'address' => $validated['address'] ?? null,
            'reference_number' => $validated['reference_number'] ?? null,
            'prescription_date' => $validated['date'],

            'right_sphere' => $validated['right_sph'] ?? null,
            'right_cylinder' => $validated['right_cyl'] ?? null,
            'right_axis' => $validated['right_axis'] ?? null,
            'right_add' => $validated['right_add'] ?? null,

            'left_sphere' => $validated['left_sph'] ?? null,
            'left_cylinder' => $validated['left_cyl'] ?? null,
            'left_axis' => $validated['left_axis'] ?? null,
            'left_add' => $validated['left_add'] ?? null,

            'pd' => $validated['pd'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'amount_due' => $validated['amount_due'] ?? null,
        ]);

        return redirect()
            ->route('prescriptions.show', $prescription)
            ->with('success', 'Prescription updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();

        return redirect()
            ->route('prescriptions.index')
            ->with('success', 'Prescription deleted successfully.');
    }
}
