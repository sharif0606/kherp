<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Erpuser;
use App\Models\Company;
use App\Models\Settings\Branch;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;
use App\Http\Requests\AdminUser\AddNewRequest;
use App\Http\Requests\AdminUser\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

class AdminUserController extends Controller
{
    use ResponseTrait,ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=Erpuser::whereIn('role_id',[1])->paginate();
        return view('settings.adminusers.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.adminusers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $request)
    {
        try{
            $user= new Erpuser;
            $user->name=$request->userName;
            $user->contact_no=$request->contactNumber;
            $user->email=$request->userEmail;
            $user->password=Hash::make($request->password);
            $user->role_id=1;
            if($user->save())
                return redirect()->route(currentUser().'.admin.index')->with($this->resMessageHtml(true,null,'Successfully created'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Erpuser::findOrFail(encryptor('decrypt',$id));
        return view('settings.adminusers.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $user=Erpuser::findOrFail(encryptor('decrypt',$id));
            $user->name=$request->userName;
            $user->contact_no=$request->contactNumber;
            $user->email=$request->userEmail;
            // $user->language=$request->language;

            $path='uploads/erpAdmin';
            if($request->hasFile('image')){
                $this->deleteImage($user->image,$path);
                $data = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/erpAdmin'), $data);
                $user->image=$data;
            }

            if($request->has('password') && $request->password)
                $user->password=Hash::make($request->password);
         
            if($user->save()){
                request()->session()->put(
                    [
                        'userName'=>encryptor('encrypt',$user->name),
                        'image'=>encryptor('encrypt',$user->image)
                    ]);
            
                return redirect()->route(currentUser().'.admin.index')->with($this->resMessageHtml(true,null,'Successfully updated'));
                }else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user=Erpuser::findOrFail(encryptor('decrypt',$id));
            if($user->delete())
                return redirect()->back()->with($this->resMessageHtml(true,null,'Successfully deleted'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
        
    }
}
