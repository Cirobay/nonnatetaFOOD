<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dash\Client;

class ClientController extends Controller
{


    public function index()
    {
        $clients = Client::latest()->paginate(5);

        return view('dash.client.index', compact('clients'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function create()
    {
        return view('dash.client.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required',
            'company_adress' => 'required',
            'company_kvk' => 'required',
        ]);

        Client::create($request->all());

        return redirect()->route('dash.clients.index')
            ->with('success', 'Product created successfully.');
    }




    public function show(Client $client)
    {
        return view('dash.client.show', compact('client'));
    }



    public function edit(Client $client)
    {
        return view('dash.client.edit', compact('client'));
    }



    public function update(Request $request, Client $client)
    {
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required',
            'company_adress' => 'required',
            'company_kvk' => 'required',
        ]);

        $client->update($request->all());

        return redirect()->route('dash.clients.index')
            ->with('success', 'Product updated successfully');
    }



    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('dash.clients.index')
            ->with('success', 'Product deleted successfully');
    }
}
