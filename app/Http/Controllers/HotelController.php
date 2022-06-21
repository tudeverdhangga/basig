<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->Hotel = new Hotel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function json()
    {
        $result = $this->Hotel->allData();
        return json_encode($result);
    }

    public function index_hotel()
    {
        $hotels = Hotel::latest()->get();
        return view('hotel.index', ['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name'     => 'required',
            'address'   => 'required',
            'regency'     => 'required',
            'phone'     => 'required',
            'website'     => 'required',
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'latitude'     => 'required',
            'longitude'     => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        // dd($image);
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('hotelspic'), $new_name);

        $hotel = Hotel::create([
            'name'     => $request->name,
            'address'   => $request->address,
            'regency'     => $request->regency,
            'phone'     => $request->phone,
            'website'     => $request->website,
            'image'     => $new_name,
            'latitude'     => $request->latitude,
            'longitude'     => $request->longitude,
        ]);

        if ($hotel) {
            //redirect dengan pesan sukses
            return redirect()->route('hotel.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('hotel.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $hotel = Hotel::find($id);
        return view('hotel.detail', ['hotel' => $hotel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $hotel = Hotel::find($id);
        return view('hotel.edit', ['hotel' => $hotel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request);
        $hotel = Hotel::find($id);
        if ($request->image) {
            $this->validate($request, [
                'name'     => 'required',
                'address'   => 'required',
                'regency'     => 'required',
                'phone'     => 'required',
                'website'     => 'required',
                'image'     => 'required|image|mimes:png,jpg,jpeg',
                'latitude'     => 'required',
                'longitude'     => 'required',
            ]);

            $image = $request->file('image');
            // dd($image);
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('hotelspic'), $new_name);
            
            $filePath =  public_path("hotelspic\\" . $hotel->image);
            // dd($filePath);
            if (file_exists($filePath)) {
                unlink($filePath);
            } else {
            }

            $hotel->name = $request->name;
            $hotel->address = $request->address;
            $hotel->regency = $request->regency;
            $hotel->phone = $request->phone;
            $hotel->website = $request->website;
            $hotel->image = $new_name;
            $hotel->latitude = $request->latitude;
            $hotel->longitude = $request->longitude;
            $hotel->save();
        } else {
            $this->validate($request, [
                'name'     => 'required',
                'address'   => 'required',
                'regency'     => 'required',
                'phone'     => 'required',
                'website'     => 'required',
                'latitude'     => 'required',
                'longitude'     => 'required',
            ]);
            $hotel->name = $request->name;
            $hotel->address = $request->address;
            $hotel->regency = $request->regency;
            $hotel->phone = $request->phone;
            $hotel->website = $request->website;
            $hotel->latitude = $request->latitude;
            $hotel->longitude = $request->longitude;
            $hotel->save();
        }
        return redirect('/hotel')->with('success', 'Data is successfully updated');
        // dd($hotel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Hotel::findOrFail($id);
        $filePath =  public_path("hotelspic\\" . $data->image);
        // dd($filePath);
        if (file_exists($filePath)) {

            unlink($filePath);

            Hotel::where('id', $id)->delete();
        } else {

            Hotel::where('id', $id)->delete();
        }

        return redirect('/hotel')->with('success', 'Data is successfully deleted');
    }
}
