<?php

namespace Tests\Unit;

use App\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create company and verify content
     *
     * @return void
     */
    public function testCreateAndVerify()
    {
        $faker = Company::create([
            'name' => 'Company name',
            'email' => 'abc@gmail.com',
            'address' => '9812 St',
            'city' => 'Seattle',
            'state' => 'Washington',
            'zip_code' => '12345',
            'country' => 'Iran',
        ]);

        $this->assertInstanceOf(Company::class, $faker);
        $this->assertEquals($faker->country, 'Iran');
    }
}
