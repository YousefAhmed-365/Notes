@extends("layouts.layout")

@section("content")
@auth
    <form method="POST" action="{{ route('auth.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endauth
<section id="create-note-section" class="sp-card-container mb-3">
    <div>
        @auth
            <div class="sp-card d-flex align-items-center">
                <div class="px-2"><i class="fa-solid fa-user user-profile me-2"></i></div>
                <div id="create-note-button" class="sp-card-inner" onclick="toggleModal(event)"
                    sp-target="note-create-modal">
                    <p class="mb-0">Write a note...</p>
                </div>
                <!-- <button class="btn btn-outline-dark" onclick="toggleModal(event)" sp-target="note-create-modal"><span><i
                                        class="fa-solid fa-pen"></i></span></button> -->
            </div>
            <div id="note-create-modal" class="sp-modal">
                <div class="sp-card">
                    <form action="{{ route('note.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <textarea type="text" name="note_content" style="resize: none;"
                                class="form-control sp-form-textarea-lg @error('note_content') is-invalid @enderror"
                                placeholder="How's the wheather today?..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-dark w-100"><span><i
                                    class="fa-solid fa-pen"></i></span></button>
                    </form>
                </div>
            </div>
        @endauth
        @guest
            <div class="sp-card">
                <p class="mb-0 text-center">
                    <a href="{{ route('auth.loginIndex') }}">Log in</a>
                    or
                    <a href="{{ route('auth.registerIndex') }}">Register</a>
                    to create notes.
                </p>
            </div>
        @endguest
    </div>
</section>
<section id="info-section">
    @if (session("query"))
        <h3>Search Results for "{{ session("query") }}"...</h3>
    @endif
</section>
<section id="notes-section" class="sp-card-container">
    @foreach ($notes as $note)
        @include("shared.note")
    @endforeach
</section>
@endsection