<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Relation to Company model
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    /**
     * Create an employee
     */
    public function store(array $data)
    {
        return Employee::create($data);
    }

    /**
     * Update an employee
     */
    public function updateEmployee($id, array $data)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return false;
        }
        return $employee->update($data);
    }

    /**
     * Delete an employee
     */
    public function deleteEmployee(Employee $employee)
    {
        return $employee->delete();
    }
}
