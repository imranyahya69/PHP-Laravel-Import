@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <form action="{{ route('import_excel') }}" method="POST" enctype="multipart/form-data">
            <div class="mb-5">
                @csrf
                <input class="form-control" accept=".xlxs,.xls" type="file" name="file">
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex align-items-end justify-content-end">
                <button class="btn btn-sm btn-success end-0" type="submit">Import</button>
            </div>
        </form>
    </div>
@endsection
