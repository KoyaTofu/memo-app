@extends('layouts.app')

@section('breadcrumb')
<div>
    <li class="breadcrumb-item active">ホーム</li>
</div>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>メモ一覧</h2>
    <a href="{{ route('memos.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>
        新規作成
    </a>
</div>

<table class="table table-hover table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>タイトル</th>
            <th>作成日</th>
            <th>更新日</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>

        @php
            $memos = [
                (object)['id' => 1, 'title' => 'テスト', 'created_at' => '2026/01/01', 'updated_at' => '2026/05/11'],
                (object)['id' => 2, 'title' => '買い物リスト', 'created_at' => '2026/01/02', 'updated_at' => '2026/05/12'],
                (object)['id' => 3, 'title' => '会議メモ', 'created_at' => '2026/01/03', 'updated_at' => '2026/05/13'],
            ];
        @endphp
        @forelse ($memos as $memo)
        <tr>
            <td>{{ $memo->id }}</td>
            <td>{{ $memo->title }}</td>
            <td>{{ $memo->created_at }}</td>
            <td>{{ $memo->updated_at }}</td>
            <td>
                <a href="{{ route('memos.edit', $memo->id) }}" class="btn btn-sm btn-outline-primary">
                    編集
                </a>
                <a href="{{ route('memos.delete', $memo->id) }}" class="btn btn-sm btn-outline-danger">
                    削除
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-muted">メモがありません</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection