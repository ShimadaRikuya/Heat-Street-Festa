@extends('layouts.app')
@include('navbar')
@include('footer')
@include('common.errors')

@section('content')
<div class="col-md-offset-2 mb-4 edit-profile-wrapper">
    <div class="row">
        <div class="col-md-8">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-profile-tab"  data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="ture">
                    プロフィール
                    </button>
                    <button class="nav-link" id="v-pills-password-reset-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password-reset" type="button" role="tab" aria-controls="v-pills-password-reset" aria-selected="false">
                    パスワードを変更
                    </button>
                    <button class="nav-link" id="v-pills-notice-tab" data-bs-toggle="pill" data-bs-target="#v-pills-notice" type="button" role="tab" aria-controls="v-pills-notice" aria-selected="false">
                    お知らせ
                    </button>
                    <button class="nav-link" id="v-pills-ticket-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ticket" type="button" role="tab" aria-controls="v-pills-ticket" aria-selected="false">
                    ガチャチケット
                    </button>
                    <button class="nav-link" id="v-pills-help-tab" data-bs-toggle="pill" data-bs-target="#v-pills-help" type="button" role="tab" aria-controls="v-pills-help" aria-selected="false">
                    ヘルプ
                    </button>
                </div>

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        @include('users.profile')
                    </div>

                    <div class="tab-pane fade" id="v-pills-password-reset" role="tabpanel" aria-labelledby="v-pills-password-reset-tab">
                        @include('users.password')
                    </div>

                    <div class="tab-pane fade" id="v-pills-notice" role="tabpanel" aria-labelledby="v-pills-notice-tab">
                        @include('users.notice')
                    </div>

                    <div class="tab-pane fade" id="v-pills-ticket" role="tabpanel" aria-labelledby="v-pills-ticket-tab">
                        @include('users.ticket')
                    </div>

                    <div class="tab-pane fade" id="v-pills-help" role="tabpanel" aria-labelledby="v-pills-help-tab">
                        @include('users.help')
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection