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
        <a href="{{ route('note.show', $note->id) }}" class="sp-hidden-link sp-header">
            <h1>{{ $note->title }}</h1>
        </a>
        <hr class="sp-card-line">
        <div class="sp-card-inner">
            <div>
                <p class="d-inline">By </p>
                <a href="{{ route('user.show', $note->user_id) }}">{{ $note->user->name }}</a>
            </div>
            <p class="mt-2">{{ $note->note_content }}</p>
        </div>
        <div class="d-flex justify-content-evenly mt-2">
            <form action="{{ route('note.like.toggle', $note->id) }}" method="POST">
                @csrf
                @method($note->likes()->where('user_id', auth()->id())->exists() ? 'DELETE' : 'POST')
                <div class="sp-display-icon">
                    @if($note->likes()->where('user_id', auth()->id())->exists())
                        <button type="submit" class="btn sp-icon-button">
                            <i class="fa-solid fa-heart"></i>
                        </button>
                    @else
                        <button type="submit" class="btn sp-icon-button">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    @endif
                    <p>{{ Number::abbreviate(sizeof($note->likes)) }}</p>
                </div>
            </form>
            <form action="{{ route('note.show', $note->id) }}" method="GET">
                @csrf
                <div class="sp-display-icon">
                    <button type="submit" class="btn sp-icon-button">
                        <i class="fa-regular fa-comment sp-icon-default"></i>
                    </button>
                    <p>{{ Number::abbreviate(sizeof($note->comments)) }}</p>
                </div>
            </form>
            <div>
                <div>
                    <button class="btn sp-icon-button" onclick="toggleModal(event)" sp-target="note-share-modal-{{ $note->id }}">
                        <i class="fa-regular fa-share-from-square"></i>
                    </button>
                </div>
                <div id="note-share-modal-{{ $note->id }}" class="sp-modal">
                    <div class="sp-card">
                        <div class="mb-3">
                            <input id="note-share-input" type="text" class="form-control" value="{{ route('note.show', $note->id) }}" disabled readonly>
                        </div>
                        <button type="submit" onclick="copyText(event)" sp-target="note-share-input" class="btn btn-outline-dark w-100">
                            <span>Copy Link</span>
                        </button>
                    </div>
                </div>
            </div>
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