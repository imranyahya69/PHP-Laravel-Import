<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/main.css') }}">
    <title>Laravel Excel</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/excel.png') }}">
</head>

<body>
    @if (session()->has('message') && session()->has('status'))
        <center>
            <div class="alert @if (session()->pull('status') == 'success') alert-success @else alert-danger @endif">
                {{ session()->pull('message') }}
            </div>
        </center>
    @endif
    <center>
        <h1 class="mb-5
            mt-5">Laravel Excel Project</h1>
    </center>
