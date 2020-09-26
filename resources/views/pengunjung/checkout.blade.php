@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('keranjang')}}">keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-sm btn-outline-secondary" href="{{url('keranjang/checkout/view')}}">Checkout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" >Detail Pembayaran</a>
                        </li>
                    </ul>
                </div>
                <?php
                    $hrg = 0;
                    $qty = 0;
                    $total = 0
                ?>
                <div class="card-body" style="overflow-x:auto;">
                    <table class="table">
                        <tr>
                            <th>Gambar produk</th>
                            <th>Nama produk</th>
                            <th>Harga Produk</th>
                            <th></th>
                            <th>Qty Beli</th>
                            <th></th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($keranjang as $ker)
                        <?php
                            $h = $hrg + $ker->keranjang->harga_produk;
                            $q = $qty + $ker->qty_beli;
                            $t = $total + $h*$q;
                        ?>
                        <tr>
                            <td> <img src="{{url('storage/'.$ker->keranjang->gambar_produk)}}" style="width:100px;height:100px;" alt=""></td>
                            <td> <p class="card-text">{{$ker->keranjang->nama_produk}}</p></td>
                            <td> <p class="card-text">{{$ker->keranjang->harga_produk}}</p></td>
                            <td>X</td>
                            @if($ker->status == 1)
                            <td><p>{{$ker->qty_beli}}</p></td>
                            @else
                                <form action="{{url('keranjang/update/'.$ker->id)}}" method="post">
                                @csrf 
                            <td><input type="number" name="qty" value="{{$ker->qty_beli}}" class="form-control outline" style="text-align:center;" id=""></td>
                            @endif
                            <td>=</td>
                            <td>{{$t}}</td>
                            <th >
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                                    <a style="margin:10px;"  href="{{url('keranjang/delete/'.$ker->id)}}" class="btn btn-danger btn-sm">Delete</a>
                            </th>
                        </tr>   
                        @endforeach
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Rp {{number_format($produk)}}</th>
                            <th>X</th>
                            <th>{{$qty_c}}</th>
                            <th>=</th>
                            <th>Rp {{number_format($total_c)}}</th>
                                <th><a href="{{url('keranjang/bayar')}}" class="btn btn-primary btn-sm pull-right">Bayar</a></th>
                        </tr>
                    </table>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
