@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{route('store.task')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Task Description</label>
            <input type="text" class="form-control" id="text" name="description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection