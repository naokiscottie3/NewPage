<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerFormRequest;
use App\Mail\ContactCustomerMail;
use App\Mail\ContactOwnerMail;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function index(){

        $categories = Category::all();
        return view('form',['categories' => $categories]);

    }

    public function create(CustomerFormRequest $request){

        if($request->email_check == 'checked'){
            $checked = 1;
        }else{
            $checked = 0;
        };

        $value = $request->category;

        DB::beginTransaction();
        try{
            $contact = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'email_check' => $checked,
                'reply_check' => 0,
            ]);
            DB::commit();
        }catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }
        $contact->categories()->sync($value);
        $data_category = $contact->categories->all();

        Mail::to('naokiscottie5@gmail.com')->send(new ContactOwnerMail($request,$data_category));
        if($checked == '1'){
            Mail::to($request->email)->send(new ContactCustomerMail($request,$data_category));
        }

        //return to_route('home')->with('message','メッセージを送信しました。');
        return to_route('contact_form_show')->with('message','メッセージを送信しました。');

    }


}
