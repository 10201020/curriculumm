@extends('layouts.admin')
@section('title', 'つぶやき')

@section('content')
    <div class="container">

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
                    
                    {{ Auth::user()->name }}
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="10">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    
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
                                <th width="40%">本文</th>
                                <th width="10%">操作</th>
                                <th width="10%">投稿日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- $acount = $t->user_id -->
                            @foreach($posts as $t)
                            
                            <tr>
                                    <!-- @foreach($users as $user) -->
                                    <!-- <th>{{ $t->id }}</th> -->
                                    <!-- <td>{{ $user->id}}</td> -->
                                    <!-- @endforeach -->
                                    <!-- select name from users where id = 25; -->
                                    <!-- <td>select $users->name from users where id = ($t->user_id)</td> -->
                                    <td>{{ $user->name }}</td>
                                    <td>{{ str_limit($t->body, 250) }}</td>
                                    <td>

                                        @if(Auth::user()->id == $t->user_id)
                                            <div>
                                                <a href="{{ action('Admin\TController@edit', ['id' => $t->id]) }}">編集</a>
                                            </div>
                                            <div>
                                                <a href="{{ action('Admin\TController@softdelete', [$t->id]) }}">削除</a>
                                            </div>
                                        @endif

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