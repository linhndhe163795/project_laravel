<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Contracts\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $employeeRespoitory;
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRespoitory = $employeeRepository;
    }

    public function home()
    {
        return view('clients.home');
    }

    public function login()
    {
        return view('clients.login');
    }

    public function loginPost(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $check = $this->employeeRespoitory->checkLogin($email, $password);
       
        
        if ($check == true) {
            $profile = $this->employeeRespoitory->getEmployeeByEmail($email);
            Session::put("profile",[[
                'id'=> $profile->id,
                'email' => $profile->email
            ]]);
            
            return redirect(route('home'))->with('email', $email);
        } else {
            return redirect(route('login'))->with('error', 'Incorrect Input');
        }
    }
}
