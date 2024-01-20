@php
    use App\Http\Controllers\ProjectController;
    $full_name = $comment->user->getFullName();
    $date = date('M. d, Y', strtotime($comment->created_at));
    $is_admin = app(ProjectController::class)->isAdmin($comment->task->project->id, $comment->user->id);
@endphp

<div class="w-[38rem] flex flex-col justify-start items-start bg-gray-100  rounded-xl p-4 gap-3 shadow-project">
    <div class="flex justify-start items-center gap-2">
        <x-project-card.circle name="{{$full_name}}" url="{{$comment->user->profile_photo_path}}"/>
        <div class="flex flex-col justify-start items-start">
            <div class="flex justify-start items-center gap-1">
                @if($is_admin)
                <x-icons.crown size="16" />
                @endif
                <p class="font-semibold">{{$full_name}}</p>
            </div>
            <p class="text-xs text-dark-gray">{{$date}}</p>
        </div>
    </div>
    <p class="text-sm">{{$comment->content}}</p>
</div>