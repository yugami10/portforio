<?php

namespace App\Http\Controllers\Mail;

use App\MailAddressTo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		dd('宛先確認	');
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
     * @param  \App\MailAddressTo  $mailAddressTo
     * @return \Illuminate\Http\Response
     */
    public function show(MailAddressTo $mailAddressTo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MailAddressTo  $mailAddressTo
     * @return \Illuminate\Http\Response
     */
    public function edit(MailAddressTo $mailAddressTo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MailAddressTo  $mailAddressTo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MailAddressTo $mailAddressTo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MailAddressTo  $mailAddressTo
     * @return \Illuminate\Http\Response
     */
    public function destroy(MailAddressTo $mailAddressTo)
    {
        //
    }
}
