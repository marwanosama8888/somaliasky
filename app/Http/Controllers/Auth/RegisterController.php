<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Package;
use App\Helpers\MainHelper;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Propaganistas\LaravelPhone\PhoneNumber;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('VerifyPhone');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // $data['email'] = str_replace(['.'],'', $data['email']);
        // if(\MainHelper::recaptcha($data['recaptcha'])<0.8)abort(401);
        return Validator::make($data, [
            'name' => "required|unique:users,name|max:255",
            'phone' => "required|unique:users,phone",
            'email' => "required|unique:users,email",
            'City' => "required|exists:cities,id",
            'Country' => "nullable",
            'password' => "required|min:8|max:255",
            'Avatar'  => "image|mimes:png,jpg,jpeg|max:2048",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $city = City::find($data['City']);
        $country=  $city->countries->code;
        $mergedNumber = $this->mergeNumberWithCode($data['phone'],$country) ;

        $user = User::create([
            'name' => $data['name'],
            'phone' => $mergedNumber,
            'email' => $data['email'],
            'city_id' => $data['City'],
            'password' => Hash::make($data['password']),
        ]);
        if (isset($data['Avatar'])) {
            $file = $this->store_file([
                'source' => $data['Avatar'],
                'validation' => "image",
                'path_to_save' => "/uploads/users/",
                'type' => 'CATEGORIES',
                'user_id' => $user->id,
                'resize' => [500, 1000],
                'small_path' => 'small/',
                'visibility' => 'PUBLIC',
                'file_system_type' => env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'compress' => 'auto'
            ]);
            $user->update(['avatar' => $file['filename']]);
        }

        $package = Package::where('price', 0)->first();
        $user->subscription()->create([
            'package_id'        => $package->id,
            'price'             => $package->price,
            'status'            => 1,
            'paid'              => 1,
            'start_date'        => now(),
            'end_date'          => now()->addDays($package->time),
        ]);
        try {
            (new MainHelper())->notify_user([
                'user_id' => User::where('power', 'ADMIN')->first()->id,
                'message' => "?????????? ???????????? ???????? : " . ($user->name ?? ''),
                'url' => route('admin.users.index', ['id' => $user->id]),
                'methods' => ['database']
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $user;
    }
    private function mergeNumberWithCode($phone, $code)
    {
        return PhoneNumber::make($phone, $code)->formatE164();
    }

}
