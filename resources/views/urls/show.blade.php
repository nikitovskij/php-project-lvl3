@extends('layout')

@section('url')
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
        <form method="post" action="#" class="mb-3 mt-3">
            @csrf
            <input type="submit" class="btn btn-primary" value="Run the check">
        </form>
        <table class="table table-bordered table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Код ответа</th>
                    <th>h1</th>
                    <th>keywords</th>
                    <th>description</th>
                    <th>Дата создания</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
