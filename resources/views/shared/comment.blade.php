<div class="mt-2 d-flex position-relative">
    @auth
        @if($comment->user_id == Auth::id())
            <div class="dropdown sp-options-menu">
                <button class="btn btn-outline-dark border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <button class="dropdown-item" onclick="toggleModal(event)"
                            sp-target="comment-edit-modal-{{ $comment->id }}">Edit</button>
                    </li>
                    <li>
                        <form action="{{ route('note.comment.destroy', $comment->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="dropdown-item" type="submit">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div id="comment-edit-modal-{{ $comment->id }}" class="sp-modal">
                <div class="sp-card">
                    <form action="{{ route('note.comment.update', $comment->id) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <textarea type="text" name="comment_content" style="resize: none;"
                                class="form-control sp-form-textarea-lg @error('comment_content') is-invalid @enderror"
                                placeholder="Description...">{{ $comment->comment_content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-dark w-100">Edit</button>
                    </form>
                </div>
            </div>
        @endif
    @endauth
    <div class="px-2"><i class="fa-solid fa-user user-profile me-2"></i></div>
    <div class="sp-card-inner">
        <div class="d-flex align-items-center">
            <a href="{{ route('user.show', $comment->user_id) }}">{{ $comment->user->name }}</a>
            @if ($comment->created_at != $comment->updated_at)
                <small>- edited</small>
            @endif
        </div>
        <p class="mt-2">{{ $comment->comment_content }}</p>
    </div>
</div>