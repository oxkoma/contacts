<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Http\Requests\PhoneStoreRequest;
use App\Http\Resources\ContactListResource;


class PhoneResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return ContactListResource::collection(Phone::all());
         } catch (Throwable $e) {
             report($e);
     
             return response()->json([
                 'message' => 'Records not found.'
             ], 404);
         }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneStoreRequest $request)
    {
        var_dump($request->all());
        die();
        /*if(!empty($request->phone))
        $phone = Phone::create($request->validated());

        return new ContactListResource($phone);*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return new ContactListResource(Phone::findOrFail($id));
        } catch (Throwable $e) {
            report($e);
    
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        }   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneStoreRequest $request, $id)
    {
        $phone = Phone::find($id);
        $phone->update($request->validated());

        return new ContactListResource($phone);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phone::find($id);
        $phone->delete();
        return redirect()->route('home')->with('success', 'Record was deleted');
    }
}