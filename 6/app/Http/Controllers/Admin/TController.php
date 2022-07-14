<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\T;

class TController extends Controller
{
    public function add()
  {
      return view('admin.t.create');
  }
  public function create(Request $request)
  {

      // 以下を追記
      // Varidationを行う
      $this->validate($request, T::$rules);

      $t = new T;
      $form = $request->all();

      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $t->image_path = basename($path);
      } else {
          $t->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $t->fill($form);
      $t->save();

      return redirect('admin/t/create');
  }
}
