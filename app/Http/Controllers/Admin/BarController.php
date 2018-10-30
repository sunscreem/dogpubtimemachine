<?php

namespace App\Http\Controllers\Admin;

use App\Bar;
use App\Http\Controllers\Controller;
use App\Http\Requests\BarUpdateRequest;

class BarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bars = Bar::orderBy('name')->get();

        return view('admin.bar.index')->with(compact('bars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarUpdateRequest $request)
    {
        Bar::createWithAttributes($request->validated());

        $request->session()->flash('success', 'The bar has been created!');

        return redirect(route('admin.bar.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bar $bar)
    {
        return view('admin.bar.edit')->with(compact('bar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bar $bar)
    {
        return view('admin.bar.edit')->with(compact('bar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BarUpdateRequest $request, Bar $bar)
    {
        $bar->updateWithAttributes($request->validated());

        $request->session()->flash('success', 'The bar has been updated');

        $bar = $bar->fresh();

        return view('admin.bar.edit')->with(compact('bar'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
