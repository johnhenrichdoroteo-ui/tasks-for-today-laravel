@extends('layouts.app')
@section('title', 'Today')
@section('content')
    <section class="page-intro page-intro--today">
        <p class="eyebrow">Welcome</p>
        <h1>Today's tasks</h1>
        <p class="intro-copy">A focused list of the work scheduled for {{ $today->format('l, F j, Y') }}.</p>
    </section>
    <section aria-labelledby="today-list-title">
        <div class="section-heading">
            <div><p class="eyebrow">Daily overview</p><h2 id="today-list-title">On the schedule</h2></div>
            <span class="count-label">{{ $tasks->count() }} {{ Str::plural('task', $tasks->count()) }}</span>
        </div>
        @if($tasks->isEmpty())
            <div class="empty-state"><p>No tasks are scheduled for today.</p><a href="{{ route('tasks.index') }}">See all tasks</a></div>
        @else
            <ul class="task-list">
                @foreach($tasks as $task)
                    <li class="task-row">
                        <span class="task-title">{{ $task->title }}</span>
                        <span class="status-label" data-status="{{ $task->status }}">{{ ucwords(str_replace('_', ' ', $task->status)) }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
        <p class="section-note">Need a different date? <a href="{{ route('tasks.index') }}">View the complete task list</a>.</p>
    </section>
@endsection
