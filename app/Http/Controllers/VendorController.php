<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendorapplicant;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function show(){
        return view('vendor.vendorregister');
    }

    public function addvendorapplicant(Request $request){
            $data = $request->validate([            
            'vendor_name' => 'required',
            'vendor_email' => 'required',
            'vendor_password' => 'required',
            'vendor_address' => 'required',
            'vendor_type' => 'required',
            'vendor_contact' => 'required',
            'vendor_description' => 'required',
        
            ]);
    
            if ($request->hasFile('vendor_image')) {
            $data['vendor_image'] = $request->file('vendor_image')->store('Vendor', 'public');
            }
    
            if ($request->hasFile('vendor_certification')) {
                $data['vendor_certification'] = $request->file('vendor_certification')->store('Vendor', 'public');
                }
            
    
          
                
            Vendorapplicant::create($data);
    
            return redirect('/')->with('message', 'Application submitted successfully');
        }

        public function showvendors(){

            $applicants=Vendorapplicant::all();
            return view('admin.displayvendorapplicants',compact('applicants'));

        }
         //accept vendor
        public function acceptvendor($applicant){
            $data= Vendorapplicant::where('id', $applicant)->first();
            
            $user = User::create([
                'password' =>$data->vendor_password,
                'email'=> $data->vendor_email,
                'name' => $data->vendor_name,
                'role' => 'vendor',
            ]);
            

            $load= User::where('name', $data->vendor_name)->first();
            

            $vendoraccepted = Vendor::create([
                'vendoraccepted_id' => $load->id,
                'vendoraccepted_name' => $data->vendor_name,
                'vendoraccepted_type' => $data->vendor_type,
                'vendoraccepted_contact' => $data->vendor_contact,
                'vendoraccepted_address' => $data->vendor_address,
                'vendoraccepted_description' =>$data->vendor_description,
                'vendoraccepted_certification' => $data->vendor_certification,
                'vendoraccepted_image' => $data->vendor_image,
                // 'email' => $sourceapplicant->id,
                // 'password' => $sourceapplicant->id,
                
                //'phonenumber'=> $Socialuser->phonenumber,
               
            ]);

            $del = Vendorapplicant::where('id', $applicant)->first();
            $del->delete();
            
            $load->sendEmailVerificationNotification();
            Auth::login($load);    
        
    
        
    return redirect('/showvendorapplicants')->with('message', 'Applicant accepted successfully');

        }


      //deny vendor applicant
        public function denyvendor($applicant)
    {
        $del = Vendorapplicant::where('id', $applicant)->first();
        $del->delete();
        return redirect('/showvendorapplicants')->with('message', 'Vendor applicant denied');
    }

      //show accepted vendors
    public function showvendorsaccepted(){

        $applicants=Vendor::all();
        return view('admin.displayallvendors',compact('applicants'));
    }
}