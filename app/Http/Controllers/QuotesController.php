<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\User;
use App\Http\Requests\Quote\StoreQuotesRequest;
use App\Http\Requests\Quote\FavoriteQuotesRequest;
use Illuminate\Http\Request;
use Session;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class QuotesController extends Controller
{

    /**
     * Display viewa initial quotes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        session()->put('autenticado', Auth::user()->id);

        $quotes = [];

        $baseUrl = env('API_QUOTE');

        try{

            for($x=0; $x < 5; $x++) {
                
                $response = Http::withHeaders([ 
                    'Accept'=> '*/*', 
                ]) 
                ->get($baseUrl); 
            
                $quotes[] = $response->body();


            }

            $result = ["error" => "success", "message" => "Completado"];

            return Inertia::render('Quotes/Index',['quotes' => $quotes, 'result' => $result, 'user_id' => session()->get('autenticado')]);
            

        } catch (\Exception $err) {

            $result = ['error' => 'danger', 'message' => 'Error en la conexión, Intente nuevamente'];

            return Inertia::render('Quotes/Index',['quotes' => $quotes, 'result' => $result, 'user_id' => session()->get('autenticado')]);
        }

        
    }

    /**
     * Display viewa initial quotes.
     *
     * @return \Illuminate\Http\Response
     */
    public function getQuotes()
    {
        $quotes = [];

        $baseUrl = env('API_QUOTE');

        try{

            for($x=0; $x < 5; $x++) {
                
                $response = Http::withHeaders([ 
                    'Accept'=> '*/*', 
                ]) 
                ->get($baseUrl); 
            
                $quotes[] = $response->body();


            }

            $result = ["error" => "success", "message" => "Completado"];

            return Inertia::render('Quotes/Index',['quotes' => $quotes, 'result' => $result, 'user_id' => session()->get('autenticado')]);
            

        } catch (\Exception $err) {
            $result = ['error' => 'danger', 'message' => 'Error en la conexión, Intente nuevamente'];

            return Inertia::render('Quotes/Index',['quotes' => $quotes, 'result' => $result, 'user_id' => session()->get('autenticado')]);
        }
    }

    /**
     * Display a listing of user quotes.
     *
     * @return \Illuminate\Http\Response
     */
    public function myQuotes()
    {
        $id = session()->get('autenticado');
        $quotes = Quote::where('user_id', $id)->get();
        
        $result = ["error" => "success", "message" => "Completado"];

        return Inertia::render('Quotes/MyQuotes',['quotes' => $quotes, 'result' => $result, 'user_id' => session()->get('autenticado')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuotesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = User::where('email', session()->get('autenticado'))->first();
        
        $quote = new Quote();
        $quote->quote = $request['favorite'];
        $quote->user_id = $request['id'];
        $quote->save();

        $result = ["error" => "success", "message" => "Agregada la cita a favoritos"];
        
        return redirect()->back()->with(['quotes' => $request['quotes'], 'result' => $result, 'user_id' => session()->get('autenticado')]);

        //return Inertia::render('Quotes',['quotes' => $request['quotes'], 'result' => $result, 'user_id' => session()->get('autenticado')]);
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quote  $quotes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = session()->get('autenticado');
        
        $quote = Quote::find($id);
        $quote->delete();

        $quotes = Quote::where('user_id', $user_id)->get();

        $result = ["error" => "success", "message" => "Completado"];

        //return response()->json('Eliminada la cita de favoritos');

        return Inertia::render('Quotes/MyQuotes',['quotes' => $quotes, 'result' => $result, 'user_id' => session()->get('autenticado')]);
    }

}
