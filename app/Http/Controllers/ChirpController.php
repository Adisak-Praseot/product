<?php
//ส่วน app ทั้งหมด คือ หลังบ้าน bn
//use Illuminate\Http\Response;  print จากฝั่งหลังบ้าน bn

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;      // save chirp
use App\Models\Chirp;
use Illuminate\Http\Request;

use Inertia\Inertia;
use Inertia\Response;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //public function index()
    public function index(): Response 
    {
        //return response('Hello, World!');
        return Inertia::render('Chirps/Index', [
            //
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    //public function store(Request $request)
    public function store(Request $request): RedirectResponse
    {
        //ตรวจสอบฝั่ง bn สั่งให้ผ่าน
        //ตรวจสอบฝั่ง fn ต้องมีข้อมูลส่งเข้ามา
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $request->user()->chirps()->create($validated); //ตรงนี้  bn fn
 
        return redirect(route('chirps.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
}
