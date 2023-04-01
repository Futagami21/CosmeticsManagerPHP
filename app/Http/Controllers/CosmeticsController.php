<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cosmetic;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateTime;

class CosmeticsController extends Controller
{
    //home
    public function home(){

        $cosmetics = Cosmetic::where('user_id',\Auth::user()->id)->get();
        foreach( $cosmetics as $cosmetic ){
            $day1 = Carbon::parse($cosmetic->expiry_date);
            $day2 = Carbon::now();
            $diff = $day2->diffInDays($day1);
            if($diff <= 7 && $diff > 0 && $diff !== null || $diff === '0'){
                $alert = "期限まで残り一週間の化粧品があります"; 
                return view('/home')->with([
                    'alert' => $alert,
                ]);
            }            
        }
        return view('home');
    }

    //登録ページ表示
    public function show_cosmetics_register(){
        return view('cosmetics.cosmetics_register');
    }
    //化粧品登録
    public function cosmetics_register(Request $request){

        $request->validate([
            'name' => 'required',
            'memo' => 'max:200',
            'comment' => 'max:200',
        ],
        [
            'name.required' => '商品名は必須入力です。',
            'memo.max' => '自分用メモは200文字以内でご入力ください。',
            'comment.max' => '公開用コメントは200文字以内でご入力ください。',
        ]);

        $userId = Auth::id();
        $image = $request->file('image');

        if($request->hasFile('image')){
            $path = \Storage::put('/public',$image);
            $path = explode('/',$path);
        }else{
            $path = null;
        }

        $open = $request->input("open_date");
        $get = $request->input("get_date");

        //開封日、入手日両方入力　もしくは　開封日のみ入力
        if(isset($open) && !isset($get) || isset($open) && isset($get)){
            //inputで送られた開封日をタイムスタンプに
            $date = $request->input("open_date");

            //expiryから日付計算
            if($request->expiry == "1ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +1 month"));
            }elseif($request->expiry == "2ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +2 month"));
            }elseif($request->expiry == "3ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +3 month"));
            }elseif($request->expiry == "4ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +4 month"));
            }elseif($request->expiry == "5ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +5 month"));
            }elseif($request->expiry == "6ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +6 month"));
            }elseif($request->expiry == "7ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +7 month"));
            }elseif($request->expiry == "8ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +8 month"));
            }elseif($request->expiry == "9ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +9 month"));
            }elseif($request->expiry == "10ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +10 month"));
            }elseif($request->expiry == "11ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +11 month"));
            }elseif($request->expiry == "1年"){
                $expiry_date = date('y-m-d',strtotime($date." +1 year"));
            }elseif($request->expiry == "1年1ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +1 month +1 year"));
            }elseif($request->expiry == "1年2ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +2 month +1 year"));
            }elseif($request->expiry == "1年3ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +3 month +1 year"));
            }elseif($request->expiry == "1年4ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +4 month +1 year"));
            }elseif($request->expiry == "1年5ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +5 month +1 year"));
            }elseif($request->expiry == "1年6ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +6 month +1 year"));
            }elseif($request->expiry == "1年7ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +7 month +1 year"));
            }elseif($request->expiry == "1年8ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +8 month +1 year"));
            }elseif($request->expiry == "1年9ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +9 month +1 year"));
            }elseif($request->expiry == "1年10ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +10 month +1 year"));
            }elseif($request->expiry == "1年11ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +11 month +1 year"));
            }elseif($request->expiry == "2年"){
                $expiry_date = date('y-m-d',strtotime($date." +2 year"));
            }elseif($request->expiry == "2年1ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +1 month +1 year"));
            }elseif($request->expiry == "2年2ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +2 month +2 year"));
            }elseif($request->expiry == "2年3ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +3 month +2 year"));
            }elseif($request->expiry == "2年4ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +4 month +2 year"));
            }elseif($request->expiry == "2年5ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +5 month +2 year"));
            }elseif($request->expiry == "2年6ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +6 month +2 year"));
            }elseif($request->expiry == "2年7ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +7 month +2 year"));
            }elseif($request->expiry == "2年8ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +8 month +2 year"));
            }elseif($request->expiry == "2年9ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +9 month +2 year"));
            }elseif($request->expiry == "2年10ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +10 month +2 year"));
            }elseif($request->expiry == "2年11ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +11 month +2 year"));
            }elseif($request->expiry == "3年"){
                $expiry_date = date('y-m-d',strtotime($date." +3 year"));
            }
        }
        //開封日も入手日も入っていた場合
        if(!isset($open) && isset($get)){

            $date = $request->input("get_date");

            if($request->expiry == "1ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +1 month"));
            }elseif($request->expiry == "2ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +2 month"));
            }elseif($request->expiry == "3ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +3 month"));
            }elseif($request->expiry == "4ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +4 month"));
            }elseif($request->expiry == "5ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +5 month"));
            }elseif($request->expiry == "6ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +6 month"));
            }elseif($request->expiry == "7ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +7 month"));
            }elseif($request->expiry == "8ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +8 month"));
            }elseif($request->expiry == "9ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +9 month"));
            }elseif($request->expiry == "10ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +10 month"));
            }elseif($request->expiry == "11ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +11 month"));
            }elseif($request->expiry == "1年"){
                $expiry_date = date('y-m-d',strtotime($date." +1 year"));
            }elseif($request->expiry == "1年1ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +1 month +1 year"));
            }elseif($request->expiry == "1年2ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +2 month +1 year"));
            }elseif($request->expiry == "1年3ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +3 month +1 year"));
            }elseif($request->expiry == "1年4ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +4 month +1 year"));
            }elseif($request->expiry == "1年5ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +5 month +1 year"));
            }elseif($request->expiry == "1年6ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +6 month +1 year"));
            }elseif($request->expiry == "1年7ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +7 month +1 year"));
            }elseif($request->expiry == "1年8ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +8 month +1 year"));
            }elseif($request->expiry == "1年9ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +9 month +1 year"));
            }elseif($request->expiry == "1年10ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +10 month +1 year"));
            }elseif($request->expiry == "1年11ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +11 month +1 year"));
            }elseif($request->expiry == "2年"){
                $expiry_date = date('y-m-d',strtotime($date." +2 year"));
            }elseif($request->expiry == "2年1ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +1 month +1 year"));
            }elseif($request->expiry == "2年2ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +2 month +2 year"));
            }elseif($request->expiry == "2年3ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +3 month +2 year"));
            }elseif($request->expiry == "2年4ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +4 month +2 year"));
            }elseif($request->expiry == "2年5ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +5 month +2 year"));
            }elseif($request->expiry == "2年6ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +6 month +2 year"));
            }elseif($request->expiry == "2年7ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +7 month +2 year"));
            }elseif($request->expiry == "2年8ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +8 month +2 year"));
            }elseif($request->expiry == "2年9ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +9 month +2 year"));
            }elseif($request->expiry == "2年10ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +10 month +2 year"));
            }elseif($request->expiry == "2年11ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +11 month +2 year"));
            }elseif($request->expiry == "3年"){
                $expiry_date = date('y-m-d',strtotime($date." +3 year"));
            }
        }

        //おすすめ登録にチェックが入っているか
        $recomend = $request->input("recomend_check");

        $cosmetic = new Cosmetic();
        $cosmetic->user_id = $userId;
        $cosmetic->name = $request->name;
        
        if(isset($image)){
            $cosmetic->image = $path[1];
        }else{
            $cosmetic->image = "default.jpg";
        }

        if(isset($expiry_date)){
            $cosmetic->expiry_date = $expiry_date;
        }
        if(isset($recomend)){
            $cosmetic->role = 1;
        }

        $cosmetic->type = $request->type;
        $cosmetic->company = $request->company;
        $cosmetic->get_date = $request->get_date;
        $cosmetic->open_date = $request->open_date;
        $cosmetic->expiry = $request->expiry;
        $cosmetic->memo = $request->memo;
        $cosmetic->comment = $request->comment;

        $cosmetic->save();

        return redirect()->route('show_register')->with('register_success','登録しました。');
        
    }

    //お気に入り
    public function favorite($id){

        $cosmetic = Cosmetic::find($id);
        $f_check = $cosmetic->favorite;
        if($f_check == 0){
            $cosmetic->favorite = 1; 
            $cosmetic->save();
            return redirect()->route('show_cosmetics_list');   
        }else{
            $cosmetic->favorite = 0;  
            $cosmetic->save();
            return redirect()->route('show_cosmetics_list');
        }

    }

    //検索付き
    public function show_cosmetics_list(Request $request){

        //ログイン中のユーザのもののみ表示
        // $cosmetics = Cosmetic::where('user_id',\Auth::user()->id)->paginate(18);
        if($request->sort == 1){
            $cosmetics = Cosmetic::where('user_id',\Auth::user()->id)->orderby('created_at','desc')->paginate(18);
            $sort = "作成日順";
        }elseif($request->sort == 2){
            $cosmetics = Cosmetic::where('user_id',\Auth::user()->id)
            ->whereNotNull('expiry_date')
            ->orderby('expiry_date','asc')
            ->paginate(18);
            $sort = "期限が近い順";
        }elseif($request->sort == 3){
            $cosmetics = Cosmetic::where('user_id',\Auth::user()->id)->where('favorite','=',1)->paginate(18);
            $sort = "お気に入りのみ";
        }elseif($request->sort == 4){
            $seven = Carbon::now()->addWeek(1);
            $now = Carbon::now();
            $cosmetics = Cosmetic::where('user_id',\Auth::user()->id)->whereDate('expiry_date',"<",$seven)
            ->whereDate('expiry_date',">",$now)
            ->whereNotNull('expiry_date')
            ->orderby('expiry_date','asc')
            ->paginate(18);
            $sort = "期限が近いもの";
        }else{
            $cosmetics = Cosmetic::where('user_id',\Auth::user()->id)->orderby('created_at')->paginate(18);
            $sort = "";
        }

        $search = $request->input('search');
        // $query = Cosmetic::where('user_id',\Auth::user()->id);
        $query = Cosmetic::where('user_id',\Auth::user()->id);
        // もし検索フォームにキーワードが入力されたら
        if ($search) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');
            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', '%'.$value.'%');
                // ->where('type', 'like', '%'.$value.'%');
                // ->orWhere('company', 'like', '%'.$value.'%');
                //繋ぎたいテーブルorwhereで繋ぐ
            }
            $cosmetics = $query->paginate(18);
        }


        

        return view('cosmetics.cosmetics_list')->with([
            'cosmetics' => $cosmetics,
            'search' => $search,
            'sort' => $sort,
        ]);

        
    }

    //化粧品詳細ページ表示
    public function cosmetics_detail($id){

        $cosmetic = Cosmetic::find($id);

        return view('cosmetics.cosmetics_detail',['cosmetic' => $cosmetic]);
    }

    //化粧品編集ページ表示
    public function show_cosmetics_edit($id){

        $cosmetic = Cosmetic::find($id);

        return view('cosmetics.cosmetics_edit',['cosmetic' => $cosmetic]);
    }


    //化粧品編集
    public function cosmetics_edit(Request $request,$id){

        $request->validate([
            'name' => 'required',
            'memo' => 'max:200',
            'comment' => 'max:200',
        ],
        [
            'name.required' => '商品名は必須入力です。',
            'memo.max' => '自分用メモは200文字以内でご入力ください。',
            'comment.max' => '公開用コメントは200文字以内でご入力ください。',
        ]);

        $userId = Auth::id();
        $image = $request->file('image');

        if($request->hasFile('image')){
            $path = \Storage::put('/public',$image);
            $path = explode('/',$path);
        }else{
            $path = null;
        }

        $recomend = $request->input("recomend_check");
        $open = $request->input("open_date");
        $get = $request->input("get_date");

        //開封日、入手日両方入力　もしくは　開封日のみ入力
        if(isset($open) && !isset($get) || isset($open) && isset($get)){
            //inputで送られた開封日をタイムスタンプに
            $date = $request->input("open_date");

            //expiryから日付計算
            if($request->expiry == "1ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +1 month"));
            }elseif($request->expiry == "2ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +2 month"));
            }elseif($request->expiry == "3ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +3 month"));
            }elseif($request->expiry == "4ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +4 month"));
            }elseif($request->expiry == "5ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +5 month"));
            }elseif($request->expiry == "6ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +6 month"));
            }elseif($request->expiry == "7ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +7 month"));
            }elseif($request->expiry == "8ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +8 month"));
            }elseif($request->expiry == "9ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +9 month"));
            }elseif($request->expiry == "10ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +10 month"));
            }elseif($request->expiry == "11ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +11 month"));
            }elseif($request->expiry == "1年"){
                $expiry_date = date('y-m-d',strtotime($date." +1 year"));
            }elseif($request->expiry == "1年1ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +1 month +1 year"));
            }elseif($request->expiry == "1年2ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +2 month +1 year"));
            }elseif($request->expiry == "1年3ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +3 month +1 year"));
            }elseif($request->expiry == "1年4ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +4 month +1 year"));
            }elseif($request->expiry == "1年5ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +5 month +1 year"));
            }elseif($request->expiry == "1年6ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +6 month +1 year"));
            }elseif($request->expiry == "1年7ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +7 month +1 year"));
            }elseif($request->expiry == "1年8ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +8 month +1 year"));
            }elseif($request->expiry == "1年9ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +9 month +1 year"));
            }elseif($request->expiry == "1年10ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +10 month +1 year"));
            }elseif($request->expiry == "1年11ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +11 month +1 year"));
            }elseif($request->expiry == "2年"){
                $expiry_date = date('y-m-d',strtotime($date." +2 year"));
            }elseif($request->expiry == "2年1ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +1 month +1 year"));
            }elseif($request->expiry == "2年2ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +2 month +2 year"));
            }elseif($request->expiry == "2年3ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +3 month +2 year"));
            }elseif($request->expiry == "2年4ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +4 month +2 year"));
            }elseif($request->expiry == "2年5ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +5 month +2 year"));
            }elseif($request->expiry == "2年6ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +6 month +2 year"));
            }elseif($request->expiry == "2年7ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +7 month +2 year"));
            }elseif($request->expiry == "2年8ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +8 month +2 year"));
            }elseif($request->expiry == "2年9ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +9 month +2 year"));
            }elseif($request->expiry == "2年10ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +10 month +2 year"));
            }elseif($request->expiry == "2年11ヶ月"){
                $expiry_date = date('y-m-d',strtotime($date." +11 month +2 year"));
            }elseif($request->expiry == "3年"){
                $expiry_date = date('y-m-d',strtotime($date." +3 year"));
            }
        }
        //開封日も入手日も入っていた場合
        // if(!isset($open) && isset($get)){

        //     $date = $request->input("get_date");

        //     if($request->expiry == "1ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +1 month"));
        //     }elseif($request->expiry == "2ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +2 month"));
        //     }elseif($request->expiry == "3ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +3 month"));
        //     }elseif($request->expiry == "4ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +4 month"));
        //     }elseif($request->expiry == "5ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +5 month"));
        //     }elseif($request->expiry == "6ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +6 month"));
        //     }elseif($request->expiry == "7ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +7 month"));
        //     }elseif($request->expiry == "8ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +8 month"));
        //     }elseif($request->expiry == "9ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +9 month"));
        //     }elseif($request->expiry == "10ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +10 month"));
        //     }elseif($request->expiry == "11ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +11 month"));
        //     }elseif($request->expiry == "1年"){
        //         $expiry_date = date('y-m-d',strtotime($date." +1 year"));
        //     }elseif($request->expiry == "1年1ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +1 month +1 year"));
        //     }elseif($request->expiry == "1年2ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +2 month +1 year"));
        //     }elseif($request->expiry == "1年3ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +3 month +1 year"));
        //     }elseif($request->expiry == "1年4ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +4 month +1 year"));
        //     }elseif($request->expiry == "1年5ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +5 month +1 year"));
        //     }elseif($request->expiry == "1年6ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +6 month +1 year"));
        //     }elseif($request->expiry == "1年7ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +7 month +1 year"));
        //     }elseif($request->expiry == "1年8ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +8 month +1 year"));
        //     }elseif($request->expiry == "1年9ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +9 month +1 year"));
        //     }elseif($request->expiry == "1年10ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +10 month +1 year"));
        //     }elseif($request->expiry == "1年11ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +11 month +1 year"));
        //     }elseif($request->expiry == "2年"){
        //         $expiry_date = date('y-m-d',strtotime($date." +2 year"));
        //     }elseif($request->expiry == "2年1ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +1 month +1 year"));
        //     }elseif($request->expiry == "2年2ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +2 month +2 year"));
        //     }elseif($request->expiry == "2年3ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +3 month +2 year"));
        //     }elseif($request->expiry == "2年4ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +4 month +2 year"));
        //     }elseif($request->expiry == "2年5ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +5 month +2 year"));
        //     }elseif($request->expiry == "2年6ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +6 month +2 year"));
        //     }elseif($request->expiry == "2年7ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +7 month +2 year"));
        //     }elseif($request->expiry == "2年8ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +8 month +2 year"));
        //     }elseif($request->expiry == "2年9ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +9 month +2 year"));
        //     }elseif($request->expiry == "2年10ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +10 month +2 year"));
        //     }elseif($request->expiry == "2年11ヶ月"){
        //         $expiry_date = date('y-m-d',strtotime($date." +11 month +2 year"));
        //     }elseif($request->expiry == "3年"){
        //         $expiry_date = date('y-m-d',strtotime($date." +3 year"));
        //     }
        // }
        // if
        
        
        $cosmetic = Cosmetic::find($id);
        $cosmetic->user_id = $userId;
        $cosmetic->name = $request->name;
        if(isset($image)){
            $cosmetic->image = $path[1];
        }
        if(isset($expiry_date)){
            $cosmetic->expiry_date = $expiry_date;
        }
        if(isset($recomend)){
            $cosmetic->role = 1;
        }else{
            $cosmetic->role = 0;
        }
        $cosmetic->type = $request->type;
        $cosmetic->company = $request->company;
        $cosmetic->get_date = $request->get_date;
        $cosmetic->open_date = $request->open_date;
        $cosmetic->expiry = $request->expiry;
        $cosmetic->memo = $request->memo;
        $cosmetic->comment = $request->comment;
        $cosmetic->save();

        return redirect()->route('show_cosmetics_edit',$id)->with('edit_success','編集完了しました。');
    }
    //削除画面表示
    public function show_cosmetics_delete($id){

        $cosmetic = Cosmetic::find($id);

        return view('cosmetics.cosmetics_delete',['cosmetic' => $cosmetic]);
    }

    //化粧品削除
    public function cosmetics_delete($id){

        Cosmetic::destroy($id);

        return view('cosmetics.cosmetics_delete_complete');
    }



    //おすすめ一覧
    public function recomend_list(Request $request){

        //カウント,おすすめに登録
        $cosmetics = Cosmetic::withCount('likes')->whereRole(1)->paginate(18);

        if($request->sort == 1){

            $cosmetics = Cosmetic::withCount('likes')->whereRole(1)->orderby('created_at')->paginate(18);
            $sort = "作成日順";

        }elseif($request->sort == 2){

            $cosmetics = Cosmetic::join('likes','cosmetics.id','=','likes.cosmetic_id')->where('likes.user_id',\Auth::user()->id)->withCount('likes')->get();
            
            $sort = "いいねのみ";
        }else{
            $cosmetics = Cosmetic::withCount('likes')->whereRole(1)->paginate(18);
            $sort = "";
        }

        $search = $request->input('search');
        $query = Cosmetic::withCount('likes')->whereRole(1);
        // もし検索フォームにキーワードが入力されたら
        if ($search) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');
            // 単語を半角スペースで区切り、配列にする
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', '%'.$value.'%')
                ->orWhere('type', 'like', '%'.$value.'%')
                ->orWhere('company', 'like', '%'.$value.'%');
                //繋ぎたいテーブルorwhereで繋ぐ
            }
            $cosmetics = $query->paginate(18);
        }

        return view('cosmetics.recomend_list')->with([
            'cosmetics' => $cosmetics,
            'search' => $search,
        ]);
    }

    //おすすめ詳細ページ表示
    public function recomend_detail($id){

        // $cosmetic = Cosmetic::find($id);
        // $cosmetic = Cosmetic::find($id);
        $cosmetic = Cosmetic::find($id)->whererole(1)->withCount('likes')->first();

        return view('cosmetics.recomend_detail')->with([
            'cosmetic' => $cosmetic
        ]);
    }

    //おすすめ確認画面
    public function confirm_recomend(Request $request,$id){

        $cosmetic = Cosmetic::find($id);


        return view('cosmetics.recomend_confirm',['cosmetic' => $cosmetic]);
    }

    //おすすめ完了画面
    public function complete_recomend(Request $request,$id){

        $cosmetic = Cosmetic::find($id);
        $cosmetic->role = 1;
        $cosmetic->comment = $request->comment;

        $cosmetic->save();


        return view('cosmetics.recomend_complete',['cosmetic' => $cosmetic]);
    }

    //おすすめ解除一覧から
    public function recomend_unregist_for_detail($id){

        $cosmetic = Cosmetic::find($id);
        $cosmetic->role = 0;
        $cosmetic->save();

        return redirect()->route('cosmetics_detail',$id)->with('unregist_success','登録解除しました。');
    }

    //おすすめ解除詳細から
    public function recomend_unregist_for_list($id){

        $cosmetic = Cosmetic::find($id);
        $cosmetic->role = 0;
        $cosmetic->save();

        return redirect()->route('show_cosmetics_list',$id)->with('unregist_success','登録解除しました。');
    }

    //いいね機能
    public function like(Request $request){
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $cosmetic_id = $request->cosmetic_id; //2.投稿idの取得
        $already_liked = Like::where('user_id', $user_id)->where('cosmetic_id', $cosmetic_id)->first(); //3.

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Like; //4.Likeクラスのインスタンスを作成
            $like->cosmetic_id = $cosmetic_id; //Likeインスタンスにcosmetic_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('cosmetic_id', $cosmetic_id)->where('user_id', $user_id)->delete();
        }
        //5.この投稿の最新の総いいね数を取得
        $cosmetic_likes_count = Cosmetic::withCount('likes')->findOrFail($cosmetic_id)->likes_count;
        $param = [
            'cosmetic_likes_count' => $cosmetic_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
    }

}
