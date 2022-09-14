<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $Sp = supplier::paginate(5);
        return view('admin.supplier.index',compact('Sp'));
        
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.supplier.addSupplier');
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
            'name'=>'required:supplier',
            'Address'=>'required:supplier',
            'Email'=>'required:supplier',
            'tell'=>'required:supplier',

            

        ],
        [
            'name.required'=>"กรุณาป้อนชื่อซัพพลายเออร์",
            'Address.required'=>"กรุณาป้อนที่อยู่",
            'Email.required'=>"กรุณาป้อนอีเมล",
            'picture.required'=>"กรุณาใส่รูป",
            'tell.required'=>"กรุณาป้อนเบอร์โทรศัพท์"
        ]);
        //การเข้ารหัสรูปภาพ
        $picture = $request->file('picture');

        //Generate ชื่อภาพ
        $name_gen=hexdec(uniqid());

         // ดึงนามสกุลไฟล์ภาพ
         $img_ext = strtolower($picture->getClientOriginalExtension());
         $img_name = $name_gen.'.'.$img_ext;
         
        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'image/supplier/';
        $full_path = $upload_location.$img_name;

      //เพิ่มข้อมูลเข้าปลา database
        supplier::insert([

        'picture' => $full_path,
        'name' => $request->name,    
        'Address' => $request->Address,
        'Email'=> $request->Email,
        'tell'=> $request->tell
    ]);
    $picture->move($upload_location,$img_name);
    return redirect()->route('supplier')->with('success',"บันทึกข้อมูลซัพพลายเออร์เรียบร้อย");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit( $supplier_id)
    {
        //
        $Sp = supplier::find($supplier_id);
        return view('admin.supplier.editSupplier',compact('Sp'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $supplier_id)
    {
        //
        $request->validate([
            // 'name'=>'required:',
            // 'Address'=>'required',
            // 'Email'=>'required',
            // 'tell'=>'required',
         
        ]
        );
        $image = $request->file('picture');
        //อัพเดตภาพและชื่อ
        if( $image){

            //Generate ชื่อภาพ
            $name_gen=hexdec(uniqid());
             // ดึงนามสกุลไฟล์ภาพ
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
        
        
            //อัพโหลดและอัพเดตข้อมูล
            $upload_location = 'image/supplier/';
            $full_path = $upload_location.$img_name;

            
            //อัพเดตข้อมูล
            supplier::find($supplier_id)->update([

                 'picture'=> $full_path, 
                 'name'=> $request->name, 
                 'Address'=> $request->Address, 
                 'Email'=> $request->Email, 
                 'tell'=> $request->tell, 
                  
            ]);

            //ลบภาพเก่าและอัพภาพใหม่แทนที่
            $old_image = $request->old_image;
            unlink($old_image);
            $image->move($upload_location,$img_name);

            return redirect()->route('supplier')->with('success',"อัพเดตข้อมูลซัพพลายเออร์เรียบร้อย");

        }else{
            //อัพเดตข้อมูลอย่างเดียว
            supplier::find($supplier_id)->update([
                'name'=> $request->name, 
                'Address'=> $request->Address, 
                'Email'=> $request->Email, 
                'tell'=> $request->tell, 
            ]);
            return redirect()->route('supplier')->with('success',"อัพเดตข้อมูลซัพพลายเออร์เรียบร้อย");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy( $supplier_id)
    {
        //
        $img = supplier::find($supplier_id)->picture;
        unlink($img);
        
  

        //ลบข้อมูลจากฐานข้อมูล
        $delete=supplier::find($supplier_id)->delete();
         return redirect()->back()->with('success',"ลบข้อมูลซัพพลายเออร์เรียบร้อย");
    }
}
