<?php
    use App\Http\Controllers\GlobalDeclare;
    $global = new GlobalDeclare();
?>

<div class="favorite-list-item">
    @if($user)
        <div data-id="{{ $global->base64encode($user->id) }}" data-action="0" class="avatar av-m"
            style="background-image: url('{{asset('storage/images/client/photo/'.$user->profile)}}');">
        </div>
        <p>{{ strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name }}</p>
    @endif
</div>
