@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="mb-3 d-flex align-items-end justify-content-end p-4">
            <a href="{{ route('import_excel') }}" class="btn btn-sm btn-primary end-0">Insert Excel File</a>
        </div>
        @if (count($excelFiles) > 0)
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">File Name</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Excel imported</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($excelFiles as $key => $file)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $file->name }}</td>
                            <td>{{ $file->user->name }}</td>
                            <td>{{ $file->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('excel_detail', $file->id) }}" class="btn btn-sm btn-info">View Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <center>
                <h3 class="empty">No records found</h3>
            </center>
        @endif
    </div>
@endsection
