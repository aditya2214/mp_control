@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card-deck">
            
            <div class="card" style="margin-left:20px;isplay: flex;  justify-content: center;  flex-direction: row;">
                <img src="{{url('storage/'.$produk  ->gambar_produk)}}" class="card-img-top" style="width:100px; height:100px; display: block;  margin-left: auto; margin-right: auto; width: 100px;" alt="...">
                <div class="card-body">
                    <p class="card-title"><b>{{$produk  ->nama_produk}}</b> </p>
                    <p class="card-text">Harga : Rp.{{number_format($produk ->harga_produk)}} | Stock : {{$produk    ->stock_produk}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        &nbsp;<small class="text-muted">{{$produk   ->created_at}}</small>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection