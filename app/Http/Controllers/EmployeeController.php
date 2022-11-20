<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the employee.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::all();
        $data = ['employees' => $employees];
        return view('employee.list', $data);
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $company = Company::find($id);
        $data = ['company' => $company];
        return view('employee.add', $data);
    }

    /**
     * Store a newly created employee in storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:200',
            'email' => 'required|email|unique:employees|max:200',
            'address' => 'required|max:100',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
            'zip_code' => 'required|max:20',
            'country' => 'required|max:50',
            'department' => 'required|max:150',
            'position' => 'required|max:150',
            'yearly_salary' => 'required|numeric',
            'company_id' => 'required|numeric|exists:companies,id',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Employee::create($input);
        return redirect()->route('company.employees', ['id' => $id])->with('success', 'Employee created successfully');
    }

    /**
     * Show the form for editing the specified employee.
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id, $id_employee)
    {
        $company = Company::find($id);
        $employee = Employee::find($id_employee);
        $data = [
            'company' => $company,
            'employee' => $employee,
        ];
        return view('employee.edit', $data);
    }

    /**
     * Update the specified employee in storage.
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id, $id_employee)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'address' => 'required|max:100',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
            'zip_code' => 'required|max:20',
            'country' => 'required|max:50',
            'department' => 'required|max:150',
            'position' => 'required|max:150',
            'yearly_salary' => 'required|numeric',
            'company_id' => 'required|numeric|exists:companies,id',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $company = Company::find($id);
        (new Employee())->updateEmployee($id_employee, $input);
        return redirect()->route('company.employees', ['id' => $company->id])->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified employee from storage.
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id, $id_employee)
    {
        $employee = Employee::find($id_employee);
        (new Employee())->deleteCompany($employee);
        return redirect()->route('company.employees', ['id' => $id])->with('success', 'Employee deleted successfully');
    }
}
