<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\course;
use App\Models\images;
use App\Models\material;
use App\Models\transaction;
use App\Models\wallet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Decimal;

use function PHPUnit\Framework\isEmpty;

class courseController extends Controller
{
    public function addcourse(Request $request){
        $request->merge(['user_id'=> Auth::user()->id]);
        $course = $request->validate([
            'name'=> 'required',
            'field'=>'required',
            'desc'=> 'required',
            'startdate' =>'required',
            'enddate'=> 'required',
            'location'=> 'required',
            'price'=>'required',
            'user_id'=>'required',
        
        ]);

        try{
           $newCourse =  course::create($course);
            if($request->file('images')){
                foreach($request->file('images') as $img){
                    $img_name= time().rand(1,99).'.'.$img->extension();
                    $img->move(public_path('images'), $img_name);
                    images::create([
                        'course_id'=> $newCourse->id,
                        'name'=>$img_name
                    ]);
                }
            }
            return redirect('/');

        }catch(Exception $err){
            dd($err);
        }
    }

    public function getCourses(){
       $courses = course::all();

        return view('courses', compact('courses'));
    }

    public function buycourse(String $id, float $price){
        $course = course::find($id);
        $wallet = wallet::find(Auth::user()->wallet->user_id);
        $bookings = booking::all()->where('user_id', "=",Auth::user()->id)->where('course_id', "=", $course->id);
        if($bookings->count() == 0 && $course->user_id != Auth::user()->id){
            if($wallet->amount > $price){

                
                $wallet->amount -= $price;
                $wallet->save();
                booking::create([
                    'user_id'=>Auth::user()->id,
                    'course_id'=>$course->id,
                    'name'=>$course->name,
                    'startdate'=>$course->startdate,
                    'enddate'=>$course->enddate,
                    'status'=>'Pending'
                ]);

                transaction::create([
                    'wallet_id'=>Auth::user()->wallet->id,
                    'status'=>'success',
                    'description'=>$course->name.' has been bought',
                    'amount'=>$course->price,
                ]);
                return redirect("/");
            }else{
                transaction::create([
                    'wallet_id'=>Auth::user()->wallet->id,
                    'status'=>'failed',
                    'description'=>$course->name.' has been bought',
                    'amount'=>$course->price,
                ]);
                return back()->withErrors(['message'=>'no funds']);
            }
        }else{
            return back()->withErrors(['message'=>'Course already rolled']);
        }
    }

    public function preview(String $id){
        $course = course::find($id);
        return view('prevcourse', compact('course'));
    }

    public function editpreview(String $id){
        $course = course::find($id);
        return view('editcourse', compact('course'));
    }

    public function deleteimg(String $id){
        $image = images::find($id);
        unlink(public_path('images\\'.$image->name));
        $image->delete();
        return back();
    }

    public function editcourse(Request $request, String $id){
       $updatecourse = course::find($id);
        $course = $request->validate([
            'name'=> 'required',
            'field'=>'required',
            'desc'=> 'required',
            'location'=> 'required',
            'price'=>'required',
        ]);

        try{
            $updatecourse->update($request->all());
             if($request->file('images')){
                 foreach($request->file('images') as $img){
                     $img_name= time().rand(1,99).'.'.$img->extension();
                     $img->move(public_path('images'), $img_name);
                     images::create([
                         'course_id'=> $updatecourse->id,
                         'name'=>$img_name
                     ]);
                 }
             }
             return back();
 
         }catch(Exception $err){
             dd($err);
         }
    }

    public function mycourses(){
        $bookings = booking::all()->where('user_id', '=', Auth::user()->id);
        $courses = course::where('user_id', '=', Auth::user()->id)->get();
        return view('mycourses', compact('courses', 'bookings'));
    }

    public function uploadfiles(Request $request, String $id){

        $file = $request->validate([
            'name'=>'required',
        ]);

        try {
                $file_name = $request->name.time().rand(1,99).'.'.$request->file->extension();
                $request->file->move(public_path('files'),$file_name);
                material::create([
                    'name'=>$file_name,
                    'type'=>$request->type,
                    'course_id'=>$id
                ]);

                return back()->with('success', 'file has been uploaded');
        } catch (\Throwable $th) {
       
            return back()->with('error', 'file could not been uploaded');
        }
    }

    public function download(String $name){
        return response()->download(public_path('files/'.$name));
    }
}
