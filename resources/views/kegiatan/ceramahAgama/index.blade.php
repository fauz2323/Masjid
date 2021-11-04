@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Ceramah</h6>
        </div>
        <div class="card-body">
            {{-- <div class="">
                    <a href="" class="btn btn-primary mb-3">Add data</a>
                </div> --}}
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                Add Data
            </button>
            <div class="table-responsive">
                <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="30px">no</th>
                            <th>Penceramah</th>
                            <th>Penanggung Jawab</th>
                            <th>Tema</th>
                            <th>Input by</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kultum-stre') }}" method="post">

            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Penceramah</label>
                        <input type="text" class="form-control" name="ustad" id="exampleInputEmail1"  aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Penanggung Jawab</label>
                        <input type="text" class="form-control" name="pj" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>

        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '',
                columns: [{
                        data: 'no',
                        name: 'id',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'ustad',
                        name: 'ustad'
                    },
                    {
                        data: 'penanggung_jawab',
                        name: 'penanggung_jawab'
                    }, {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    }
                ]
            });
        });

    </script>
@endpush
