<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreCompanyRequest;
use App\Http\Requests\Dashboard\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return view('companies.index', compact('companies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StoreCompanyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->validated());

        if ($request->hasFile('logo')) {
            $company->logo = uploadImage('companies', $request->logo);
            $company->save();
        }

        return redirect()->route('companies.show', $company);
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\UpdateCompanyRequest $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        if ($request->hasFile('logo') && request('logo') != '') {
            deleteOldImage($company->logo);
            $company->logo = uploadImage('companies', $request->logo);
            $company->save();
        }
        $company->update([
            'name' => $request->name,
            'email' => $request->name,
            'website' => $request->website,
            'revenue' => $request->revenue
        ]);

        return redirect()->route('companies.show', $company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success','Company successfully deleted.');
    }

}
