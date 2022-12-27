@extends('admin.layout.common')

@section('pageTitle', 'ランキング')

@section('main')
    <main class="w-75 min-vh-100 mx-auto pt-5">
        @if(count($errors) !== 0)
            <p class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <span>・{{ $error }}</span><br/>
                @endforeach
            </p>
        @endif

        @if ($rankList->isEmpty())
            <h1 class="text-center">ランキングのデータが存在しません。</h1>
        @endif

        @if ($rankList->hasItem())
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>順位</th>
                        <th>名前</th>
                        <th>残り時間</th>
                        <th>削除</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($rankList->value() as $rank)
                        <tr>
                            <td class="align-middle">{{ $rank->rankOrder()->value() }} 位</td>
                            <td class="align-middle">{{ $rank->name()->value() }}</td>
                            <td class="align-middle">{{ $rank->secondsLeft()->value() }} 秒</td>
                            <td class="align-middle">
                                <button class="btn btn-danger" id="deleteRecordButton" data-record-id="{{ $rank->recordId()->value() }}" data-bs-toggle="modal"
                                    data-bs-target="#deleteRecordModal">削除する</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="modal fade" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteRecordLabel">登録されているランキングの削除</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        本当に削除しても良いですか？
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form id="deleteRecordForm" action="" method="POST">
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        const deleteRecordBaseUrl = "{{ url('/earthAdmin/records') }}";

        const deleteRecordButton = document.querySelector('#deleteRecordButton')
        deleteRecordButton.addEventListener('click', (event) => {
            const deleteRecordForm = document.querySelector('#deleteRecordForm');
            deleteRecordForm.action = `${deleteRecordBaseUrl}/${event.target.dataset.recordId}`;
        });
    </script>
@endsection
