@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="mb-3 d-flex align-items-end justify-content-end p-4">
            <a href="{{ route('import_excel') }}" class="btn btn-sm btn-primary end-0">Insert Excel File</a>
            <a href="{{ route('excel_lisiting') }}" class="btn btn-sm btn-danger end-0">Go back</a>

        </div>
        @if (count($headings) > 0 && count($excelData))
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        @foreach ($headings as $heading)
                            <th scope="col">{{ $heading }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($excelData->chunk($headingCount) as $chunkData)
                        <tr>
                            @foreach ($chunkData as $value)
                                <th scope="row">{{ $value }}</th>
                            @endforeach
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
