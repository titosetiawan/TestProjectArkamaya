@extends('layouts.app')

@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">
                        Insert Client
                    </div>
                    <div class="card-body">
                        <form action="{{ route('client.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Client Name</label>
                                <input type="text" class="form-control" name="client_name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Client Address</label>
                                <input type="text" class="form-control" name="client_address">
                            </div>

                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection