<div class="title">チケット</div>

<div class="row">
    @if ($tiket)
        <div class="d-flex">
            {{ $user->gatya->name }}
            @if(Auth::user()->gatya_id === $tiket->id)
                <form action="{{ route('gatyas.update', $tiket->id) }}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-success">使用する</button>
                </form>
            @else
                <button type="submit" class="btn btn-light" disabled>使用済</button>
            @endif
        </div>
    @else
    所持チケットは存在しません
    @endif

</div>