@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message = Session::get('sukses'))
        <div style="margin:20px;" class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong> {{ $message }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="card-deck">
            @foreach($produk as $p)
            <div class="card">
                <img src="{{url('storage/'.$p->gambar_produk)}}" class="card-img-top" style="width:100px; height:100px; display: block;  margin-left: auto; margin-right: auto; width: 100px;" alt="...">
                <div class="card-body">
                    <p class="card-title"><b>{{$p->nama_produk}}</b> </p>
                    <p class="card-text">Harga : Rp.{{number_format($p->harga_produk)}} | Stock : {{$p->stock_produk}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{url('detail-produk/'.$p->id)}}" class="btn btn-sm btn-outline-secondary" >View</a>
                            <a  href="{{url('beli-produk/'.$p->id)}}" class="btn btn-sm btn-outline-secondary"  >Buy</a>            
                        </div> 
                        &nbsp;<small class="text-muted">{{$p->created_at}}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 5000);
</script>

@endsection
