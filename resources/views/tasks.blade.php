@extends('layouts.app')

@section('content')
<!-- Bootstrap Boilerplater -->

    <div class="panel-body">

        <!-- Display Validation errors -->
        @include('common.errors')
        <!-- NewTask form --> 
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button> 
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Task -->
    <!-- Current Task -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Task
            </div>

            <div class="panel-body">
                <task class="table table-striped task-table">

                    <!-- Table heading -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                               
                                <td>
                                     <!-- TODO: Delete Button -->
                                    <form action="/task/{{ $task->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field() }}

                                        <button>Delete Task</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
    @endif
@endsection