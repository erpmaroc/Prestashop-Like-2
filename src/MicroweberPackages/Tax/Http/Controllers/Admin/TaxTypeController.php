<?php
namespace depexorPackages\Tax\Http\Controllers\Admin;

use depexorPackages\App\Http\Controllers\AdminController;
use depexorPackages\Tax\Tax;
use depexorPackages\Tax\TaxType;
use depexorPackages\Tax\User;
use depexorPackages\Tax\Http\Requests\TaxTypeRequest;
use Illuminate\Http\Request;

class TaxTypeController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $taxTypes = TaxType::whereCompany($request->header('company'))
            ->latest()
            ->get();

        return $this->view('tax::admin.taxes.index', [
            'taxTypes' => $taxTypes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view('tax::admin.taxes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxTypeRequest $request)
    {
        $taxType = new TaxType();
        $taxType->name = $request->name;
        $taxType->type = $request->type;
        $taxType->rate = $request->rate;
        $taxType->description = $request->description;
        if ($request->has('compound_tax')) {
            $taxType->compound_tax = $request->compound_tax;
        }
        $taxType->company_id = $request->header('company');
        $taxType->save();

        return $this->view('tax::admin.taxes.edit',[
            'taxType' => $taxType,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \depexorPackages\Tax\TaxType  $taxType
     * @return \Illuminate\Http\Response
     */
    public function show(TaxType $taxType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \depexorPackages\Tax\TaxType  $taxType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $taxType = TaxType::find($request->route('tax_type'));

        return $this->view('tax::admin.taxes.edit',[
            'taxType' => $taxType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \depexorPackages\Tax\TaxType  $taxType
     * @return \Illuminate\Http\Response
     */
    public function update(TaxTypeRequest $request)
    {
        $taxType = TaxType::find($request->route('tax_type'));

        $taxType->name = $request->name;
        $taxType->type = $request->type;
        $taxType->rate = $request->rate;
        $taxType->description = $request->description;
        if ($request->has('collective_tax')) {
            $taxType->collective_tax = $request->collective_tax;
        }
        $taxType->compound_tax = $request->compound_tax;
        $taxType->save();

        return $this->view('tax::admin.taxes.edit',[
            'taxType' => $taxType,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \depexorPackages\Tax\TaxType  $taxType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $taxType = TaxType::find($request->route('tax_type'));

        if (!$taxType) {
            return redirect(route('tax-types.index'))->with('status', 'Tax not found');
        }

        if ($taxType->taxes() && $taxType->taxes()->count() > 0) {
            return redirect(route('tax-types.index'))->with('status', 'Failed to delete tax.');
        }

        $taxType->delete();

        return redirect(route('tax-types.index'))->with('status', 'Tax has beed deleted.');
    }
}
