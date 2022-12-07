## Description
Simple web app built in Laravel 7. Create and edit companies. Create, edit, delete employees by company.

## Installation

```bash
# install dependencies
composer install

# setup the .env file and set your database values.
# run migrations
php artisan migrate

# generate your key if not generated 
php artisan key:generate

#run then app
php artisan serve

#run tests
php artisan test
```

## Running the app

You are all set! You can access the application in the url:
http://127.0.0.1:8000/

## Notes
### Files modified:
#### Controllers:
- app/Http/Controllers/CompanyController.php
- app/Http/Controllers/EmployeeController.php
- app/Http/Controllers/NotFoundController.php

#### Models:
- app/Company.php
- app/Employee.php

#### Views:
- resources/views/company/add.blade.php
- resources/views/company/edit.blade.php
- resources/views/company/employees.blade.php
- resources/views/company/index.blade.php
- resources/views/employee/add.blade.php
- resources/views/employee/edit.blade.php
- resources/views/employee/list.blade.php
- resources/views/layout/footer.blade.php
- resources/views/layout/header.blade.php
- resources/views/layout/layout.blade.php
- resources/views/404.blade.php

#### Routes (re-written):
- routes/web.php

#### Migrations and Factories:
- database/factories/CompanyFactory.php
- database/factories/EmployeeFactory.php
- database/migrations/2022_11_20_025804_create_companies_table.php
- database/migrations/2022_11_20_030734_create_employees_table.php

#### Tests:
- tests/Feature/CompanyTest.php
- tests/Feature/EmployeeTest.php
- tests/Unit/CompanyTest.php