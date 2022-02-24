<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Owners;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {

        $owners = Owners::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.owners.index',compact('owners'));
    }


    public function create()
    {
        return view('dashboard.owners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'  => 'required|unique:owners,email|email',
            'name'   => 'required',
            'mobile' => 'required',
            'age'   => 'required|numeric|min:16',
            'image'   => 'required|image',
            'id_image'   => 'required|image',
            'password' => 'required|confirmed|min:6',
        ]);

//        try{

            $data = $request->except('_token');

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }


            if ($request->has('image')) {
                $request->image->store('/', 'public');
                $file = $request->image->hashName();
                $data['image']  = $file;
            }

            if ($request->has('id_image')) {
                $request->id_image->store('/', 'public');
                $file = $request->id_image->hashName();
                $data['id_image']  = $file;
            }
            
             Owners::create($data);

            session()->flash('success', 'Owner added successfully');

            return redirect()->route('owner.index');

//        }catch(\Exception $e){
//            return redirect()->back()->with(['error'=>'there is problem please try again']);
//        }

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $colleges = College::get();
        if($student){
            return view('dashboard.students.edit', compact('student','colleges'));
        }else{
            return redirect()->back()->with(['error'=>'this student is not found']);
        }

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:students,email,'.$id,
            'name' => 'required',
            'college_id' =>'required|exists:colleges,id',
            'password' => 'sometimes|confirmed',
        ]);
        try{

            $student =  Student::find($request->id);

            $data = $request->except('_token');

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }else{
                $data['password'] = $student->password;
            }

            $student->update($data);

            session()->flash('success', 'Student Updated successfully');

            return redirect()->route('student.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }


    public function destroy($id)
    {
        try{
            $student =  Student::find($id);

            if(!$student)
            {
                return redirect()->back()->with(['error'=>'student not found']);
            }

            $student->delete();

            session()->flash('success', 'Student deleted successfully');

            return redirect()->route('student.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }
}
