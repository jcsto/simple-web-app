<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test home page is accessible
     *
     * @return void
     */
    public function testEmployeesList()
    {
        $response = $this->get(route('employee.list'));
        $response->assertOk();
        $response->assertStatus(200);
        $this->assertStringContainsString('All Employees', $response->getContent());
    }

    /**
     * Test create company
     *
     * @return void
     */
    public function testCreateEmployee()
    {
        $fakerCompany = factory(\App\Company::class)->create();
        $body = [
            'full_name' => 'My Name',
            'company_id' => $fakerCompany->id,
            'email' => 'abc@gmail.com',
            'address' => '9812 St',
            'city' => 'Seattle',
            'state' => 'Washington',
            'zip_code' => '12345',
            'country' => 'Iran',
            'position' => 'Software Developer',
            'department' => 'IT',
            'yearly_salary' => '130000.00',
        ];
        $response = $this->post('/company/' . $fakerCompany->id . '/employee/store', $body);
        $response->assertRedirect(route('company.employees', ['id' => $fakerCompany->id]));
        $response->assertSessionHas('success');
    }

    /**
     * Test create employee with errors
     *
     * @return void
     */
    public function testCreateEmployeeWithErrors()
    {
        $body = [
            'name' => 'Company name',
            'email' => 'abc@gmail.com',
            'address' => '9812 St',
            'city' => 'Seattle',
        ];
        $response = $this->post('/company/store', $body);
        $response->assertRedirect();
        $response->assertSessionHas('errors');
    }

    /**
     * Test edit employee
     *
     * @return void
     */
    public function testEditEmployee()
    {
        $faker = factory(\App\Employee::class)->create();
        $body = [
            'full_name' => 'Lim Ware',
            'email' => $faker->email,
            'address' => $faker->address,
            'city' => $faker->city,
            'state' => $faker->state,
            'zip_code' => '12344444',
            'country' => $faker->country,
            'position' => 'Software Developer',
            'department' => 'IT',
            'yearly_salary' => '130000.00',
            'company_id' => $faker->company_id
        ];

        $response = $this->put('/company/' . $faker->company_id . '/employee/' . $faker->id . '/update', $body);
        $response->assertRedirect(route('company.employees', ['id' => $faker->company_id]));
        $response->assertSessionHas('success');
    }

    /**
     * Test edit employee with errors
     *
     * @return void
     */
    public function testEditEmployeeWithErrors()
    {
        $faker = factory(\App\Employee::class)->create();
        $body = [
            'full_name' => 'Lim Ware',
            'email' => $faker->email,
            'address' => $faker->address,
            'city' => $faker->city,
            'state' => $faker->state,
            'zip_code' => '12344444',
            'country' => $faker->country,
            'position' => 'Software Developer',
            'department' => 'IT',
            'yearly_salary' => '130000.00',
        ];

        $response = $this->put('/company/' . $faker->company_id . '/employee/' . $faker->id . '/update', $body);
        $response->assertRedirect();
        $response->assertSessionHas('errors');
    }

    /**
     * Test delete employee
     *
     * @return void
     */
    public function testDeleteEmployee()
    {
        $faker = factory(\App\Employee::class)->create();
        $response = $this->get(route('company.employee.delete', ['id' => $faker->company_id, 'id_employee' => $faker->id]));
        $response->assertRedirect();
        $response->assertSessionHas('success');
    }

    /**
     * Test delete employee with error
     *
     * @return void
     */
    public function testDeleteEmployeeWithError()
    {
        $faker = factory(\App\Employee::class)->create();
        $response = $this->get(route('company.employee.delete', ['id' => $faker->company_id, 'id_employee' => 11]));
        $response->assertRedirect();
        $response->assertSessionHas('error');
    }
}
