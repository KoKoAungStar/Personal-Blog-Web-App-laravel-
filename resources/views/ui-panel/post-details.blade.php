@extends('ui-panel.master')
@section('title', 'Posts')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 post-details">
                <img src="{{ asset('storage/post-images/'.$post->image) }}" style="width:700px; height:350px; 
                border: 1px solid gray" alt="">
                <br><br>
                <small>
                    <strong>
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        Posted On:
                    </strong>
                    {{ date('d-M-Y', strtotime($post->created_at)) }}
                </small>
                <br>
                <br>
                <small>
                    <strong>
                        <i class="fa fa-list"></i> Category:
                    </strong>
                    {{ $post->category->name}}
                </small>
                <br><br>
                <h5><strong>{{ $post->title }}</strong></h5>
                <p style="text-align: justify;">
                    {{ $post->content }}
                </p>
                <div>
                    <form method="POST">  
                        @csrf
                        <div>
                            <span>{{ $likes->count()}} likes</span> &nbsp; &nbsp;
                            <span>{{ $dislikes->count()}} dislike</span> &nbsp; &nbsp;
                            <span>{{ $comments->count() }} comments</span>
                        </div>
                        <button type="submit" formaction="{{ url('/post/like/'.$post->id) }}" class="btn btn-sm btn-success like"
                            @if($likeStatus)
                            @if($likeStatus->type == 'like')
                                disabled
                            @endif          
                            @endif                  >
                
                            <i class="far fa-thumbs-up"></i> Like 
                        </button>
                        
                        <button type="submit" formaction="{{ url('/post/dislike/'.$post->id) }}" class="btn btn-sm btn-danger like"
                            @if($likeStatus)
                            @if($likeStatus->type == 'dislike')
                                disabled
                            @endif
                            @endif
                            >
                            <i class="far fa-thumbs-down"></i> unlike 
                        </button>

                        <button type="button" class="btn btn-sm btn-info comment" data-toggle="collapse" data-target="#collapseExample">
                            <i class="far fa-comment"></i> Comment
                        </button>
                    </form>
                </div>
                <br>
                <div class="comment-form">
                    <div class="collapse" id="collapseExample">
                        <form action="{{ url('post/comment/'.$post->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="text" id="" cols="30" rows="3" required></textarea>
                                <br>
                                <button class="btn btn-primary btn-sm">
                                    <i class="far fa-paper-plane"></i> Submit
                                </button>
                            </div>
                        </form>
                        <br>
                        @foreach ($comments as $comment)
                        <div class="comment-show">
                            <img src="{{ asset('images/yms.jpg')}}" alt="" width="30px"> {{ $comment->user->name}}
                            <div class=" comment-box mt-2">
                                {{ $comment->text}}
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
