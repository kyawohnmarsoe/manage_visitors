<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;
use App\Unit;


class VisitorController extends Controller
{

    public function index(){
       
        $visitors = Visitor::latest()->paginate(10);
        // dd($visitors);
       return view('visitors.index',['visitors'=>$visitors]);
   }
    public function create(){
        return view('visitors.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'visitor_name' => 'required|max:255',
            'contact_no' => 'required',
            'block_no' => 'required',
            'unit_no' => 'required',
            'nric_no' => 'required',
        ]);

        // check if there is a unit 
        $unit = Unit::where('block_no',$request->block_no)->where('unit_no',$request->unit_no)->get();
        if(!count($unit)){
            return back()->with('err','No Unit Found!');
        }

        // Check visitor limits at unit
        $current_visitors = $unit[0]->current_visitors;
       
        if ($current_visitors == Null || count($current_visitors) < 8)
        {
            
            $entry_at = date("H:i");
            $new_visitor = Visitor::create([
                            'visitor_name' => $request->visitor_name,
                            'contact_no' => $request->contact_no,
                            'block_no' => $request->block_no,
                            'unit_no' => $request->unit_no,
                            'nric_no' => $request->nric_no,
                            'entry_at' => $entry_at,
                        ]);
                
                if ($current_visitors == Null){
                    $current_visitors = [];
                }
                
                array_push($current_visitors,$new_visitor);
              
                $unit_to_update = Unit::findOrFail($unit[0]->id);
             
                $unit_to_update->update([ "current_visitors"=>$current_visitors]);
               
            return back()->with('msg','Visitor Registration Success!');
        }else{
            return back()->with('err','Sorry, This Unit is already fulled!');
        }
        
    }

    public function show($id){
        $visitor = Visitor::findOrFail($id);
       
        return view('visitors.show',['visitor'=>$visitor]);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'visitor_name' => 'required|max:255',
            'contact_no' => 'required',
            'block_no' => 'required',
            'unit_no' => 'required',
            'nric_no' => 'required',
        ]);
        // check if there is a unit 
        $unit = Unit::where('block_no',$request->block_no)->where('unit_no',$request->unit_no)->get();
        if(!count($unit)){
            return back()->with('err','No Unit Found!');
        }
        // Check visitor already exit
        $visitor = Visitor::findOrFail($id);
           
            if($visitor->exit_at ==Null && $visitor->block_no != $request->block_no || $visitor->unit_no != $request->unit_no){
                return back()->with('err','Can not be changed unit before visitor exit');
            }

            $visitor->update([
                'visitor_name' => $request->visitor_name,
                'contact_no' => $request->contact_no,
                'block_no' => $request->block_no,
                'unit_no' => $request->unit_no,
                'nric_no' => $request->nric_no,
                'entry_at' => $request->entry_at,
                'exit_at' => $request->exit_at,
            ]);
            return redirect()->route('visitors')->with('msg','Visitor\'s Information has sucessfully updated!');

            

    }
    public function exit($id){
        $visitor = Visitor::findOrFail($id);
        $exit_at = date("H:i");
        $visitor->update([ "exit_at"=>$exit_at]);
        // return $visitor->block_no;
        $unit = Unit::where('block_no',$visitor->block_no)->where('unit_no',$visitor->unit_no)->first();
       
        $current_visitors = $unit->current_visitors;
        // return $current_visitors;
        $new_current_visitors=[];
        foreach ($current_visitors as $visitor) {
            if($visitor['id'] == $id) {
               continue;
            }else{
                array_push($new_current_visitors,$visitor);
            }
        }
        
        $unit_to_update = Unit::findOrFail($unit->id);
        if (count($new_current_visitors)==0){
            $unit_to_update->update([ "current_visitors"=>Null]);
        }else{
            $unit_to_update->update([ "current_visitors"=>$new_current_visitors]);
        }
       
        return back()->with('msg','Visitor Exits');
    }

    public function destroy($id){
        // dd($id);
        $visitor = Visitor::findOrFail($id);
        // dd ($visitor->exit_at);
        if ($visitor->exit_at ==Null){
            return back()->with('err','Please make sure if visitor exited.');
        }
        $visitor->delete();
        return redirect()->route('visitors')->with('msg','Visitor\'s Record has deleted!');
    }
    public function detail($name,$nric){
        $visitors = Visitor::where('visitor_name',$name)->where('nric_no',$nric)->paginate(10);
        // dd($data);
        return view('visitors.detail',['visitors'=>$visitors]);
    }

}
