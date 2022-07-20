@extends('layouts.admin')
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <!-- <div class="row">
            <h2>ニュース一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\TController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\TController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div> -->

        <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>つぶやき</h2>
                <form action="{{ action('Admin\TController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <!-- <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="user_id" value="{{ old('user_id') }}">
                        </div>
                    </div> -->
                    {{ Auth::user()->name }}
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="10">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div> -->
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="つぶやく">
                </form>

                
            </div>
        </div>
    </div>


        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <!-- <th width="10%">ID</th> -->
                                <th width="20%">名前</th>
                                <th width="50%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($posts as $t)
                                <tr>
                                    <!-- <th>{{ $t->id }}</th> -->
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ str_limit($t->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\TController@edit', ['id' => $t->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\TController@delete', ['id' => $t->id]) }}">削除</a>
                                        </div>
                                        <td>{{ str_limit($t->created_at, 250) }}</td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection