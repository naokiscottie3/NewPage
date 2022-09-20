<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyForm;
use App\Mail\ReplyMail as MailReplyMail;
use App\Mail\ReplyMailOwner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Replymail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{


    public function index(){
        $datas = Contact::all();
        //$data->categories->all();
        return view('home.home',['datas' => $datas]);
    }


    public function category_show(){
        $category_all = Category::all();
        return view('category_form',['category_all' => $category_all]);
    }


    public function category_register(Request $request){

        $validated = $request->validate([
            'name' => ['required'],
        ]);

        DB::beginTransaction();
        try{

            Category::create([
                'checkbox_name' => $validated['name'],
            ]);
            DB::commit();

        }catch(\Throwable $e){

            DB::rollback();
            abort(500);

        }
        return to_route('category_register_show')->with('message','登録完了致しました。');

    }

    public function category_delete($id){

        if(!empty($id)){
            $delete_category = Category::find($id);

            $result = $delete_category->contacts->all();
            if(!empty($result)){
                Session::flash('delete_message','お客様登録データがあります。削除できません。');
                return redirect(route('category_register_show'));
            }
            //下記の操作を実行する場合、既にお客様のお問合せデータを消すことになる。
            $delete_category->contacts()->detach();

            try{
                $delete_category->delete();
            }catch(\Throwable $e){
                abort(500);
            }
        }else{
            Session::flash('delete_message','削除できません。');
        }
        Session::flash('delete_message','削除完了');
        return redirect(route('category_register_show'));

    }

    public function detail(Request $request){
        $id = $request->id;
        $detail_content = Contact::find($id);

        $detail_content_categories = $detail_content->categories->all();
        $category = array();
        foreach($detail_content_categories as $value)
        {
            array_push($category,$value->checkbox_name);
        }
        //下記どちらでもokay
        //return view('customer_detail_information',['detail_content' => $detail_content])->with('category',$category);
        return view('customer_detail_information',['detail_content' => $detail_content,'category' => $category]);

    }
    public function delete(Request $request){
        $id = $request->id;
        $data = Contact::find($id);

        //紐付いている削除する必要のあるメール
        $reply_delete_mails = $data->replymails->all();


        try{

            $data->categories()->detach();
            $data->replymails()->detach();
            $data->delete();

        }catch(\Throwable $e){
            abort(500);
        }
        ////紐付いている削除する必要のあるメールの削除
        foreach($reply_delete_mails as $delete_item){
            try{
                $delete_item->delete();
            }catch(\Throwable $e){
                abort(500);
            }
        }

        return redirect()->route('home')->with('message','データを削除しました。');

    }

    public function reply_view($id){
        $data = Contact::find($id);

        if(is_null($data)){
            return redirect(route('home'));
        }

        return view('reply_form',['id' => $id,'data' => $data]);

    }

    public function send_email(ReplyForm $request){

        //どの問い合わせに対する返信であるかを送られたきたidを使って検索して$dataの中にレコードを格納する。
        $id = $request->id;
        $data = Contact::find($id);

        //dd($request->message,$request->title,$data->email,$data->name);
        Mail::to($data->email)->send(new MailReplyMail($data,$request));

        Mail::to('naokiscottie5@gmail.com')->send(new ReplyMailOwner($data,$request));

        //フォームから送られてきた返信用データを'replymails'のテーブルに登録する。
        DB::beginTransaction();
        try{
            $reply_mail = Replymail::create([
                'title' => $request->title,
                'message' => $request->message,
            ]);
            DB::commit();
        }catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }

        /**
         * 'contacts'テーブルのreply_checkに、このレコードの問い合わせを返信したことを記入する。
         * ’1'の記入により返信済みであることを示す。
         */

        try{
            $data->reply_check = 1;
            $data->save();
        }catch(\Throwable $e){
            abort(500);
        }

        /**
         * 中間テーブルの処理：
         * メール送付を記録した'replymails'テーブルのレコードと'contacts'テーブルの
         * お問合せ情報のレコードの紐付けを行う。
         */

        $reply_mail->contacts()->sync($data->id);

        /**
         * 1つのお問合せ情報に対する返信履歴を確認したい場合
         * $mails = $data->replymails->all();
         */


        return to_route('home')->with('message','返信メッセージを送信しました。');

    }

    public function reply_email($id){
        $data = Contact::find($id);
        $reply_emails = $data->replymails->all();
        return view('reply_history',['data' => $data,'reply_emails' => $reply_emails]);
    }

    public function reply_email_detail($id_1,$id_2){
        $data = Contact::find($id_1);
        $reply_emails = $data->replymails->all();
        $mail_detail = Replymail::find($id_2);
        return view('reply_history',['data' => $data,'reply_emails' => $reply_emails,'mail_detail' => $mail_detail]);
    }

    public function reply_email_delete(Request $request){

        $id_2 = $request->id_2;

        //削除する返信メールを'replymails'テーブルから抽出する。
        $delete_replay_email = Replymail::find($request->id_1);

        //削除する返信メールと紐付いている中間テーブルの値の消去
        $delete_replay_email->contacts()->detach();

        //中間テーブルによって紐付けが解除されたので、該当する返信メールの削除を行う。
        try{
           $delete_replay_email->delete();
        }catch(\Throwable $e){
            abort(500);
        }

        return to_route('reply_email',$id_2)->with('message','履歴を削除しました。');

    }






}
