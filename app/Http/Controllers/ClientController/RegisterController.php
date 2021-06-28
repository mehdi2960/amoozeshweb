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
        $request->validate([
            'email' => 'required|email',
        ]);

        $otp = random_int(11111, 99999);

        $userQuery = User::query()->where('email', $request->get('email'))->first();

        if ($userQuery) {
            $user = $userQuery;
            $user->update([
                'password' => bcrypt($otp),
            ]);
        } else {
            $user = User::query()->create([
                'email' => $request->get('email'),
                'password' => bcrypt($otp),
                'role_id' => Role::findByTitle('normal-user')->id,
            ]);
        }

        Mail::to($user->email)->send(new OtpMail($otp));

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
