@extends('layout.layout')

@section('content')

    <div class="container">
        <div class="text-center mt-5">
            <h1>All Employees</h1>
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
                                    <th>Company</th>
                                    <th>Address</th>
                                    <th>Position</th>
                                    <th>Department</th>
                                    <th>Salary (year)</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->full_name }}</td>
                                        <td><a href="{{ route('company.employees', ['id' => $employee->company->id]) }}">{{ $employee->company->name }}</a></td>
                                        <td>{{ $employee->address . ', ' . $employee->city .', ' . $employee->state . ' ' . $employee->zip_code . ', ' . $employee->country }}</td>
                                        <td>{{ $employee->position }}</td>
                                        <td>{{ $employee->department }}</td>
                                        <td>{{ '$' . number_format($employee->yearly_salary, 2) }}</td>
                                        <td>{{ $employee->created_at }}</td>
                                        <td>{{ $employee->updated_at }}</td>
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