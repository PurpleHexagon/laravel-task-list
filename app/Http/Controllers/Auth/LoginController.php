<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Task;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        login as loginParent;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @param Request $request
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function login(Request $request)
    {
        $LoginResponse = $this->loginParent($request);

        $password = $request->post('password');
        $hashedPassword = sha1($password);
        $prefix = substr($hashedPassword, 0 , 5);
        $suffix = substr($hashedPassword, 5 );
        $client = new Client();

        $response = $client->request('GET', "https://api.pwnedpasswords.com/range/$prefix");

        $hashSuffixes = explode("\n", $response->getBody()->getContents());

        $hashSuffixesMapped = array_map(
            function ($item) {
                return explode(':', $item);
            },
            $hashSuffixes
        );

        foreach ($hashSuffixesMapped as $hashSuffix) {
            if (strtoupper($hashSuffix[0]) === strtoupper($suffix)) {
                $user = Auth::user();
                $task = new Task();
                $task->fill([
                    'title' => 'Youve been PWDNED',
                    'details' => 'You need to change your password'
                ]);

                $task->user_id = $user->id;

                $task->save();
            }
        }

        return $LoginResponse;
    }
}
