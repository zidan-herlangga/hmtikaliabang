<div class="p-2">
    {{-- Commenter Info Section --}}
    <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
        <img src="{{ asset('uploads/author/' . ($comment->user ? $comment->user->profile : 'default.webp')) }}"
            alt="Avatar" class="profile-user-img img-circle img-bordered-sm elevation-2"
            style="width: 50px; height: 50px; object-fit: cover;">
        <div class="ml-3">
            <h5 class="mb-0 font-weight-bold text-dark">
                {{ $comment->user ? $comment->user->name : $comment->name }}
            </h5>
            <span class="text-muted text-sm">
                {{ $comment->user ? $comment->user->email : $comment->email }}
            </span>
        </div>
        <span class="ml-auto badge {{ $comment->user ? 'badge-primary' : 'badge-secondary' }}">
            {{ $comment->user ? 'Registered User' : 'Guest' }}
        </span>
    </div>

    {{-- Comment Content --}}
    <div class="mb-4">
        <h6 class="text-uppercase text-muted text-xs mb-2">Comment Message</h6>
        <div class="p-3 bg-light rounded border" style="white-space: pre-wrap;">
            {{ $comment->message }}
        </div>
    </div>

    {{-- Details Grid --}}
    <dl class="row mb-0">
        <dt class="col-sm-4 text-muted">Comment Type</dt>
        <dd class="col-sm-8">
            @if (!$comment->parent_id)
                <span class="badge badge-info"><i class="fas fa-comment mr-1"></i> Main Comment</span>
            @else
                <span class="badge badge-dark"><i class="fas fa-reply mr-1"></i> Reply</span>
            @endif
        </dd>

        <dt class="col-sm-4 text-muted">Related Post</dt>
        <dd class="col-sm-8">
            <div class="text-truncate" style="max-width: 250px;" title="{{ $comment->post->title ?? 'Post Deleted' }}">
                {{ $comment->post->title ?? 'Post Deleted' }}
            </div>
        </dd>

        <dt class="col-sm-4 text-muted">Post Status</dt>
        <dd class="col-sm-8">
            @if ($comment->post)
                <span class="badge {{ $comment->post->status ? 'badge-success' : 'badge-danger' }}">
                    {{ $comment->post->status ? 'Published' : 'Draft' }}
                </span>
            @else
                <span class="badge badge-dark">N/A</span>
            @endif
        </dd>

        <dt class="col-sm-4 text-muted">Submitted On</dt>
        <dd class="col-sm-8">
            {{ $comment->created_at->format('d F, Y - h:i A') }}
        </dd>
    </dl>
</div>
