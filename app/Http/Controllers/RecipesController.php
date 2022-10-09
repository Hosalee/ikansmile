<?php

namespace App\Http\Controllers;
use App\Models\DetailsRecipe;
use App\Models\RawMaterial;
use App\Models\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Recipes =Recipes::all();
        $i=1;
        return view('admin.recipes.index',compact('Recipes','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $RM =RawMaterial::all();
        return view('admin.recipes.addRecipes',compact('RM'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|:Recipes',
            'explain'=>'required|:Recipes',
        ],[
            'name.required'=>"กรุณาป้อนชื่อสูตรอาหาร",
            'explain.required'=>"กรุณาป้อนรายละเอียด",
            
        ]);
        
        //
        
        $name=$request->name;
        $R_id2 = DB::table('recipes')->where('Recipes_name', $name)->value('Recipes_id');
        $namedb=DB::table('recipes')->where('Recipes_id', $R_id2)->value('Recipes_name');
        if($namedb != $name){
            $Recipes = new Recipes();
            $Recipes -> Recipes_name = $request->name; 
            $Recipes -> explain = $request->explain; 
            $Recipes -> save();
            $R_id = DB::table('recipes')->where('Recipes_name', $name)->value('Recipes_id');
            // $Salary = DB::table('salaries')->join('employees','salaries.emp_id','employees.emp_id')
            // ->select('salaries.*','employees.emp_fristname','employees.emp_lastname','employees.profile')->orderBy('date','DESC')->paginate(5);
    
            $P = count($request->RM_id);
            for($i=0;$i<$P;$i++){
                $Recipes = new DetailsRecipe();
                $Recipes -> Recipes_id = $R_id; 
                $Recipes -> Raw_Material_id = $request->RM_id[$i]; 
                $Recipes -> Quantity = $request->Quantity[$i];
                $Recipes -> save();
            }

            return redirect()->route('Recipes')->with('success',"บันทึกข้อมูลสูตรอาหารเรียบร้อย");;
        }else{
            return redirect()->route('addRecipes')->with('Error',"ชื่อสูตรมีอยู่แล้ว");

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        
         $recipes = DB::table('recipes')->join('details_recipes','recipes.Recipes_id','details_recipes.Recipes_id')
         ->join('raw_materials','raw_materials.Raw_Material_id','details_recipes.Raw_Material_id')->where('details_recipes.Recipes_id',$id )
         ->select('recipes.Recipes_name','recipes.explain','details_recipes.*','raw_materials.Raw_Material_name')
         ->get();
        
         
        // dd( $import);
        // dd( $recipes1 );
        $i=1;
        return view('admin.recipes.showRecipes',compact('recipes','i'));


        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipes $recipes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipes $recipes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipes $recipes)
    {
        //
    }
}
