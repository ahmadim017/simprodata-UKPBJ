<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class dashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulan = DB::table('usulan')->select(DB::raw('count(*) as total, kategori'))
        ->where('kategori','<>',1)->groupBy('kategori')->get();
        $data = [];

        foreach ($usulan as $u) {
            $data[] = [$u->kategori,$u->total];
        }

        $dana = DB::table('usulan')->select(DB::raw('count(*) as totaldana, sumberdana'))
        ->where('sumberdana','<>',1)->groupBy('sumberdana')->get();
        $datadana = [];

        foreach ($dana as $d){
            $datadana[] = [$d->sumberdana,$d->totaldana];
        }
        
        $opd = DB::table('usulan')->leftJoin('opd','usulan.id_opd','=','opd.id')
        ->select('opd.opd', DB::raw('count(*) as total, opd') ,DB::raw('SUM(pagu) as totalpagu'),DB::raw('SUM(hps) as totalhps'))
        ->groupBy('opd.opd')->get();
        $dataopd = [];
        $total = [];
        $totalpagu = [];
        $totalhps = [];
        foreach ($opd as $o) {
           $dataopd[] = $o->opd;
           $total[] = $o->total;
           $totalpagu[] = $o->totalpagu;
           $totalhps[] = $o->totalhps;
        }

        $kategori = DB::table('usulan')->select('kategori', DB::raw('SUM(pagu) as pagu'))
        ->groupBy('kategori')->get();
        $datakategori = [];
        $pagu = [];
        foreach ($kategori as $k) {
            $datakategori[] = $k->kategori;
            $pagu[] = $k->pagu;
        }
        //dd($kategori);
        $usulan1 = \App\usulan::count();
        $tugas = \App\tugas::count();
        $hasil = \App\hasillelang::count();
        return view('dashboard.dash',['pagu' => $pagu,'totalhps' => $totalhps,'totalpagu' => $totalpagu,'tugas' => $tugas,'hasil' => $hasil,'usulan1'=> $usulan1,'data' => $data,'datadana' => $datadana,'dataopd' => $dataopd,'total' => $total,'datakategori' => $datakategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function($request, $next){
            if( Auth::user()->roles == "ADMIN"){
                return $next($request);
            }elseif(Auth::user()->roles == "AUDITOR"){
                return $next($request);
            }elseif(Auth::user()->roles == "USER"){
                return $next($request);
            }else{
                return redirect()->guest('/404');
            }
        });
    }
}
