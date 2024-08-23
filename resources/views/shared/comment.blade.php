<div class="mt-2 d-flex position-relative">
    @auth
        @if($comment->user_id == Auth::id())
            <div class="dropdown sp-options-menu">
                <button class="btn btn-outline-dark border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <form action="{{ route('note.comment.destroy', $comment->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="dropdown-item" type="submit">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    @endauth
    <div class="px-2"><i class="fa-solid fa-user user-profile me-2"></i></div>
    <div class="sp-card-inner">
        <div class="d-flex align-items-center">
            <a href="{{ route('user.show', $comment->user_id) }}">{{ $comment->user->name }}</a>
        </div>
        <p class="mt-2">{{ $comment->comment_content }}</p>
    </div>
</div>