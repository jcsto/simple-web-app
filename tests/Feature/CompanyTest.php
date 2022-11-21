<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test home page is accessible
     *
     * @return void
     */
    public function testHomePage()
    {
        $response = $this->get('/');
        $response->assertOk();
        $response->assertStatus(200);
    }

    /**
     * Test create company
     *
     * @return void
     */
    public function testCreateCompany()
    {
        $body = [
            'name' => 'Company name',
            'email' => 'abc@gmail.com',
            'address' => '9812 St',
            'city' => 'Seattle',
            'state' => 'Washington',
            'zip_code' => '12345',
            'country' => 'Iran',
        ];
        $response = $this->post('/company/store', $body);
        $response->assertRedirect(route('company.list'));
        $response->assertSessionHas('success');
    }

    /**
     * Test create company with errors
     *
     * @return void
     */
    public function testCreateCompanyWithErrors()
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
     * Test edit company
     *
     * @return void
     */
    public function testEditCompany()
    {
        $faker = factory(\App\Company::class)->create();
        $body = [
            'name' => 'My new name',
            'email' => $faker->email,
            'address' => $faker->address,
            'city' => $faker->city,
            'state' => $faker->state,
            'zip_code' => '12344444',
            'country' => $faker->country,
        ];

        $response = $this->put('/company/' . $faker->id . '/update', $body);
        $response->assertRedirect(route('company.list'));
        $response->assertSessionHas('success');
    }

    /**
     * Test edit company with errors
     *
     * @return void
     */
    public function testEditCompanyWithErrors()
    {
        $faker = factory(\App\Employee::class)->create();
        $body = [
            'name' => 'My new name',
            'email' => $faker->email,
            'address' => $faker->address,
            'city' => $faker->city,
        ];

        $response = $this->put('/company/' . $faker->id . '/update', $body);
        $response->assertRedirect();
        $response->assertSessionHas('errors');
    }
}
