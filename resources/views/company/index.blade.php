@extends('layout.layout')

@section('content')

    <div class="container">
        <div class="text-center mt-5">
            <h1>Companies List</h1>
            <div class="card-body">
                <a href="{{ route('company.add') }}" class="btn btn-primary">Create a Company</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">

                        <div class="container">
                            <table id="company">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th># Employees</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{ $company->id }}</td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->address . ', ' . $company->city .', ' . $company->state . ' ' . $company->zip_code . ', ' . $company->country }}</td>
                                        <td>{{ $company->created_at }}</td>
                                        <td>{{ $company->updated_at }}</td>
                                        <td>{{ count($company->employees) }}</td>
                                        <td>
                                            <a href="{{ route('company.employees', ['id' => $company->id]) }}" class="btn btn-warning btn-sm">Employees</a>
                                            <a href="{{ route('company.edit', ['id' => $company->id]) }}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{ route('company.delete', ['id' => $company->id]) }}" class="btn btn-danger btn-sm">Delete</a>
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
            $('#company').DataTable();
        });
    </script>
@endpush