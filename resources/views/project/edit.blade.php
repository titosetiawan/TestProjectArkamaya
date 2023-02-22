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
                    <form action="{{ route('project.update', $project->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="form-label">Project Name</label>
                            <input type="text" class="form-control" name="project_name" value="{{ $project->project_name }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Client</label>
                            <select class="form-control" name="client_id">
                                @foreach ($clientlevel as $item)
                                <option selected value="{{ $item->id }}">{{ $item->client_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Project Start</label>
                            <input type="date" class="form-control" name="project_start" value="{{ $project->project_start }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Poject End</label>
                            <input type="date" class="form-control" name="project_end" value="{{ $project->project_end }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Project Status</label>
                            <select class="form-control" name="project_status">
                                <option selected>chose one</option>
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