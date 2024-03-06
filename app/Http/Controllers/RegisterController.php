<?php

namespace App\Http\Controllers;

use App\Models\RegisterModel;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class RegisterController extends Controller {
    public function index() {
        return view("login");
    }

    private $model;
    public function __construct(RegisterModel $model) {
        $this->model = $model;
    }

    public function login(Request $request) {
        // $data=studentModel::all();
        
        $request->validate([
            "email" => "required|email",
            "mobile" => "required|regex:/^[0-9]{10}$/"
        ]);

        $data = $request->except("_token");
       
        $email = $data['email'];
        $mobile = $data['mobile'];
        if (!$data) {
            return "Please Register first";
        } else {
            $user = $this->model->getLoginCondition($email);
            if (!$user) {
                return "Please Register first";
            } else {
                $dbMobile = $user['mobile'];
                if ($dbMobile === $mobile) {
                    return redirect()->route("home");
                } else {
                    return "Password Mismatch";
                }
            }
        }
    }

    public function register(Request $request) {

        $request->validate([
            "name" => "required|string",
            "email" => "required|unique:register_models,email|email",
            "mobile" => "required|regex:/^[0-9]{10}$/|unique:register_models,mobile",
            "year" => "required",
            "department" => "required"
        ], [
            'mobile.regex' => 'The mobile number must be a 10-digit numeric value.'
        ]);

        $data = $request->except('_token');

        $user = $this->model->getRegister($data);
        if ($user) {
            return redirect()->route('home');
        } else {
            return view("register");
        }
    }

    public function show($id = null) {
           $data = $this->model->getShowValues($id);
        if (is_null($id)) {
            return view('ShowHome')->with('data', $data);
        } else {
            return view('edit')->with('data', $data);
        }

    }

    public function update(Request $request, $id) {
        // $request->validate([
        //     "name"=>"required|string",
        //     "email"=>"required|unique:register_models,email|email",
        //     "mobile"=>"required|regex:/^[0-9]{10}$/|unique:register_models,mobile",
        //     "year"=>"required",
        //     "department"=>"required"
        // ],[
        //     'mobile.regex' => 'The mobile number must be a 10-digit numeric value.',
        // ]);
        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile;
        $year = $request->year;
        $department = $request->department;
        $data = $this->model->getUpdateValues($id, $name, $email, $mobile, $year, $department);
        if ($data) {
            return redirect()->route('home');
        } else {
            return redirect("/{id}");
        }
    }

}
