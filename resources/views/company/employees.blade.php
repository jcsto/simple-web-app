@extends('layout.layout')

@section('content')

    <div class="container">
        <div class="text-center mt-5">
            <h1>{{ $company->name }} - Employees List</h1>
            <div class="card-body">
                <a href="{{ route('company.employee.add', ['id' => $company->id]) }}" class="btn btn-primary">Add Employee</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">

                        <div class="container">
                            <table id="employees">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>Position</th>
                                    <th>Department</th>
                                    <th>Salary (year)</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->full_name }}</td>
                                        <td>{{ $employee->address . ', ' . $employee->city .', ' . $employee->state . ' ' . $employee->zip_code . ', ' . $employee->country }}</td>
                                        <td>{{ $employee->position }}</td>
                                        <td>{{ $employee->department }}</td>
                                        <td>{{ '$' . number_format($employee->yearly_salary, 2) }}</td>
                                        <td>{{ $employee->created_at }}</td>
                                        <td>{{ $employee->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('company.employee.edit', ['id' => $company->id, 'id_employee' => $employee->id]) }}" class="btn btn-success">Edit</a>
                                            <a href="{{ route('company.employee.delete', ['id' => $company->id, 'id_employee' => $employee->id]) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.8 -->

            </div>
            <!-- /.row-->

        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready( function () {
            $('#employees').DataTable();
        });
    </script>
@endpush