@extends('layouts.app')

@section('content')
    <div class="container bg-white p-5">
        <form action="{{ route('update-pengajian',$data->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Guru</label>
                <input type="text" class="form-control" name="guru" id="exampleInputEmail1" value="{{ $data->guru }}" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
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
