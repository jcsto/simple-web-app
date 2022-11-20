@extends('layout.layout')

@section('content')

    <div class="container">
        <div class="text-center mt-5">
            <h1>Add a Company</h1>
        </div>

        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">

                        <div class = "container">
                            <form role="form" method="post" action="{{ route('company.store') }}">
                                @csrf

                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_name">Name *</label>
                                                <input id="form_name" type="text" name="name" class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email *</label>
                                                <input id="email" type="email" name="email" class="form-control" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address *</label>
                                                <input id="address" type="text" name="address" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city">City *</label>
                                                <input id="city" type="text" name="city" class="form-control" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="state">State *</label>
                                                <input id="state" type="text" name="state" class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="country">Country *</label>
                                                <input id="country" type="text" name="country" class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="zip_code">Zip Code *</label>
                                                <input id="zip_code" type="number" name="zip_code" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-6">
                                            <input type="submit" class="btn btn-success btn-send" value="Create">
                                            <a href="{{ route('company.list') }}" class="btn btn-warning">Cancel</a>
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