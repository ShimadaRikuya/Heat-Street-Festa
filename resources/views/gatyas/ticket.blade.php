<h4 class="title_ticket">チケット</h4>

<div class="row">
    @if ($tiket)
        <div class="d-flex align-items-center gap-3">

            <div>{{ $user->gatya->name }}</div>
            
            <div class="tikct_zone">
                @if(Auth::user()->gatya_id === $tiket->id)
                    <form action="{{ route('gatyas.update', $tiket->id) }}" method="POST">
                        @csrf

                        <button type="submit" class="ml-2 btn btn-success">使用する</button>
                    </form>
                @else
                    <button type="submit" class="ml-2 btn btn-light" disabled>使用済</button>
                @endif
            </div>
        </div>
    @else
    所持チケットは存在しません
    @endif

</div>