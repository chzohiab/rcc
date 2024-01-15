<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{

    public function index()
    {
        $clubs = Club::all();
        return view('admin.pages.clubs.index', compact('clubs'));
    }


    public function create()
    {
        // Check if the user already has an item
        $existingItem = Club::where('club_id', auth()->id())->first();

        if ($existingItem) {
            // User already has an item, handle accordingly (e.g., show an error message)
            return redirect()->route('clubs')->with('error', 'You can only create one item.');
        }
        // Continue with the item creation process
        $item = new Club();
        // Populate item attributes based on the request
        // ...

        $item->club_id = auth()->id(); // Associate the item with the logged-in user
        $item->save();

        // Redirect or respond accordingly
        return redirect()->route('clubs')->with('success', 'Item created successfully.');
        // return view('admin.pages.clubs.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'established_year' => 'required',
            'bio' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($image = $request->file(key: 'image')) {
            $destinationPath = 'img/';
            $clubImage = date(format: 'YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $clubImage);
            $input['image'] = "$clubImage";
        }
        Club::create($input);
        return redirect()->route(route: 'clubs')
            ->with('success', 'Club created successfully');
    }

    public function show(Club $club)
    {
        //
    }


    public function edit($id)
    {
        $club = Club::find($id);
        return view('admin.pages.clubs.edit', compact('club'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'established_year' => 'required',
            'bio' => 'required',
        ]);

        $input = $request->all();
        if ($image = $request->file(key: 'image')) {
            $destinationPath = 'img/';
            $clubImage = date(format: 'YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $clubImage);
            $input['image'] = "$clubImage";
        }
        $club = Club::find($id);
        $club->update($request->all());
        return redirect()->route(route: 'clubs')
            ->with('success', 'Club Updated successfully');
    }

    public function destroy($id)
    {
        $club = Club::find($id);
        $club->delete();
        return redirect()->route('clubs')
            ->with('success', 'Club deleted successfully');
    }
}
