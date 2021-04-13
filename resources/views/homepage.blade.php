@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Transactions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $count = 1;
            @endphp
            @foreach($all_tasks as $task)
            <tr>
                <th scope="row">{{$count}}</th>
                <td>{{$task->description}}</td>
                <td>@if($task->status == 0) <span class="text-success">New Task</span> @elseif($task->status==1) <span class="text-info">In Progress</span> @else <span class="text-danger">Completed</span> @endif</td>
                <td>@if($task->status == 0) <a class="btn btn-primary mr-2" href="javascript:void(0)" onclick="changeType(2,'{{route('update.task',$task->id)}}')">Completed</a><a class="btn btn-primary" href="javascript:void(0)" onclick="changeType(1,'{{route('update.task',$task->id)}}')">In Progress</a>@elseif($task->status == 1) <a class="btn btn-primary" href="javascript:void(0)" onclick="changeType(2,'{{route('update.task',$task->id)}}')">Completed</a> @endif </td>
            </tr>
            @php
            $count++;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function changeType(type, thisUrl) {
        if (type == 1) {
            var formdata = {
                status: 1,
            };
            $.ajax({
                type: 'POST',
                url: thisUrl,
                data: formdata,
            }).done(function(data) {
                if (data.success) {
                    toastr.success(data.success);
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }
            });
        } else if (type = 2) {

            var formdata = {
                status: 2,
            };
            $.ajax({
                type: 'POST',
                url: thisUrl,
                data: formdata,
            }).done(function(data) {
                if (data.success) {
                    toastr.success(data.success);
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }
            });
        }

    }
</script>
@endsection