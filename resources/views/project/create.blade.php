@extends('layouts.app')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Data Siswa
                </div>
                <div class="card-body">
                    <form action="{{ route('project.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Project Name</label>
                            <input type="text" class="form-control" name="project_name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Client</label>
                            <select class="form-control" name="client_id" required>
                                <option selected>chose one</option>
                                @foreach ($clientlevel as $item)
                                <option value="{{ $item->id }}">{{ $item->client_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Project Start</label>
                            <input type="date" class="form-control" name="project_start" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Poject End</label>
                            <input type="date" class="form-control" name="project_end" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Project Status</label>
                            <select class="form-control" name="project_status" required>
                                <option>chose one</option>
                                <option value="OPEN">OPEN</option>
                                <option value="DOING">DOING</option>
                                <option value="DONE">DONE</option>
                            </select>
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