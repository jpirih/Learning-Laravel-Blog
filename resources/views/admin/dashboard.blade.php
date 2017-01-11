@extends('base')

@section('title')
    Admin Dashboard
@endsection

@section('page-heading')
    Kekec-apps Admin Dashboard
@endsection


@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        <div class="alert alert-info">
            <span class="glyphicon glyphicon-info-sign"></span>
            Adminstratorjev pogled na celotno dogajanje
        </div>
        <hr>
        <!-- dashboard navigation -->
        <div class="btn-group btn-group-lg" role="group" aria-label="...">
            <a href="{{ route('admin-users') }}" class="btn btn-default">Users</a>
            <a href="{{ route('admin-blog') }}" class="btn btn-default">Blog</a>
            <a href="http://finance.kekec-apps.com" class="btn btn-default">Moje Finance</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-xs-offset-3">
            <h3>Quick overview</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
           <div class="default-box">
               <h4>Posts</h4>
               <table class="table table-responsive table-striped  table-bordered table-condensed">
                   <thead>
                   <tr class="table-header">
                       <th>Post Titile</th>
                       <th>Published</th>
                       <th>Author</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($recentPosts as $post)
                       <tr>
                           <td><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></td>
                           <td>{{ $post->date_published }}</td>
                           <td><a href="{{ route('user.profile', ['id' => $post->user->id])}}">{{ $post->user->nickname }}</a></td>
                       </tr>
                   @endforeach
                   </tbody>
               </table>

           </div>
        </div>
        <div class="col-xs-6">
            <div class="default-box">
                <h4>Comments</h4>
                <table class="table table-responsive table-striped  table-bordered table-condensed">
                    <thead>
                    <tr class="table-header">
                        <th>Comment Title</th>
                        <th>Published</th>
                        <th> Commented by</th>
                        <th>Post title</th>
                        <th>Written by</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recentComments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->created_at->format('d.m.y@H:i:s') }}</td>
                            <td>{{ $comment->user->nickname }}</td>
                            <td>{{ $comment->post->title }}</td>
                            <td>{{ $comment->post->user->nickname }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                <a href="{{ route('comments') }}" class="btn btn-primary btn-lg" role="button">
                    All comments
                </a>
            </div>
        </div>
    </div>

@endsection