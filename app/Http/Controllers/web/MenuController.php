<?php

namespace App\Http\Controllers\web;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\OrderModel;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Validator;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('menu');
    }
    public function menu(){
        // return view('menu2');
        // return view('menu2')->with('menulist',Menu::all());
        // $menulist = DB::table('menu_list')->orderBy('menu_id', 'DESC')->get();
        // $now = \Carbon\Carbon::today();
        // $menulist = DB::table('menu_list')->where('menu_date', '<=', $now)->groupBy(DB::raw("DATE_FORMAT(menu_date, '%d-%m-%Y')"))
        // ->orderBy('menu_id', 'DESC')->get();
        //     $now = \Carbon\Carbon::today();
        //     $menulist = DB::table('menu_list')->where('menu_date', '<=', $now)
        //     ->orderBy('menu_id', 'DESC')->groupBy('menu_date')->get();
        //  dd($menulist);

        $menulist = DB::table('menu_list')->select('menu_date')->orderBy('menu_id', 'DESC')->get();
    
        $i=0;
        $menudates=array();
        $menu1=array();
        $menu2=array();
        $menu3=array();
        $product_variants='';

        // $menulistdate = DB::table('menu_list')->select('menu_date')->orderBy('menu_id', 'DESC')->get();
            //  dd($menulistdate);
            foreach ($menulist as $menusingle) {
                $menudates[]=$menusingle->menu_date;
                $menu1[] = DB::table('menu_list')
                ->where('menu_list.menu_type','Breakfast')
                // ->whereDate('menu_date', $menusingle->menu_date)
                ->get()->toArray();
                
                $menu2[] = DB::table('menu_list')
                ->where('menu_list.menu_type','Dinner')
                // ->whereDate('menu_date', $menusingle->menu_date)
                ->get()->toArray();
                $menu3[] = DB::table('menu_list')
                ->where('menu_list.menu_type','Lunch')
                // ->whereDate('menu_date', $menusingle->menu_date)
                ->get()->toArray();
                $menu4[] = DB::table('menu_list')
                ->where('menu_list.menu_type','Snack')
                // ->whereDate('menu_date', $menusingle->menu_date)
                ->get()->toArray();
                $i++;
            }
        
            
        
        // dd($menu1);
        
        //   $data[] = (array)$result;
        //   $menus1[]=(array)$menu1;
        //   $menus2[]=(array)$menu2;
        //   $menus3[]=(array)$menu3;
        return view('menu2',['menulist'=>$menulist,'breakArr'=>$menu1,'dinnerArr'=>$menu2,'lunchArr'=>$menu3,'snacksArr'=>$menu4]);
    }
    public function breakfast(){
        // $menudates[]=$menusingle->menu_date;
        $menu = DB::table('menu_list')
        ->leftjoin('vendor_menues','vendor_menues.menu_id','=', 'menu_list.menu_id')
        ->leftjoin('vendor','vendor.vendor_id','=', 'vendor_menues.vendor_id')
        ->select('menu_list.*','vendor.vendor_name')
        ->where('menu_list.menu_type','Breakfast')
        // ->whereDate('menu_date', $menusingle->menu_date)
        ->paginate(10);
            //  dd($menu);
        return view('breakfast',['menu'=>$menu]);
    }
    public function lunch(){
        // $menudates[]=$menusingle->menu_date;
        $menu = DB::table('menu_list')
        ->leftjoin('vendor_menues','vendor_menues.menu_id','=', 'menu_list.menu_id')
        ->leftjoin('vendor','vendor.vendor_id','=', 'vendor_menues.vendor_id')
        ->select('menu_list.*','vendor.vendor_name')
        ->where('menu_list.menu_type','Lunch')
        // ->whereDate('menu_date', $menusingle->menu_date)
        ->paginate(10);
             
        return view('lunch',['menu'=>$menu]);
    }
    public function dinner(){
        // $menudates[]=$menusingle->menu_date;
        $menu = DB::table('menu_list')
        ->leftjoin('vendor_menues','vendor_menues.menu_id','=', 'menu_list.menu_id')
        ->leftjoin('vendor','vendor.vendor_id','=', 'vendor_menues.vendor_id')
        ->select('menu_list.*','vendor.vendor_name')
        ->where('menu_list.menu_type','Dinner')
        // ->whereDate('menu_date', $menusingle->menu_date)
        ->paginate(10);
             
        return view('dinner',['menu'=>$menu]);
    }
    public function snacks(){
        // $menudates[]=$menusingle->menu_date;
        $menu = DB::table('menu_list')
        ->leftjoin('vendor_menues','vendor_menues.menu_id','=', 'menu_list.menu_id')
        ->leftjoin('vendor','vendor.vendor_id','=', 'vendor_menues.vendor_id')
        ->select('menu_list.*','vendor.vendor_name')
        ->where('menu_list.menu_type','Snack')
        // ->whereDate('menu_date', $menusingle->menu_date)
        ->paginate(10);
             
        return view('snacks',['menu'=>$menu]);
    }
    public function add_menu(){
        return view('add_menu');
    }
    public function add_menu2(){
        $menu1 = DB::table('menu_list')
        ->where('menu_list.menu_type','=','Breakfast')
        ->get()->toArray();
        $menu2 = DB::table('menu_list')
        ->where('menu_list.menu_type','=','Dinner')
        ->get()->toArray();
        $menu3 = DB::table('menu_list')
        ->where('menu_list.menu_type','=','Lunch')
        ->get()->toArray();
        $menu4 = DB::table('menu_list')
        ->where('menu_list.menu_type','=','Snack')
        ->get()->toArray();
        return view('add_menu2', ['menuArr'=>$menu1, 'menuArrs'=>$menu2, 'menuArrss'=>$menu3, 'menusnack'=>$menu4]);
    }
    
    public function fetch_menu(Request $request){
        $menuname=$request->breakfast_id;
        $menus_id=$request->menus_id;
        // dd($menuname);
        $menus = DB::table('menu_list')
        ->where('menu_list.menu_name','=',$menuname)
       ->get();
    //    dd($menus);
        return json_encode($menus);
    }
    public function fetch_menu_data(Request $request){
        $result=array();
        $data=(array) json_decode($request->data);
        $menu_id=$request->menu_id;
        $menus_id=$request->menus_id;
        // dd($menuname);
        $menus = DB::table('menu_list')
        ->where('menu_list.menu_name','=',$menu_id)
       ->get();
        return json_encode($menus);
    }
    public function add_menulist(Request $request)
    {
        $validator = Validator::make($request->all(), [
                // 'cust_order' => 'required|unique:posts|max:255',
                'menu_name' => 'required',
                'menu_price' => 'required',
            ],
            [   
                'menu_name.required'    => 'Please Add Menu Name.',
                'menu_price.required' => 'Please Select Menu Price.',
            ]
        
        );
    if ($validator->passes()) {
    // dd($request->all());
        $menu_name=$request->menu_name;
        $menu_price=$request->menu_price;
        $menu_type=$request->menu_type;
        $menuimg='';

        $menuimg=$request->menuimg;
        
        // $menudate=$request->menudate;

        //   if(!empty($menuimg)){
            if ($request->hasfile('menuimg')) {
                // $imgName = $file->getClientOriginalName();
                $menuimg = $request->file('menuimg')->hashName();
                // $file->move('./upload/', $imgName);
                $path = $request->file('menuimg')->move('./upload/', $imgName);
                dd($menuimg);
            }
        // }
        // dd($menuimg[0]);
        $i=0;
        $menu=array();
        
        foreach ($menu_name as $mname) {
          if($mname != ''){
            $menu[]=array('menu_name' => $mname, 'menu_price' => $menu_price[$i],'menu_type' => $menu_type[$i]);

          }
            // $menu[]=array('menu_name' => $mname, 'menu_price' => $menu_price[$i],'menu_type' => $menu_type[$i],'file_upload' => $menuimg[$i],'menu_date' => $menudate);
            $i++;
        } 
        DB::table('menu_list')->insert($menu);
        $result['code']=200;
        $result['msg']="Menu added successfully.";

    }else{
        $result['code']=404;
        // $result['msg']=$validator->errors()->all();
        $result['msg']=$validator->errors()->all();
        // return response()->json(['error'=>$validator->errors()->all()]);

    }
        return json_encode($result);
    }
    public function fetchvariants(Request $request){
        $menuname=$request->breakfast_id;
        $menus = DB::table('menu_list')
        ->where('menu_list.menu_name','=',$menuname)
       ->get();
    //    dd($menus);
        return json_encode($menus);
    }
    public function fetchlunchvariants(Request $request){
        $lunchname=$request->lunch_id;
        $menuslunch = DB::table('menu_list')
        ->where('menu_list.menu_name','=',$lunchname)
       ->get();
        return json_encode($menuslunch);
    }
    public function fetchdinnervariants(Request $request){
        $dinnername=$request->dinner_id;
        $menusdinner = DB::table('menu_list')
        ->where('menu_list.menu_name','=',$dinnername)
       ->get();
        return json_encode($menusdinner);
    }

    public function fetch_menu_lunch(Request $request){
        $lunchname=$request->lunch_id;
        $menu_lunch = DB::table('menu_list')
        ->where('menu_list.menu_name','=',$lunchname)
       ->get();
        return json_encode($menu_lunch);
    }
    public function fetch_menu_dinner(Request $request){
        $dinnername=$request->dinner_id;
        $menu_dinner = DB::table('menu_list')
        ->where('menu_list.menu_name','=',$dinnername)
       ->get();
        return json_encode($menu_dinner);
    }
    public function edit_menus(Request $request){
        // dd($request->all());
        $menuedit= DB::table('menu_list')
        ->where('menu_id','=',$request->menu_id)
        ->get();
          return view('edit_menu', ['menu_list'=>$menuedit]);
  
          
    }
    public function destroy_menu(Request $request)
    { //dd($request->all());
        Menu::where('menu_date',$request->menu_date)->delete();
        $data=array();
        $data['code']="200";
        $data['msg']="Menu deleted successfully!";

      return json_encode($data);
    }

    public function storemenu(Request $request)
    { 
       dd($request->all());
        $file = $request->file('fileupload');
        print_r(WRITEPATH);
        $imgName='';
        if(!empty($file)){
           if ($request->hasfile('fileupload')) {
            // $imgName = $file->getClientOriginalName();
            $imgName = $request->file('fileupload')->hashName();
            // $file->move('./upload/', $imgName);
            $path = $request->file('fileupload')->move('./upload/', $imgName);
            dd($imgName);
           }
        }

          $res= array();
          $res['menu_name']=$request->input('menuname');
               $res['menu_type']=$request->input('menuselect');
               $res['menu_date']=$request->input('menudate');
               $res['menu_price']=$request->input('menuprice');
               $res['file_upload']=$imgName;
          
           
               Menu::insert($res);
       
        $data=array();
        $data['code']="200";
        $data['msg']="Menu record added successfully!";
        return json_encode($data);
    
       
    }
    public function update_menu(Request $request){
    //    dd($request->all());
            $file = $request->file('menu_image');
            // dd($file);
            $menuid = $request->input('menu_id');
                $res= array();

            $imgName='';
            if(!empty($file)){
               if ($request->hasfile('menu_image')) {
                    // $imgName = $file->getClientOriginalName();
                    $imgName = $request->file('menu_image')->getClientOriginalName();
                    // $file->move('./upload/', $imgName);
                    $path = $request->file('menu_image')->move('./upload/', $imgName);
                    $res['file_upload']=$request->file('menu_image')->getClientOriginalName();
    
               }
                //    $title_image = "";
                //    if ($request->hasFile('title_image')) {
                //        $title_image = $request->file('title_image')->hashName();
                //        $path = $request->file('title_image')->move('images/storie',  $title_image);
                //    }
            }
            

            $res['menu_name']=$request->input('menu_name');
            // $res['menu_type']=$request->input('menuselect');
            // $res['menu_date']=$request->input('menudate');
            $res['menu_price']=$request->input('menu_price');
        
           
            Menu::where('menu_id', $menuid)->update($res);   
            $code="200";
            $msg="Menu Updated successfully.";
        
        //   }
        // $data=array();
        // $data['code']=$code;
        // $data['msg']=$msg;
        // echo json_encode($data);
        return redirect("menu2");
    }
    public function update_breakfast(Request $request)
    {
   
            $file = $request->file('menu_image');
            $menuid = $request->input('menu_id');
            $res= array();

            $imgName='';
            if(!empty($file)){
               if ($request->hasfile('menu_image')) {
                    // $imgName = $file->getClientOriginalName();
                    $imgName = $request->file('menu_image')->getClientOriginalName();
                    // $file->move('./upload/', $imgName);
                    $path = $request->file('menu_image')->move('./upload/', $imgName);
                    $res['file_upload']=$request->file('menu_image')->getClientOriginalName();
    
               }
              
            }
            

            $res['menu_name']=$request->input('menu_name');
            $res['menu_price']=$request->input('menu_price');
           
            Menu::where('menu_id', $menuid)->update($res);   
            $code="200";
            $msg="Menu Updated successfully.";
        
       
        return redirect("breakfast");
    }
    public function update_lunch(Request $request)
    {
   
            $file = $request->file('menu_image');
            $menuid = $request->input('menu_id');
            $res= array();

            $imgName='';
            if(!empty($file)){
               if ($request->hasfile('menu_image')) {
                    // $imgName = $file->getClientOriginalName();
                    $imgName = $request->file('menu_image')->getClientOriginalName();
                    // $file->move('./upload/', $imgName);
                    $path = $request->file('menu_image')->move('./upload/', $imgName);
                    $res['file_upload']=$request->file('menu_image')->getClientOriginalName();
    
               }
              
            }
            

            $res['menu_name']=$request->input('menu_name');
            $res['menu_price']=$request->input('menu_price');
           
            Menu::where('menu_id', $menuid)->update($res);   
            $code="200";
            $msg="Menu Updated successfully.";
        
       
        return redirect("lunch");
    }
    public function update_dinner(Request $request)
    {
   
            $file = $request->file('menu_image');
            $menuid = $request->input('menu_id');
            $res= array();

            $imgName='';
            if(!empty($file)){
               if ($request->hasfile('menu_image')) {
                    // $imgName = $file->getClientOriginalName();
                    $imgName = $request->file('menu_image')->getClientOriginalName();
                    // $file->move('./upload/', $imgName);
                    $path = $request->file('menu_image')->move('./upload/', $imgName);
                    $res['file_upload']=$request->file('menu_image')->getClientOriginalName();
    
               }
              
            }
            

            $res['menu_name']=$request->input('menu_name');
            $res['menu_price']=$request->input('menu_price');
           
            Menu::where('menu_id', $menuid)->update($res);   
            $code="200";
            $msg="Menu Updated successfully.";
        
       
        return redirect("dinner");
    }
    public function update_snacks(Request $request)
    {
   
            $file = $request->file('menu_image');
            $menuid = $request->input('menu_id');
            $res= array();

            $imgName='';
            if(!empty($file)){
               if ($request->hasfile('menu_image')) {
                    // $imgName = $file->getClientOriginalName();
                    $imgName = $request->file('menu_image')->getClientOriginalName();
                    // $file->move('./upload/', $imgName);
                    $path = $request->file('menu_image')->move('./upload/', $imgName);
                    $res['file_upload']=$request->file('menu_image')->getClientOriginalName();
    
               }
              
            }
            

            $res['menu_name']=$request->input('menu_name');
            $res['menu_price']=$request->input('menu_price');
           
            Menu::where('menu_id', $menuid)->update($res);   
            $code="200";
            $msg="Menu Updated successfully.";
        
       
        return redirect("snacks");
    }
    public function change_status(Request $request){
        $menuid = $request->input('menue_id');
        $menue_status = $request->input('menu_status');
        
        $res= array();
        if($menue_status == 1){
            $res['status'] = 0;

        }else{
            $res['status'] = 1;

        }
        //    dd($res);
       $menu = Menu::where('menu_id', $menuid)->update($res); 
        if($menu){
            $code="200";
            $msg="Menu Updated successfully.";
        }else{
            $code="404";
            $msg="Not updated.".error();
        }
       
        $data=array();
        $data['code']=$code;
        $data['msg']=$msg;
        echo json_encode($data);
    }
}
