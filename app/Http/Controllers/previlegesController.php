<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Response;
class previlegesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $model;

    public function __construct()
    {
      $this->middleware('auth');
      $this->model = new models();
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $data = $this->model->previleges()->get();
        return view('backend_view.master.previleges.previleges_index',compact('data'));
    }
    public function create()
    {
        return view('backend_view.master.previleges.previleges_create');
    }
    public function save(Request $req)
    {
        $id = $this->model->previleges()->max('mp_id')+1;
        $simpan = $this->model->previleges()->create([
                    'mp_id'=>$id,
                    'mp_name'=>$req->name,
                  ]);
        if ($simpan == true) {
            return Response()->json(['status'=>'sukses']);
        }else{
            return Response()->json(['status'=>'gagal']);
        }
    }
    public function edit(Request $req)
    {
        $data = $this->model->previleges()->where('mp_id',$req->id)->first();
        return view('backend_view.master.previleges.previleges_edit',compact('data'));
    }
    public function update(Request $req)
    {
        $simpan = $this->model->previleges()->where('mp_id',$req->id)->update([
                    'mp_name'=>$req->name,
                  ]);

        if ($simpan == true) {
            return Response()->json(['status'=>'sukses']);
        }else{
            return Response()->json(['status'=>'gagal']);
        }
    }
    public function hapus(Request $req)
    {
        $data = DB::table('latihan_crud')->where('id',$req->id)->delete();
        return redirect()->back();
    }
}
