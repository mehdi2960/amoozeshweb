<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('client.register.create', compact('categories', 'brands'));

    }

    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        $user = User::generateOtp($request);

        return redirect(route('register.otp', $user));
    }

    public function otp(User $user)
    {
        return view('client.register.verifyOtp', compact('user'));
    }

    public function verifyOtp(Request $request, User $user)
    {
        $request->validate([
            'otp' => 'required|max:5|min:5|lte:99999|gte:11111',
        ]);

        if (!Hash::check($request->get('otp'), $user->password)) {
            return back()->withErrors(['otp' => 'کد وارد شده صحیح نیست!!']);
        }

        auth()->login($user);
        return redirect(route('home'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('home'));
    }
}
