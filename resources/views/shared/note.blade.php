@php
    $hint = $hint ?? null;
@endphp

<div class="sp-card-container mb-3">
    <div class="sp-card">
        @auth
            @if($note->user_id == Auth::id())
                <div class="dropdown sp-options-menu">
                    <button class="btn btn-outline-dark border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('note.destroy', $note->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="dropdown-item" type="submit">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
        @endauth
        <a href="{{ route('note.show', $note->id) }}" class="sp-hidden-link">
            <h1>{{ $note->title }}</h1>
        </a>
        <hr class="sp-card-line">
        <div class="sp-card-inner">
            <div>
                <p class="d-inline">By </p>
                <a href="">{{ $note->user->name }}</a>
            </div>
            <p class="mt-2">{{ $note->note_content }}</p>
        </div>
        <div class="d-flex justify-content-around mt-2">
            <form action="" method="POST">
                @csrf
                <div>
                    <button type="submit" class="btn"><i class="fa-regular fa-heart"></i></button>
                </div>
            </form>
            <form action="" method="POST">
                @csrf
                <div>
                    <button type="submit" class="btn"><i class="fa-regular fa-comment"></i></button>
                </div>
            </form>
            <form action="" method="POST">
                @csrf
                <div>
                    <button type="submit" class="btn"><i class="fa-regular fa-share-from-square"></i></button>
                </div>
            </form>
        </div>
        <hr class="sp-card-line-sm">
        @auth
            <div class="mt-3">
                <form id="comment-form" action="{{ route('note.comment.store') }}" method="POST">
                    @csrf
                    <div class="d-flex">
                        <input type="hidden" name="note_id" value="{{ $note->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="input-group">
                            <textarea id="content" class="form-control sp-form-textarea" name="comment_content"
                                oninput="updateCharCount()" style="resize: none;" maxlength="256"></textarea>
                            <button type="submit" class="btn btn-outline-dark me-3"><i class="fa-solid fa-pen"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        @endauth
        <div>
            @if ($hint == "show")
                @foreach ($note->comments as $comment)
                    @include("shared.comment")
                @endforeach
            @else
                    @if (sizeof($note->comments) >= 1)
                            @php
                                $comment = $note->comments[0]
                            @endphp
                            @include("shared.comment")
                    @endif
                    @if (sizeof($note->comments) > 1)
                        <div class="mt-2">
                            <a href="{{ route('note.show', $note->id) }}">More comments...</a>
                        </div>
                    @endif
            @endif
        </div>
    </div>
</div>