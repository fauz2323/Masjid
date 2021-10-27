@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Data</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <a href="" class="btn btn-primary mb-3">Add data</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="30px">no</th>
                                <th>Penceramah</th>
                                <th>Penanggung Jawab</th>
                                <th>Keterangan</th>
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
@endsection

@push('script')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '',
                columns: [{
                        data: 'no',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'ceramah',
                        name: 'ceramah'
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
