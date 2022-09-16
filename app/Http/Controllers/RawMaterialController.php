<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $RM = RawMaterial::paginate(5);
        return view('admin.rawmaterial.index',compact('RM'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.rawmaterial.addRawMaterial');
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
        $request->validate([
            'picture'=>'required|mimes:jpg,jpeg,png',
            'Raw_Material_name'=>'required:RawMaterial',
            'details'=>'required:RawMaterial',
            
         

        ],
        [
            'Raw_Material_name.required'=>"กรุณาป้อนชื่อวัตถุดิบ",
            'details.required'=>"กรุณาป้อนรายละเอียด",
            'picture.required'=>"กรุณาใส่รูปวัตถุดิบ",
            
        ]);
        //การเข้ารหัสรูปภาพ
        $picture = $request->file('picture');

        //Generate ชื่อภาพ
        $name_gen=hexdec(uniqid());

         // ดึงนามสกุลไฟล์ภาพ
         $img_ext = strtolower($picture->getClientOriginalExtension());
         $img_name = $name_gen.'.'.$img_ext;
         
        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'image/RawMaterial/';
        $full_path = $upload_location.$img_name;

      //เพิ่มข้อมูลเข้าปลา database
        RawMaterial::insert([
       'Raw_Material_name' => $request->Raw_Material_name,    
       'details' => $request->details,
        'picture' => $full_path,
        
    ]);
    $picture->move($upload_location,$img_name);
    return redirect()->route('rawMaterial')->with('success',"บันทึกข้อมูลวัตถุดิบเรียบร้อย");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(RawMaterial $rawMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $RM = RawMaterial::find($id);
        return view('admin.rawmaterial.editRawMaterial',compact('RM'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'Raw_Material_name'=>'required:RawMaterial',
            //'details'=>'required:RawMaterial',
           
           
           
           

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
            $upload_location = 'image/RawMaterial/';
            $full_path = $upload_location.$img_name;

            
            //อัพเดตข้อมูล
            RawMaterial::find($id)->update([
                'Raw_Material_name' => $request->Raw_Material_name,    
                'details' => $request->details,
                 'picture' => $full_path,
                 
                
                
            ]);

            //ลบภาพเก่าและอัพภาพใหม่แทนที่
            $old_image = $request->old_image;
            unlink($old_image);
            $image->move($upload_location,$img_name);

            return redirect()->route('rawMaterial')->with('success',"อัพเดตข้อมูลวัตถุดิบเรียบร้อย");

        }else{
            //อัพเดตข้อมูลอย่างเดียว
            RawMaterial::find($id)->update([
                'Raw_Material_name' => $request->Raw_Material_name,    
                'details' => $request->details,
            ]);
            return redirect()->route('rawMaterial')->with('success',"อัพเดตข้อมูลวัตถุดิบเรียบร้อย");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $img = RawMaterial::find($id)->picture;
        unlink($img);
        
  

        //ลบข้อมูลจากฐานข้อมูล
        $delete=RawMaterial::find($id)->delete();
        
       
         return redirect()->back()->with('success',"ลบข้อมูลเรียบร้อย");
    }
}
