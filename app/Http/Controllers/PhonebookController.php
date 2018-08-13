<?php

namespace App\Http\Controllers;


use App\Http\Requests\PhonebookRequest;
use App\Phonebook;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    /**
     * Display Phonebook Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phonebook');
    }


    /**
     * List all Phonebook Entries.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function list()
    {
        return Phonebook::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Store a newly contact.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhonebookRequest $request)
    {
        $phoneBook = new Phonebook;

        $phoneBook->name = $request->name;
        $phoneBook->phone = $request->phone;
        $phoneBook->email = $request->email;

        $phoneBook->save();

    }

    /**
     * Delete All Phonebook Entries
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function deleteAll()
    {
        Phonebook::truncate();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }

    /**
     * Update Contact Details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(PhonebookRequest $request)
    {
        $phoneBook = Phonebook::find($request->id);

        $phoneBook->name = $request->name;
        $phoneBook->phone = $request->phone;
        $phoneBook->email = $request->email;

        $phoneBook->save();
        
    }

    /**
     * Remove One Contact.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook)
    {   
        Phonebook::where('id', $phonebook->id)->delete();
    }

}
