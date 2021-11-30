<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Employer;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers = Employer::all();

        return view('employers.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'job' => 'required'
            ],
            [
                'first_name.required' => 'Le nom doit être rempli',
                'last_name.required' => 'Le prénom doit être rempli',
                'phone.required' => 'Le numéro de téléphone doit être rempli',
                'address.required' => "L'adresse doit être rempli",
                'job.required' => 'Le service doit être rempli',
            ]
        );

        $employer = new Employer([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'job' => $request->get('job'),

        ]);

        if ($files = request()->file('avatar')) {
            $destinationPath = 'image'; // upload path
            $profilePersonnel = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilePersonnel);
            $employer->avatar = $profilePersonnel;
        }
        $employer->save();
        return Redirect::to('/employers')->with('success', 'Employé enregistré!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employer = Employer::find($id);
        return view('employers.show', compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employer = Employer::find($id);
        return view('employers.edit', compact('employer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'job' => 'required'
            ],
            [
                'first_name.required' => 'Le nom doit être rempli',
                'last_name.required' => 'Le prénom doit être rempli',
                'phone.required' => 'Le numéro de téléphone doit être rempli',
                'address.required' => "L'adresse doit être rempli",
                'job.required' => 'Le service doit être rempli',

            ]
        );

        $employer = Employer::find($id);
        $employer->first_name =  $request->get('first_name');
        $employer->last_name = $request->get('last_name');
        $employer->phone = $request->get('phone');
        $employer->address = $request->get('address');
        $employer->job = $request->get('job');


        if ($files = request()->file('avatar')) {
            $destinationPath = 'image'; // upload path
            $profilePersonnel = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilePersonnel);
            $employer->avatar = $profilePersonnel;
        }



        $employer->save();

        return redirect('/employers')->with('success', ' Modification faite !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employer = Employer::find($id);
        $employer->delete();

        return redirect('/employers')->with('info', 'Employé supprimé!');
    }
}
