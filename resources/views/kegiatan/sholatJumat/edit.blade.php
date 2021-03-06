@extends('layouts.app')

@section('content')
    <div class="container bg-white p-5">
        <form action="{{ route('update-sholatJumat',$data->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Imam</label>
                <input type="text" class="form-control" name="imam" id="exampleInputEmail1" value="{{ $data->imam }}" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="3">{{ $data->keterangan }}</textarea>
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Penanggung Jawab</label>
                <input type="text" class="form-control" name="pj" id="exampleInputEmail1" value="{{ $data->penanggung_jawab }}" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary m-2">Save</button>
        </form>
    </div>
@endsection
