<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function register(){
        return view('user.register');
    }

    // store new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'photo' => 'image|nullable|max:1999'
        ]);
        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('photos', $filenameSimpan);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'photo' => $filenameSimpan
            ]);
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }

        $data = [
            'name'=> $request->name,
            'email'=> $request->email
        ];
        
        dispatch(new SendEmailJob($data));
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('login')->withSuccess('Kamu berhasil register');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email',
            'photo' => 'image|nullable|max:1999'
        ]);
        // dd($request->all());
        $user = User::findOrFail($id);
        // check apakah image is uploaded
        if ($request->hasFile('photo')){
            // upload  new image
            $image = $request->file('photo');
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('photos', $filenameSimpan);

            //delete old image
            Storage::delete('photos/'.$user->photo);

            //update post with new image
            $user->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'photo'     => $filenameSimpan
            ]);
        } else {
            //update user without photo
            $user->update([
                'name'      => $request->name,
                'email'     => $request->email,
            ]);
        }
        //redirect to dashboard
        return redirect()->route('user.index')->with(['message' => 'Data Berhasil Diubah!']);
    }

    public function login()
    {
        return view('user.login');
    }

    // autektikasi login user
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->withSuccess('Kamu berhasil Login!');
        }
        return back()->withErrors([
            'email'=> 'Kredensial yang dimasukkan tidak valid'
        ])->onlyInput('email');
    }
    
    // fungsi route dashboard
    public function dashboard()
    {
        $users = User::get();
        if (Auth::check()) {
            return view('dashboard.dashboard', compact('users'));
        }
        return redirect()->route('login')
            ->withErrors([
                'email' => 'Tolong login untuk mengakses dashboard.',
            ])->onlyInput('email');
    }

    // logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('Berhasil Logout');
    }

    public function indexUser(){
        $users = User::get();
        if (Auth::check()) {
            return view('user.index', compact('users'));
        }
    }

    public function edit(string $id){
        $user = User::findOrFail($id);
        if (Auth::check()) {
            return view('user.edit', compact('user'));
        }
    }

    public function destroy(string $id){
        $user = User::findOrFail($id);

        Storage::delete($user->photo);

        $user->delete();

        return redirect()->route('user.index')->with(['message' => 'Data Berhasil Dihapus!']);
    }

    // function resize
    public function resize(Request $request, string $id){
        $user = User::findOrFail($id);
        return view('user.resize', compact('user'));
    }

    // resize image post
    public function resizePost(string $id){
        $user = User::findOrFail($id);

        $photoPath = public_path('storage/photos/'.$user->photo);
        
        $thumbnailPath = public_path('storage/thumbnails/'.$user->photo);
        $photoResized = Image::make($photoPath);
        $photoResized->fit(100,100);
        $photoResized->save($thumbnailPath);
        return redirect()->route('user.resize', $user->id)->with(['message'=> 'Berhasil di resize']);
    }
    
}
