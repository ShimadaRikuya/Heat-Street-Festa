@if (count($teams) > 0)
    <div class="card-body">
        <div class="card-body">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <th>チーム一覧</th>
                    <th>オーナー</th>
                    <th>参加人数</th>
                    <th>詳細</th>
                    <th>参加</th>
                    <th>編集</th>
                </thead>
                <!-- テーブル本体 -->
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <!-- チーム名 -->
                            <td class="table-text">
                                <div>{{ $team->name }}</div>
                            </td>
                             <!-- チームオーナー -->
                            <td class="table-text">
                                <div></div>
                            </td>
                            <!-- 所属人数 -->
                            <td class="table-text">
                                <div>{{ $team->members()->count() }}人参加中</div>
                            </td>
                            <!-- 詳細ボタン -->
                            <td class="table-text">
                                <a href="{{ url('teams/'.$team->id) }}" class="btn btn-danger">詳細</a>
                            </td>
			                 <!-- チーム参加ボタン -->
                            <td class="table-text">
                                @if(Auth::check())
                                    @if(Auth::id() != $team->user_id && $team->members()->where('user_id',Auth::id())->exists() !== true)
                                        <form action="{{ url('teams/'.$team->id) }}" method="GET">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">
                                            参加
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                            <!-- チーム編集ボタン-->
                            <td class="table-text">
                                @if(Auth::check()&& Auth::id() == $team->user_id )
                                    <form action="{{ url('teams/edit/'.$team->id) }}" method="GET">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">
                                        編集
                                        </button>
                                    </form>	
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>		
@endif