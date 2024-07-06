@extends('layout/admin')

@section('content')
    <div class="container mb-3 mt-3">
        <div class="row">
            <div class="col-lg-4">
                <div class="container card shadow p-3">
                    <h3>Jumlah Artikel</h3>
                    <h5>{{$artikel.' artikel'}}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection