<?php

namespace App\Http\Controllers\Checks;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UrlCheckController extends Controller
{
    public function store(int $urlId)
    {
        $url = DB::table('urls')->find($urlId);
        try {
            $response = Http::get(trim($url->name));
            $created_at = $updated_at = Carbon::now();
            DB::table('url_checks')->insert([
                'status_code' => $response->status(),
                'url_id' => $urlId,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ]);

            flash('URL successfully checked')->success();
        } catch (ConnectionException $e) {
            flash("Connection error: " . $e->getMessage())->error();
        } catch (RequestException $e) {
            flash("Request error: " . $e->getMessage())->error();
        }

        return redirect()->route('urls.show', ['url' => $urlId]);
    }
}