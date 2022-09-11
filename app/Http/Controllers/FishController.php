<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\fish ;
use Illuminate\Database\Eloquent\SoftDeletes\fish as SoftDeletesFish;
use Illuminate\Support\Facades\DB;

class fishController extends Controller

{
    //สร้างหน้าแรกปลา
    public function index(){
        $Fish = fish::paginate(5);
        return view('admin.fish.fish',compact('Fish'));

        
    }
    //สร้างหน้าเพิ่มข้อมูลปลา
    public function create( ){
        return view('admin.fish.addfish');
    }
        
    
    public function store( Request $request ){
        //ตรวจสอบข้อมูล
        $request->validate([
            'name'=>'required:fish',
            'species'=>'required|unique:fish',
            'picture'=>'required|mimes:jpg,jpeg,png',
            'fish_appearance'=>'required:fish',

        ],
        [
            'name.required'=>"กรุณาป้อนชื่อปลา",
            'species.required'=>"กรุณาป้อนพันธุ์ปลา",
            'picture.required'=>"กรุณาใส่รูปปลา",
            'fish_appearance.required'=>"กรุณาป้อนลักษณะปลา"
        ]);
        //การเข้ารหัสรูปภาพ
        $picture = $request->file('picture');

        //Generate ชื่อภาพ
        $name_gen=hexdec(uniqid());

         // ดึงนามสกุลไฟล์ภาพ
         $img_ext = strtolower($picture->getClientOriginalExtension());
         $img_name = $name_gen.'.'.$img_ext;
         
        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'image/fish/';
        $full_path = $upload_location.$img_name;

      //เพิ่มข้อมูลเข้าปลา database
        fish::insert([
       'name' => $request->name,    
       'species' => $request->species,
        'picture' => $full_path,
        'fish_appearance'=> $request->fish_appearance
    ]);
    $picture->move($upload_location,$img_name);
    return redirect()->route('fish')->with('success',"บันทึกข้อมูลปลาเรียบร้อย");

   
        
    }
    //เข้าไปหน้าแก้ไข
   
    public function edit($fish_id){
        $fish = fish::find($fish_id);
        return view('admin.fish.editfish',compact('fish'));

    }
    //ฟังก์ชันการแก้ไขข้อมูล
    public function update(Request $request , $fish_id){
        //ตรวจสอบข้อมูล
        $request->validate([
            'name'=>'required:fish',
           
           
           

        ],
        [
            
        ]);
     
        $image = $request->file('picture');
        //อัพเดตภาพและชื่อ
        if( $image){

            //Generate ชื่อภาพ
            $name_gen=hexdec(uniqid());
             // ดึงนามสกุลไฟล์ภาพ
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
        
        
            //อัพโหลดและอัพเดตข้อมูล
            $upload_location = 'image/fish/';
            $full_path = $upload_location.$img_name;

            
            //อัพเดตข้อมูล
            fish::find($fish_id)->update([
                'name' => $request->name,    
                'species' => $request->species,
                 'picture' => $full_path,
                 'fish_appearance'=> $request->fish_appearance
                
            ]);

            //ลบภาพเก่าและอัพภาพใหม่แทนที่
            $old_image = $request->old_image;
            unlink($old_image);
            $image->move($upload_location,$img_name);

            return redirect()->route('fish')->with('success',"อัพเดตข้อมูลปลาเรียบร้อย");

        }else{
            //อัพเดตข้อมูลอย่างเดียว
            fish::find($fish_id)->update([
                'name' => $request->name,    
                'species' => $request->species,
                 'fish_appearance'=> $request->fish_appearance
            ]);
            return redirect()->route('fish')->with('success',"อัพเดตข้อมูลปลาเรียบร้อย");
        }
        
    }



   //ฟังก์ชันการลบข้อมูล
    public function destroy($fish_id){
        // ลบภาพ
        $img = fish::find($fish_id)->picture;
        unlink($img);
        
  

        //ลบข้อมูลจากฐานข้อมูล
        $delete=fish::find($fish_id)->delete();
        // fish::where('fish_id', '=', $fish_id)->delete();
       
         return redirect()->back()->with('success',"ลบข้อมูลเรียบร้อย");
}

}
