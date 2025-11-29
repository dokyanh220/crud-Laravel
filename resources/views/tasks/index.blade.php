@extends('tasks.layout')
<!-- Đáng nhẽ để layout ở ngoài view, mà để trong task cho dễ hiểu -->

@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-white d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Danh sách công việc</h5>
    <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-primary">+ Thêm Task</a>
  </div>
  <div class="card-body">
    <table class="table table-hover align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Công việc</th>
          <th>Hạn chót</th>
          <th>Trạng thái</th>
          <th class="text-end">Hành động</th>
        </tr>
      </thead>
      <tbody>
        @forelse($tasks as $task)
        <tr>
          <td>{{ $task->id }}</td>
          <td>{{ $task->title }}</td>
          <td>
            @if(!$task->due_date)
            <span class="badge bg-info">Thoải mái</span>
            @endif
            {{ $task->due_date }}
          </td>
          <td>
            @switch($task->status)
            @case(0)
            <span class="badge bg-warning">Chưa hoàn thành</span>
            @break
            @case(1)
            <span class="badge bg-success">Hoàn thành</span>
            @break
            @default
            <span class="badge bg-primary">NULL_STATUS</span>
            @break

            @endswitch
          </td>
          <td class="text-end">
            <a href="{{ route('tasks.show', 1) }}" class="btn btn-sm btn-info text-white">
              <i class="fa-regular fa-eye"></i>
            </a>
            <a href="{{ route('tasks.edit', 1) }}" class="btn btn-sm btn-warning">
              <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <button class="btn btn-sm btn-danger">
              <i class="fa-solid fa-eraser"></i>
            </button>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" align="center" class="p-4">Không có nhiệm vụ</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection