@extends('voyager::master')

@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                    <h1 style="margin-left:10px;" class="voyager-book">&nbsp;Kategori {{$kategory->kode_kategori}}</h1>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="view_table" class="table">
                        <thead>
                            <tr>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga Produk</th>
                                <th>Stock Produk</th>
                                <th>Tempat Produk</th>
                                <th>Kategori Produk</th>
                                <th>Created at Produk</th>
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
@if($produk_view == null)

@else
<script>
$(function() {
    $('#view_table').DataTable({
        processing: true,
        serverSide: true,
        ajax:  "{{url('data-check/'.$kategory->id)}}",
        columns: [
            { data: 'kode_produk', name: 'kode_produk' },
            { data: 'nama_produk', name: 'nama_produk' },
            { data: 'harga_produk', name: 'harga_produk' },
            { data: 'stock_produk', name: 'stock_produk' },
            { data: 'tempat_produk', name: 'tempat_produk' },
            { data: 'kategori_produk', name: 'kategori_produk' },
            { data: 'created_at', name: 'created_at' },

        ]
    });
});
</script>
@endif
@endsection
