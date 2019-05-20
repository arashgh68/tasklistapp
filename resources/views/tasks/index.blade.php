@extends('layouts.app')

@section('title')
لیست وظایف
@endsection
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="task-container sticky-top">
                <div class="card-common bg-white mt-4 task-insert">
                    <div class="card-body clearfix">
                        <h3 class="mb-4">افزودن وظیفه</h3>
                        <form action="{{route('tasks.create')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">وظیفه</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror" placeholder="وظیفه"
                                    aria-describedby="taskHint">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small id="taskHint" class="text-muted">متن وظیفه مورد نظر را وارد کنید.</small>
                            </div>
                            <div class="form-group">
                              <label for="importance">اهمیت</label>
                              <select name="importance" id="importance" class="form-control">
                                  
                                  @foreach ($importances as $key => $value)
                                      <option value="{{$key}}">{{$value}}</option>
                                  @endforeach
                              </select>
                              <small id="helpId" class="text-muted">اهمیت وظیفه را انتخحاب کنید</small>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="افزودن" class="btn btn-success float-md-left">
                            </div>
                        </form>
                    </div>
                </div>
                @if (session()->has('msg'))
                <div class="alert alert-success mt-4" role="alert">
                    {{session()->get('msg')}}
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            @if (session()->has('msg-remove'))
            <div class="alert alert-warning" role="alert">
                {{session()->get('msg-remove')}}
            </div>
            @endif


            @foreach ($tasks as $task)
            <div class="container-fluid bg-white task-item task-item-{{$task->importance}}">
                <div class="row py-4 my-4 align-items-center">
                    <div class="col-1">

                    </div>
                    <div class="col-9">
                        {{$task->title}}
                    </div>
                    <div class="col-2">
                        <form action="{{route('tasks.delete',$task->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-link btn"><i class="fa fa-trash text-danger fa-2x"
                                    aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>


            @endforeach

        </div>

    </div>
</div>
@endsection