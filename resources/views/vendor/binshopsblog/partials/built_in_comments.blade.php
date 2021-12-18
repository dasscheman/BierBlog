@forelse($comments as $comment)
    <div class="card bg-light mb-3">
        <div class="card-header">
            {{$comment->author()}}
            @if(config("binshopsblog.comments.ask_for_author_website") && $comment->author_website)
                (<a href='{{$comment->author_website}}' target='_blank' rel='noopener'>@lang('blog.website')</a>)
            @endif

            <span class="float-right" title='{{$comment->created_at}}'><small>{{$comment->created_at->diffForHumans()}}</small></span>
        </div>
        <div class="card-body bg-white">
            <p class="card-text">{!! nl2br(e($comment->comment))!!}</p>
        </div>
    </div>
@empty
    <div class='alert alert-info'>@lang('blog.no_comments_yet')</div>
@endforelse

@if(count($comments)> config("binshopsblog.comments.max_num_of_comments_to_show",500) - 1)
    <p><em>@lang('blog.number_of_comments_shown', ['max_comments' => config("binshopsblog.comments.max_num_of_comments_to_show",500)])</em>
    </p>
@endif

