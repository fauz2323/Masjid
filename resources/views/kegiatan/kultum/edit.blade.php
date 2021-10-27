@extends('layouts.app')

@section('content')
    <div class="container bg-white p-5">
        <form action="{{ route('kultum-stre',$data->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Penceramah</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $data->ceramah }}" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">keterangan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $data->keterangan }}" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Penanggung Jawab</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $data->penanggung_jawab }}" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary m-2">Save</button>
        </form>
    </div>
@endsection
