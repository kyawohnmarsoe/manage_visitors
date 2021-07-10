<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function index(){
        $units = Unit::orderBy('block_no')->paginate(10);
       return view('units.index',['units'=>$units]);
   }
    public function create(){
        return view('units.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'block_no' => 'required|max:255',
            'unit_no' => 'required|max:255',
            'occupant_name' => 'required|max:255',
            'contact_no' => 'required|max:255',
        ]);
        Unit::create([
            'block_no' => $request->block_no,
            'unit_no' => $request->unit_no,
            'occupant_name' => $request->occupant_name,
            'contact_no' => $request->contact_no,
        ]);
        return redirect()->route('units')->with('msg','New unit has sucessfully created!');
       
    }
    public function show($id){
        $unit = Unit::findOrFail($id);
        return view('units.show',['unit'=>$unit]);
    }

    public function update(Request $request,$id){
         $this->validate($request,[
            'block_no' => 'required|max:255',
            'unit_no' => 'required|max:255',
            'occupant_name' => 'required|max:255',
            'contact_no' => 'required|max:255',
        ]);
        $unit = Unit::findOrFail($id);
        if(isset($unit->current_visitors)){
            return redirect()->back()->with('err','Please make sure to exit visitors in unit');
        }
        $unit->update([
            'block_no' => $request->block_no,
            'unit_no' => $request->unit_no,
            'occupant_name' => $request->occupant_name,
            'contact_no' => $request->contact_no,
        ]);
        return redirect()->route('units')->with('msg','The unit has sucessfully updated!');
    }

    public function destroy($id){
        $unit = Unit::findOrFail($id);
        if(isset($unit->current_visitors)){
            return back()->with('err','Please make sure to exit visitors in unit');
        }
        $unit->delete();
        return redirect()->route('units')->with('msg','Unit has been deleted!');
    }
}
