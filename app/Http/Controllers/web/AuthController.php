<?php
  
namespace App\Http\Controllers\web;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShortLink;
use Session;
use App\Models\User;
use DB;
use Hash;
use Validator;
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // $id = auth()->user()->id;
            // $plans = DB::table('user_plans_purchase')->where('user_id',$id)->latest()->get();
            // // DB::table('user_plans_purchase')->insert($input);
            // // dd($plans[0]->plan_purchase_id);
            // if(!empty($plans[0])){

                return redirect()->intended('/order')->withSuccess('You have Successfully loggedin');
            // }else{
            //     return redirect()->intended('plans')->withSuccess('You have Successfully loggedin');

            // }
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function dashboard()
    // {
    //     if(Auth::check()){
    //         $id = auth()->user()->id;
    //         $shortLinks = ShortLink::where('user_id',$id)->latest()->get();

    //         return view('dashboard', compact('shortLinks'));
    //         return view('dashboard');
    //     }
  
    //     return redirect("login")->withSuccess('Opps! You do not have access');
    // }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}