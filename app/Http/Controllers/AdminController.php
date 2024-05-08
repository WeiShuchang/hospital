<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function addview(){
        if(Auth::id()){
            if(Auth::User()->usertype==1){
                return view('admin.add_doctor');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
        
    }
    public function upload(Request $request){
        $doctor = new Doctor;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Successfully');
    }
    public function showappointment(){
        if(Auth::id()){
            if(Auth::User()->usertype==1){
                $data = Appointment::orderBy('id', 'DESC')->paginate(4);
                return view('admin.showappointment',compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
        
    }
    public function approved($id){
        $data= Appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }
    public function canceled($id){

        $data= Appointment::find($id);
        $data->status='Canceled';
        $data->save();
        return redirect()->back();
    }
    public function showdoctor(){
        $data=Doctor::paginate(4);
        return view('admin.showdoctor',compact('data'));
    }

    public function updatedoctor($id){
        $data = Doctor::find($id);

        return view('admin.update_doctor',compact('data'));
    }
    public function editdoctor(Request $request, $id){
        $doctor= Doctor::find($id);
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $image=$request->file;

        if($image){

            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorimage',$imagename);
            $doctor->image=$imagename;
        }

        $doctor->save();
        return redirect()->back()->with('message','Doctor Details Updated Successfully');
        
    }
    public function emailview($id){
        $data=Appointment::find($id);
        return view('admin.email_view',compact('data'));
    }
    public function sendemail(Request $request, $id){
        $data=Appointment::find($id);
        $details=[
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart

        ];
        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back()->with('message','Email send is Successful');
    }


        public function deletedoctor($id)
        {

        $data=Doctor::find($id);

        $image_path = public_path('doctorimage/'.$data->image);

        if(file_exists($image_path))
        {

            unlink($image_path);
        }



        $data->delete();

        return redirect()->back()->with('message','Doctor Data Deleted Successfully');



    }

    public function searchAppointments(Request $request)
{
    $query = $request->input('query');

    // Perform search and paginate the results
    $data = Appointment::where('name', 'like', '%' . $query . '%')
        ->orWhere('email', 'like', '%' . $query . '%')
        ->orWhere('phone', 'like', '%' . $query . '%')
        ->orWhere('doctor', 'like', '%' . $query . '%')
        ->orWhere('date', 'like', '%' . $query . '%')
        ->orWhere('message', 'like', '%' . $query . '%')
        ->orWhere('status', 'like', '%' . $query . '%')
        ->orderBy('id', 'DESC')
        ->paginate(4);

    return view('admin.showappointment', compact('data', 'query'));
}

    public function searchDoctors(Request $request)
    {
        $query = $request->input('query');

    $data = Doctor::where('name', 'like', '%' . $query . '%')
        ->orWhere('phone', 'like', '%' . $query . '%')
        ->orWhere('speciality', 'like', '%' . $query . '%')
        ->orWhere('room', 'like', '%' . $query . '%')
        ->orderBy('id', 'DESC')
        ->paginate(4);

    return view('admin.showdoctor', compact('data', 'query'));
    }
}

