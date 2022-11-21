<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the company.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $companies = Company::all();
        $data = ['companies' => $companies];
        return view('company.index', $data);
    }

    /**
     * Show the form for creating a new company.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('company.add');
    }

    /**
     * Store a newly created company in storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'email' => 'required|email|unique:companies|max:200',
            'address' => 'required|max:100',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
            'zip_code' => 'required|max:20',
            'country' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $res = (new Company())->store($input);
        if (!$res) {
            return redirect()->route('company.list')->with('error', 'Error saving company');
        }

        return redirect()->route('company.list')->with('success', 'Company created successfully');
    }

    /**
     * Display the specified company with employees.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $company = Company::find($id);
        $employees = Employee::where('company_id', $id)->get();
        $data = [
            'employees' => $employees,
            'company' => $company
        ];
        return view('company.employees', $data);
    }

    /**
     * Show the form for editing the specified company.
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $company = Company::find($id);
        $data = [
            'company' => $company
        ];
        return view('company.edit', $data);
    }

    /**
     * Update the specified company in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'address' => 'required|max:100',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
            'zip_code' => 'required|max:20',
            'country' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $res = (new Company())->updateCompany($id, $input);
        if (!$res) {
            return redirect()->route('company.list')->with('error', 'Company was not found');
        }

        return redirect()->route('company.list')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified company from storage.
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        (new Company())->deleteCompany($company);
        return redirect()->route('company.list')->with('success', 'Company deleted successfully');
    }
}
