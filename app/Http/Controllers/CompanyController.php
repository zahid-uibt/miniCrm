<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Notifications\CompanyCreated;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $companies=Company::paginate(10);
        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {
        $validated = $request->validated();
        $file = $request->file('logo');
        $filename = 'company-logo' . time() . '.' . $file->getClientOriginalExtension();
    
        $path = $file->storeAs('public', $filename);
        $validated['logo']=$filename;
        $company= Company::create($validated);
        $company->notify(new CompanyCreated($company));
        return redirect('/company')->with('msg', 'Company added Successfully');
                        
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
        $company=Company::findorfail($id);
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $company=Company::findorfail($id);
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = 'company-logo' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public', $filename);
            $company->logo=$filename;
        }
         $company->name=$validated['name'];
         $company->email=$validated['email'];
         $company->website=$validated['website'];
         $company->save();
        return redirect('/company')->with('msg', 'Company updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company=Company::findorfail($id);
        $image=$company->logo;
        $company->delete();
        Storage::delete('public/'.$image);
        return redirect('/company')->with('msg', 'Company deleted Successfully');
    }
}
