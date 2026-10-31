@extends('layouts.app')
@section('title', 'All Tasks')
@section('content')
    <section class="page-intro page-intro--tasks">
        <p class="eyebrow">Task directory</p>
        <h1>All tasks</h1>
        <p class="intro-copy">Every task, ordered from the earliest date to the latest.</p>
    </section>
    <section aria-labelledby="all-tasks-title">
        <div class="section-heading">
            <h2 id="all-tasks-title">Task list</h2>
            <span class="count-label">{{ $tasks->count() }} {{ Str::plural('task', $tasks->count()) }}</span>
        </div>
        @if($tasks->isEmpty())
            <div class="empty-state"><p>There are no tasks yet.</p></div>
        @else
            <div class="table-wrap">
                <table>
                    <thead><tr><th scope="col">Task</th><th scope="col">Scheduled date</th><th scope="col">Status</th></tr></thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td class="task-title">{{ $task->title }}</td>
                                <td>{{ $task->task_date->format('M j, Y') }}</td>
                                <td><span class="status-label" data-status="{{ $task->status }}">{{ ucwords(str_replace('_', ' ', $task->status)) }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
