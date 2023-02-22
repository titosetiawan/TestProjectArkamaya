@extends('layouts.app')

@section('contents')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Client</h1>
</div>
<div class="row">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('client.create') }}" class="btn btn-sm btn-primary" style="float: left">
                            New
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Client ID</th>
                                        <th>Client Name</th>
                                        <th>Client Address</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($client as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->client_name }}</td>
                                        <td>{{ $data->client_address }}</td>
                                        <td>
                                            <form action="{{ route('client.destroy', $data->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('client.edit', $data->id) }}" class="btn btn-sm btn-outline-success">
                                                    Edit
                                                </a> |
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda Yakin?')">Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection