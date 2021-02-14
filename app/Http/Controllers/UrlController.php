<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $urls = DB::table('urls')->get();
        return view('urls.index', ['urls' => $urls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        //
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'url.name' => 'required|url'
        ], [
            'required' => 'URL is required',
            'url' => 'Invalid URL provided'
        ]);

        [
            'scheme' => $scheme,
            'host' => $host
        ] = parse_url($validated['url']['name']);
        $uri = implode('://', [$scheme, $host]);
        $url = DB::table('urls')->where('name', $uri)->first();

        if($url === null) {
            $createdAt = $updatedAt = Carbon::now();
            $urlId = DB::table('urls')->insertGetId([
                'name' => $uri,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
            ]);

            flash('URL was successfully added!')->success();
        } else {
            flash('URL has already been added.')->info();
        }

        return redirect()->route('urls.show', ['url' => $url->id ?? $urlId]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $url = DB::table('urls')->where('id', $id)->first();
        if ($url === null) {
            abort(404, 'URL not found.');
        }

        return view('urls.show', ['url' => $url]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        //
    }
}
