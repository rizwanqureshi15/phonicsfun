<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Course;
// use App\Models\Category;
use App\Models\Document;
use Storage;
use Auth;

class DocumentController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        
    }

    public function index()
    {
        $user = Auth::guard('web')->user();
		
		if($user->hasRole('parent')){
            return redirect('/dashboard');
        }


        $documents = Document::with('lesson')
                        ->whereHas('lesson', function($q)use($user){
                            $q->where('teacher_id', $user->id);
                        })
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('users.documents', compact('documents'));
    }


     public function store(Request $request){
        
        $rules = [
            'name' => 'required',
            'lesson_id' => 'required',
        ];

        $request->validate($rules);
        $data = $request->all();

        $image = $request->name;
        $filename  = time().rand(0,9999999).'.'.$image->getClientOriginalExtension();  
        $filePath = 'documents' . DIRECTORY_SEPARATOR . $request->lesson_id .DIRECTORY_SEPARATOR .$filename;
        Storage::disk('public')->put($filePath, file_get_contents($image));

        $data['name'] = $filename;

        $user = Auth::guard('web')->user();
        $data['teacher_id'] = $user->id;
        
        $document = Document::create($data);

        return back()->with('success', 'Document uploaded successfully');
    }


    public function destroy($id) {
    	$user = Auth::guard('web')->user();
        $document = Document::where('id', $id)->where('teacher_id', $user->id)->first();
        
        if ($document) {
            //delete 
            $oldImagePath = 'documents' . DIRECTORY_SEPARATOR . $document->lesson_id . DIRECTORY_SEPARATOR. $document->getRawOriginal('name');
            if(Storage::disk('public')->exists($oldImagePath)){
                Storage::disk('public')->delete($oldImagePath);
            } 
            $document->delete();

            return back()->with('success', 'Document deleted successfully!');
            
        } else {
            return back()->with('error', 'No data found!');
        }
    }

}