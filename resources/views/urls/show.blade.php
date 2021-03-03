@extends('layouts.app')

@section('title', "Url SEO checks")

@section('content')
    <div class="container-lg">
        <h1 class="mt-5 mb-3">Website: {{ $url->name }}</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $url->id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $url->name }}</td>
                    </tr>
                    <tr>
                        <td>Date of creation</td>
                        <td>{{ $url->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Date of update</td>
                        <td>{{ $url->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h2 class="mt-5 mb-3">Checks</h2>
        <form method="post" action="{{ route('url_checks.store', ['id' => $url->id]) }}" class="mb-3 mt-3">
            @csrf
            <input type="submit" class="btn btn-primary" value="Run the check">
        </form>
        <table class="table table-bordered table-hover text-nowrap">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Status code</th>
                    <th scope="col">h1</th>
                    <th scope="col">Keywords</th>
                    <th scope="col">Description</th>
                    <th scope="col">Creation date</th>
                </tr>
            </thead>
            @isset($urlChecks)
                <tbody>
                @foreach($urlChecks as $urlCheck)
                    <tr>
                        <td>{{ $urlCheck->id }}</td>
                        <td>{{ $urlCheck->status_code }}</td>
                        <td>{{ Str::limit($urlCheck->h1, 10) }}</td>
                        <td>{{ Str::limit($urlCheck->keywords, 10) }}</td>
                        <td>{{ Str::limit($urlCheck->description, 30) }}</td>
                        <td>{{ $urlCheck->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
@endsection
