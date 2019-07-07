<?php

namespace App\Http\Controllers;

use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;


class UserController extends Controller
{
    protected $createFields =['id' , 'fname' , 'lname' , 'email' , 'gender' , 'password'];
    protected $user;
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->latest()->get();
        return view('admin_panel.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin_panel.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = $this->validateCreate($request->all())->validator();
       if ($user = User::create($request->only($this->createFields)));
        {
            return redirect()->route('users.index')->with(['success' => __('')]);
        }
        return redirect()->back()->with(['faile' => '']);
    }
    public function validateCreate(array $data)
{
       return $validator =Validator::make($data,[
        'fname' => 'required|string|min:3',
        'lname' => 'required|string|min:3',
        'email' => 'required|email|unique:users,email',
         'password'=>'required|min:8|confirmed',
    ], [
        'fname.required'=>'وارد کردن نام الزامیست',
         'fname.min'=>'نام نباید کمتر از 3 حرف باشد',
         'lname.required'=>'وارد کردن نام خانوادگی الزامیست',
         'lname.min'=>'نام خانوادگی نباید کمتر از 3 حرف باشد',
         'email.required'=>'وارد کردن ایمیل الزامیست',
         'email.unique'=>'این ایمیل از پیش ساخته شده است.ایمیل جدید وارد کنید',
         'password.required'=>'وارد کردن رمز عبور و تکرار آن الزامیست',
         'password.min'=>'کلمه عبور نباید کمتر از 8 کارکتر باشد',
         'password.confirmed'=>'تکرار کلمه عبور الزامیست'

     ]);


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
}
