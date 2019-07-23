<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\SignupRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;
use Image;

/**
 * Class SignupController
 * @package App\Http\Controllers\Auth
 */
class SignupController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
	{
		return view('pages.auth.signup');
	}

    /**
     * @param SignupRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function post(SignupRequest $request)
    {
        $data               = $request->toArray();
        $data['password']   = Hash::make($data['password']);
        $data['birthday']   = Carbon::parse($data['birthday'])->format('Y-m-d');

        /* Upload and resize user avatar */
        if($request->has('avatar')){
            $path   = $request->avatar->store('users');
            Image::make(storage_path('app/'.$path))
                ->resize(120, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save();
            $data['avatar'] = $path;
        }

        /* Save new user data */
        $user = new User($data);
        $user->save();

        /* Login user */
        Auth::login($user);
        return redirect(route('home'));
	}
}
