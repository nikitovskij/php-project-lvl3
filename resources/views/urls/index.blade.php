@extends('layout')

@section('urls')
    <div class="container-lg">
        <h1 class="mt-5 mb-3">Websites</h1>
        <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last check</th>
                    <th scope="col">Response code</th>
                </tr>
            </thead>
            <tbody>
                @foreach($urls as $url)
                    <tr>
                        <th scope="row">{{ $url->id }}</th>
                            <td>
                                <a href="{{ route('urls.show', $url->id) }}">{{ $url->name }}</a>
                            </td>
                        <td>{{ $url->updated_at }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
