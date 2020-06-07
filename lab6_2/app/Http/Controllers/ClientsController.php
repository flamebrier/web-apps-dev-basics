<?php

namespace App\Http\Controllers;

use App\Client;
use App\Visit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function index()
    {
        $list = DB::table('clients')
            ->join('visits', 'clients.id', '=', 'visits.client')
            ->select('visits.id', 'date', 'time', 'name', 'telephone', 'service')
            ->get();

        $clients = Client::all();
        return view('clients', ['list' => $list], ['clients' => $clients]);
    }

    public function queue()
    {
        $queue = session()->get('queue');
        if(!$queue) {
            abort(404);
        }
        return view('queue', ['queue' => $queue]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param Request $req
     * @return void
     */
    public function create(Request $req)
    {
        $client = new Client;

        $client->name = $req->name;
        $client->telephone = $req->telephone;

        $client->save();
        $this->index();
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        Visit::destroy($id);
        $this->index();
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function addToQueue($id)
    {
        $visit = DB::table('visits')->find($id);
        $client = DB::table('clients')->find($visit->client);
        if(!$visit) {
            abort(404);
        }
        $queue = session()->get('queue');
        if(!$queue) {
            $queue = [
                $id => [
                    "client"=>$client->name,
                    "telephone"=>$client->telephone,
                    "date" => $visit->date,
                    "time" => $visit->time,
                    "service" => $visit->service,
                ]
            ];
            session()->put('queue', $queue);
            return redirect()->back();
        }

        if(isset($queue[$id])) {
            return redirect()->back();
        }

        // if item not exist in cart then add to cart with quantity = 1
        $queue[$id] = [
            "client"=>$client->name,
            "telephone"=>$client->telephone,
            "date" => $visit->date,
            "time" => $visit->time,
            "service" => $visit->service
        ];

        session()->put('queue', $queue);
        return redirect()->back();
    }
}
