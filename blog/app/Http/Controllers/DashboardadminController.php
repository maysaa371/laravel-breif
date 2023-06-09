<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Farm;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;




class DashboardadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $farmCount = Farm::count();$rentedFarmsCount = $this->getRentedFarmCount();

        return view('Admin.layout.index',compact('farmCount','rentedFarmsCount'));
    }

    public function showProfile()
    {
        // Your code logic here to fetch the user profile data

        return view('admin.layout.app-profile'); // Assuming you have a "profile.blade.php" view file
    }

    public function getRentedFarmCount()
{
    $rentedFarmsCount = Farm::where('status', true)->count();
    return $rentedFarmsCount;
}
    // public function index(Request $request)
    // {
    //     $farmCount = Farm::count();

    //     return view('your-view', compact('farmCount'));
    // }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
{
    $user = User::find($id);
    $user->fname = $request->input('fname');
    $user->lname = $request->input('lname');
    $user->img = $request->input('img');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->password = $request->input('password');
    $user->save();

    Session::flash('success', 'User updated successfully');
    return redirect()->route('userdashboard.show', $user->id);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
//     public function search(Request $request)
// {
//     $query = $request->input('query');
//     $results = User::where('name', 'like', '%'.$query.'%')->get(); // Replace with your search logic

//     // Pass the results to the view or perform any other actions
//     return view('your-search-results-view', compact('results'));
// }
}
