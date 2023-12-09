<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Setting;
use Illuminate\Http\Request;
use Exception;
use File;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Setting::paginate(10);
        return view('backend.settings.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            try{
                $data=new Setting();
                $data->company_add=$request->companyAddress;
                $data->contact_no_en=$request->contactNumber;
                $data->email=$request->email;
                $data->facebook_link=$request->facebookLink;
                $data->twitter_link=$request->twitterLink;
                $data->whatsapp_link=$request->whatsappLink;

                if($request->hasFile('image')){
                    $imageName = rand(111,999).time().'.'.
                    $request->image->extension();
                    $request->image->move(public_path('uploads/settings'), $imageName);
                    $data->image=$imageName;
                }
    
                if($data->save())
                    return redirect()->route('settings.index')->with('success','Successfully saved');
                else
                    return redirect()->back()->withInput()->with('error','Please try again');
                
            }catch(Exception $e){
                dd($e);
                return redirect()->back()->withInput()->with('error','Please try again');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id)
    {
        $setting=Setting::findOrFail(encryptor('decrypt',$id));
        return view('backend.settings.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        {
            try{
                $data=Setting::findOrFail(encryptor('decrypt',$id));
                $data->company_add=$request->companyAddress;
                $data->contact_no_en=$request->contactNumber;
                $data->email=$request->email;
                $data->facebook_link=$request->facebookLink;
                $data->twitter_link=$request->twitterLink;
                $data->whatsapp_link=$request->whatsappLink;

                if($request->hasFile('image')){
                    $imageName = rand(111,999).time().'.'.
                    $request->image->extension();
                    $request->image->move(public_path('uploads/settings'), $imageName);
                    $data->image=$imageName;
                }
    
                if($data->save())
                    return redirect()->route('settings.index')->with('success','Successfully saved');
                else
                    return redirect()->back()->withInput()->with('error','Please try again');
                
            }catch(Exception $e){
                dd($e);
                return redirect()->back()->withInput()->with('error','Please try again');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        {
            $setting= Setting::findorFail(encryptor('decrypt',$id));
            $image_path=public_path('uploads/settings/').$setting->image;
    
            if($setting->delete()){
                if(File::exists($image_path))
                File::delete($image_path);
                return redirect()->back();
            }
        }
    }
}
