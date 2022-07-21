<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\T;
use App\User;
use App\History;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class TController extends Controller
{
    public function add()
  {
      return view('admin.t.create');
      return view('admin.t.login');
  }
  
  public function create(Request $request)
  {

      // 以下を追記
      // Varidationを行う
      $this->validate($request, T::$rules);

      $t = new T;
      $form = $request->all();

      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
    //   if (isset($form['image'])) {
    //     $path = $request->file('image')->store('public/image');
    //     $t->image_path = basename($path);
    //   } else {
    //       $t->image_path = null;
    //   }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $t->fill($form);
      $t->save();

      return redirect('admin/t/');
  }
  // 以下を追記
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = T::where('user_id', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = T::all();
          $users = User::all();
      }
      return view('admin.t.index', ['posts' => $posts, 'cond_title' => $cond_title, 'users' => $users]);
  }
  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $t = T::find($request->id);
      if (empty($t)) {
        abort(404);    
      }
      return view('admin.t.edit', ['t_form' => $t]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, T::$rules);
      // News Modelからデータを取得する
      $t = T::find($request->id);
      // 送信されてきたフォームデータを格納する
      $t_form = $request->all();
      if (isset($t_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $t->image_path = basename($path);
        unset($t_form['image']);
      } elseif (0 == strcmp($request->remove, 'true')) {
        $t->image_path = null;
      }
      unset($t_form['_token']);
      unset($t_form['remove']);

      // 該当するデータを上書きして保存する
      $t->fill($t_form)->save();

        $history = new History;
        $history->t_id = $t->id;
        $history->edited_at = Carbon::now();
        $history->save();

      return redirect('admin/t');
  }


  public function softdelete()
  {
      // 該当するNews Modelを取得
      T::find(Auth::id());
      // $t = T::find($request->id);
      // 削除する
      // $t->delete();
      return redirect('admin/t/');
  }  
}
