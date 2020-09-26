<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Datatables;
use Auth;
use Session;

class PengunjungController extends Controller
{
    //

    public function index(){
        return view('pengunjung.data_pengunjung',compact('user'));
    }

    public function datapengunjung(){
        $users = DB::table('users')->select('*')->where('role_id','2');
        return datatables()->of($users)->make(true);
    }

    public function detailproduk($id){
        $produk = \App\Produk::where('id',$id)->first();
        // return $produk;
        return view('pengunjung.detailproduk',compact('produk'));
    }

    public function beliproduk($id){
        $produk = \App\Produk::where('id',$id)->first();
        $idp = $produk->id;
        $user_id = Auth::user()->id;
        $harga = $produk->harga_produk;


        $keranjangs = new \App\Keranjang;
        $keranjangs->id_produk = $idp;
        $keranjangs->user_id = $user_id;
        $keranjangs->qty_beli=1;
        $total = $harga * $keranjangs->qty_beli;
        $keranjangs->total = $total;
        $keranjangs->status =0;

        $keranjangs->save();
        Session::flash('sukses','Data Berhasil Di Tambahkan Ke Keranjang');

        return redirect()->back();
    }

    public function keranjang(){
        $keranjang = \App\keranjang::where('user_id',Auth::user()->id)->where('status',0)->get();
        
        $produk = DB::table('produks')
            ->join('keranjangs', 'produks.id', '=', 'keranjangs.id_produk')
            ->select('produks.harga_produk')
            ->where('keranjangs.user_id',Auth::user()->id)
            ->where('keranjangs.status',0)
            ->pluck('produks.harga_produk')
            ->sum();
        
            $qty_c = DB::table('keranjangs')->where('status',0)->where('user_id',Auth::user()->id)->select('qty_beli')->pluck('qty_beli')->sum();
            
            $total_c = DB::table('keranjangs')->where('status',0)->where('user_id',Auth::user()->id)->select('total')->pluck('total')->sum();

            
        return view('pengunjung.keranjang',compact('keranjang','harga','produk','qty_c','total_c'));
    }

    public function deleteker($id){
        $delete = \App\Keranjang::where('id',$id)->delete();

        return redirect()->back();
    }

    public function updateker(Request $request,$id){

        $keran = \App\keranjang::findOrFail($id);
            $id_produk = $keran->id_produk;
            $produk = \App\Produk::where('id',$id_produk)->first();
            $harga = $produk->harga_produk;
        $keran->qty_beli = $request->qty;
        $keran->total = $request->qty * $harga;
        $keran->save();

        return redirect()->back();

    }

    public function checkout(){
        $keranj = \App\keranjang::where('user_id',Auth::user()->id)->update(['status'=>1]);

        return redirect('keranjang/checkout/view');

    }

    public function checkoutview(){
        $keranjang = \App\keranjang::where('user_id',Auth::user()->id)->where('status',1)->get();
        
        $produk = DB::table('produks')
            ->join('keranjangs', 'produks.id', '=', 'keranjangs.id_produk')
            ->select('produks.harga_produk')
            ->where('keranjangs.user_id',Auth::user()->id)
            ->where('keranjangs.status',1)
            ->pluck('produks.harga_produk')
            ->sum();
        
            $qty_c = DB::table('keranjangs')->where('status',1)->where('user_id',Auth::user()->id)->select('qty_beli')->pluck('qty_beli')->sum();
            
            $total_c = DB::table('keranjangs')->where('status',1)->where('user_id',Auth::user()->id)->select('total')->pluck('total')->sum();

            
        return view('pengunjung.checkout',compact('keranjang','harga','produk','qty_c','total_c'));

    }
}
