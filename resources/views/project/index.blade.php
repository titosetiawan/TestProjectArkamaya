@extends('layouts.app')

@section('contents')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Project</h1>
</div>
<div class="row">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        <!-- Search -->
                        <form class="form" method="get" action="">
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label style="text-align: center;">Filter</label>
                                    </div>
                                    <div class="col">
                                        <label for="project_name">Project Name</label>
                                        <input type="text" name="project_name" class="form-control" id="search" placeholder="search for" 
                                        value="{{ isset($_GET['project_name']) ? $_GET['project_name'] : '' }}">
                                    </div>
                                    <div class="col">
                                        <label for="client_id">Client</label>
                                        <select class="form-control client_id" name="client_id" id="search">
                                        <option selected></option>
                                            @foreach ($clientlevel as $item)
                                            <option value="{{ $item->id }}">{{ $item->client_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="project_status">Status</label>
                                        <select class="form-control project_status" name="project_status" id="search">
                                            <option selected></option>
                                            <option value="OPEN">OPEN</option>
                                            <option value="DOING">DOING</option>
                                            <option value="DONE">DONE</option>
                                        </select>
                                    </div>

                                    <div class="col">
                                        <button type="submit" class="btn btn-primary mb-1" style="float: left;">Cari</button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-danger mb-1" style="float: left;" onclick="document.getElementById('search').value = ''">Clear</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <!-- Insert Data -->
                        <a href="{{ route('project.create') }}" class="btn btn-sm btn-primary" style="float: left">
                            new
                        </a>
                    </div>

                    <!-- Table Content -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Project ID</th>
                                        <th>Project Name</th>
                                        <th>Client ID</th>
                                        <th>Project Start</th>
                                        <th>Project End</th>
                                        <th>Project Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($project as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->project_name }}</td>
                                        <td>{{ $data->client->client_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->project_start)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->project_end)->format('d M Y') }}</td>
                                        <td>{{ $data->project_status }}</td>
                                        <td>
                                            <form action="{{ route('project.destroy', $data->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('project.edit', $data->id) }}" class="btn btn-sm btn-outline-success">
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