<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersoneStoreRequest;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Resources\ContactResource;
use App\Models\Persone;
use App\Models\Phone;
use App\Support\Collection;

class ContactResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $collection = ContactResource::collection(Persone::all())->sortKeysDesc()->paginate(3);
            return view('contact.index', compact('collection'));
                       
        } catch (Throwable $e) {
            
            report($e);
            return response()
                ->json(['message' => 'Records not found.'], 404);
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $request)
    {  
        $fname = $request->first_name;
        $lname = $request->last_name;
        $issetPersone = Persone::where('first_name', '=', $fname)->where('last_name', '=', $lname)->get();
        if($issetPersone->isEmpty()) {
            $persone = Persone::create([
                'first_name' => $fname,
                'last_name' => $lname,
            ]);
           foreach($request->get('phones') as $value) {
               $phone = Phone::create(['phone' => $value, 'persone_id' => $persone->id]);
               $phone->save();
            };    
        return back()->with('success', 'Контакт створений');
        } else return back()->with('error', 'Такий контакт вже існує');  
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
           return new ContactResource(Persone::findOrFail($id));
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
    public function update(PersoneStoreRequest $request, $id)
    {
        $persone = Persone::find($id);
        $persone->update($request->validated());

        return new ContactResource($persone);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persone = Persone::find($id);
        $persone->delete();
        return redirect()->route('home')->with('success', 'Record was deleted');
    }
}