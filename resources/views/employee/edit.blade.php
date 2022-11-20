@extends('layout.layout')

@section('content')

    <div class="container">
        <div class="text-center mt-5">
            <h1>Company {{ $company->name }} - Edit Employee {{ $employee->full_name }}</h1>
        </div>

        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">

                        <div class = "container">
                            <form role="form" method="post" action="{{ route('company.employee.update', ['id' => $company->id, 'id_employee' => $employee->id]) }}">
                                @csrf
                                @method('put')

                                <input type="hidden" name="company_id" value="{{ $company->id }}">

                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="full_name">Full Name *</label>
                                                <input id="full_name" type="text" name="full_name" class="form-control" required="required" value="{{ $employee->full_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email *</label>
                                                <input id="email" type="email" name="email" class="form-control" required="required" value="{{ $employee->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address *</label>
                                                <input id="address" type="text" name="address" class="form-control" required value="{{ $employee->address }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city">City *</label>
                                                <input id="city" type="text" name="city" class="form-control" required="required" value="{{ $employee->city }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="state">State *</label>
                                                <input id="state" type="text" name="state" class="form-control" required="required" value="{{ $employee->state }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="country">Country *</label>
                                                <input id="country" type="text" name="country" class="form-control" required="required" value="{{ $employee->country }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="zip_code">Zip Code *</label>
                                                <input id="zip_code" type="number" name="zip_code" class="form-control" required value="{{ $employee->zip_code }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="department">Department *</label>
                                                <input id="department" type="text" name="department" class="form-control" required value="{{ $employee->department }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="position">Position *</label>
                                                <input id="position" type="text" name="position" class="form-control" required="required" value="{{ $employee->position }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="yearly_salary">Salary (year) *</label>
                                                <input id="yearly_salary" type="text" name="yearly_salary" class="form-control" required="required" value="{{ $employee->yearly_salary }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-6">
                                            <input type="submit" class="btn btn-success btn-send" value="Update">
                                            <a href="{{ route('company.employees', ['id' => $company->id]) }}" class="btn btn-warning">Cancel</a>
                                        </div>
                                    </div>

                                </div>
                            </form>
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
    <script></script>
@endpush