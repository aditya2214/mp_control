@extends('voyager::master')

@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                    <h1 style="margin-left:10px;" class="voyager-book">&nbsp;Data Pengunjung</h1>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="data_pengunjung" class="table">
                        <thead>
                            <tr>
                                <th>Nama Pengunjung</th>
                                <th>Email Pengunjung</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
<script>
$(function() {
    $('#data_pengunjung').DataTable({
        processing: true,
        serverSide: true,
        ajax:  "{{url('akun_pengunjung')}}",
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
        ]
    });
});
</script>
@endsection
