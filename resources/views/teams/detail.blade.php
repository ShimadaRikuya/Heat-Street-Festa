@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="row">
    <div class="box">
        <div class="title border rounded-pill"><h3 class="title-inner">主催者の管理</h3></div>

        <!-- チーム名 --->
        <section class="section organizer_name mt-5">
            <div class="section-inner organizer_name text-center">
                <h1>{{ $team->name }}</h1>
            </div>
        </section>

        <!-- イベント一覧 --->
        <section class="section event">
            <div class="section-inner">
                <div class="title"><h2 class="title-inner text-center">イベントの管理</h2></div>
                <div class="event text-start">
                    @foreach($team->events as $event)
                        <div class="event-inner d-flex justify-content-between mb-3">
                            <div class="event-inner-img d-flex align-items-center">
                                <a href="{{ route('events.show', $event->id) }}">
                                    <img class="img-fluid" src="{{ asset($event->image_uploader) }}" alt="Card image cap">
                                </a>
                            </div>
                            <div class="event-inner-filed">
                                <h5 class="title pt-4 text-truncate" style="max-width: 300px;">{{ $event->title }}</h5>
                                <p class="text">2022/01/01</p>
                            </div>
                            <div class="event-inner-button d-flex align-items-center">
                                <input
                                    type="button" 
                                    onclick="location.href='{{ route('events.edit', $event->id) }}'" 
                                    class="edit_event btn btn-light" 
                                    value="編集"
                                />
                                @if(Auth::user()->id === $team->user_id)
                                    <form class="delete_event" method="post" action="{{ route('events.destroy', $event) }}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-light" value="削除">
                                    </form>
                                @else
                                    <button type="submit" class="btn btn-light" disabled>削除</button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- メンバー管理 --->
        <section class="section add_member">
            <div class="section-inner">
                <div class="member_title"><h2 class="title-inner text-center">メンバーの管理</h2></div>
                <ul class="event_organizer_list list-group list-unstyled mt-4">
                    @foreach($team->users as $team_user)
                        <li class="border-top border-bottom">
                            <div class="event_organizer_list_item p-2">
                                <div>{{ $team_user->name }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <!-- クリックしたらモーダルを表示するボタン -->
                <div class="pt-3 d-grid gap-2 col-6 mx-auto">
                    <button class="modal-toggle btn btn-success" href="#" role="button" data-modal="modalOne">メンバーの追加</button>
                </div>
                
                <!-- モーダルウィンドウ -->
                <div id="modalOne" class="modal">
                    <div class="modal-content">
                        <div class="modal-top">
                            <span class="modal-close">x</span>
                        </div>
                    
                        <div class="modal-container">
                            @include('teams.invitationform')
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- 主催者情報 --->
        <section class="section organizer_info">
            <div class="section-inner">
                <div class="title"><h3 class="title-inner text-center">主催者情報</h3></div>
                <div class="organizer text-start pt-4">
                    <div class="organizer_team_name">
                        <h6>主催者名</h6>
                        <p>{{ $team->user->name }}</p>
                    </div>
                    <div class="organizer_phone mt-5">
                        <h6>問い合わせ電話番号</h6>
                        <p>{{ $team->phone }}</p>
                    </div>
                    <div class="organizer_email mt-5">
                        <h6>問い合わせメールアドレス</h6>
                        <p>{{ $team->email }}</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection