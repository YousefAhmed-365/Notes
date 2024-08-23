@extends("layouts.layout")
@section("content")
<section id="user-hero" class="sp-card mb-3 position-relative">
    @auth
        @if($user->id == Auth::id())
            <div class="dropdown sp-options-menu">
                <button class="btn btn-outline-dark border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <button class="dropdown-item" type="submit" onclick="toggleModal(event)"
                            sp-target="user-edit-modal">Edit</button>
                    </li>
                </ul>
            </div>
        @endif
        <div id="user-edit-modal" class="sp-modal">
            <div class="sp-card">
                <form action="{{ route('user.edit', $user->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <textarea type="text" name="user_description" style="resize: none;"
                            class="form-control sp-form-textarea-lg @error('user_description') is-invalid @enderror"
                            placeholder="Description..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-dark w-100"><span><i
                                class="fa-solid fa-pen"></i></span></button>
                </form>
            </div>
        </div>
    @endauth
    <div class="d-flex align-items-center">
        <i class="fa-solid fa-user user-profile"></i>
        <p class="mb-0 ms-2 sp-hidden-link">{{ $user->name }}</p>
    </div>
    <hr class="sp-card-line">
    <small>Joined At {{ $user->created_at->format('Y F d') }}</small>
    <div class="mt-3">
        <p>Description</p>
        <div class="sp-card-inner">
            <p class="mb-0">{{ $user->user_description }}</p>
        </div>
    </div>
</section>
<section id="notes-section" class="sp-card-container">
    @foreach ($user->notes as $note)
        @include("shared.note")
    @endforeach
</section>
@endsection