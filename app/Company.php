<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Relation to Employee model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }


    /**
     * Create a company
     */
    public function store(array $data)
    {
        return Company::create($data);
    }

    /**
     * Update a company
     */
    public function updateCompany($id, array $data)
    {
        $company = Company::find($id);
        if (!$company) {
            return false;
        }

        return $company->update($data);
    }

    /**
     * Delete a company. Will delete any related employees as well.
     */
    public function deleteCompany(Company $company)
    {
        return $company->delete();
    }
}
