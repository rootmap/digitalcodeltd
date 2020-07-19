<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class AdminInfoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admininfo.index');
    }
    
    public function createIndex() {
        return view('admininfo.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_type' => 'required',
        ]);

        //echo $request->name;
        //exit();

        $chkCus = Customer::where('email', $request->email)->count();
        if ($chkCus == 0) {
            $cat = new Customer;
            $cat->name = $request->name;
            $cat->email = $request->email;
            $cat->password = bcrypt($request->password);
            $cat->user_type = 'Admin';
            $cat->save();
            $userChk = DB::table('users')->where('email', $request->email)->count();
            if ($userChk == 0) {
                DB::table('users')->insert(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password), 'user_type' => 'Admin']);
            } else {
                DB::table('users')
                        ->where('email', $request->email)
                        ->update(['password' => bcrypt($request->password), 'user_type' => 'Admin']);
            }
            return redirect('admin-ecom/Admin-Info')->with('status', 'Admin Info Successfully Added!');
        } else {
            return redirect('admin-ecom/Admin-Info')->with('error', 'Admin Info Already Exists!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    public function showjson() {
        $json = Customer::where('user_type', 'Admin')->get();

        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $json = Customer::find($id);
        return view('admininfo.edit', ['data' => $json]);
    }
    public function Reshow($id) {
        $json = DB::table('users')->where('id',$id)->first();
        $tab=Customer::where('email',$json->email)->first();
        
        //print_r($tab);
        
        //exit();
        $cid=$tab->id;
        return redirect(url('admin-ecom/Admin-Info/'.$cid));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_type' => 'required',
        ]);

        //echo $request->name;
        //exit();

        $cat = Customer::find($request->id);
        $cat->name = $request->name;
        $cat->email = $request->email;
        $cat->password = bcrypt($request->password);
        $cat->save();

        DB::table('users')
                ->where('email', $request->email)
                ->update(['password' => bcrypt($request->password)]);

        return redirect('admin-ecom/Admin-Info')->with('status', 'Admin Info Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {


        $json = Customer::find($id);
        $getEmail = $json->email;

        if (Auth::user()->email != $getEmail) {

            DB::table('users')->where('email', $getEmail)->delete();
            $json->delete();
            return response()->json(1);
        }
        else{
            return response()->json(2);
        }
            

        
    }

}
