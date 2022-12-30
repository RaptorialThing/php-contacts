<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Tag;
use App\Models\ContactTag;
use Illuminate\Http\Request;
use App\Exports\ContactsExport;
use App\Imports\ContactsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$contacts = Contact::all();
        $contacts = Contact::all();       
        return view('contact.index', [
                'contacts' => $contacts,
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }

    public function export()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');

    }

    public function import(Request $request)
    { 
        try  {
                $file = Excel::import(new ContactsImport, $request->file('contacts'),null, \Maatwebsite\Excel\Excel::XLSX); 

                $date = date('d.m.Y H:i');
                $tag = Tag::updateOrCreate(['text'=>"импорт ".$date,'color'=>"#00FF00"]);
                
                $dateYmd = date("Y-m-d H"); 
                $dateWhere = $dateYmd.":00:00";
                $contacts = Contact::where("created_at",">=",$dateWhere)->get();

                foreach ($contacts as $contact) {
                   ContactTag::updateOrCreate(['tag_id'=>$tag->id,'contact_id'=>$contact->id]);   
            }

                    $response = Response::make($file, 200);
                    $response->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    return $response;
      
        } catch (Throwable $e) {  
            return redirect('/contacts')->with('error', 'not imported');
        }

        return redirect('/contacts')->with('success', 'Imported');
    }
}
