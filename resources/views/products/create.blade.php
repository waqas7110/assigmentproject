@extends('layouts.appa')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <form action="{{url('/products/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        @if($errors->has('name'))
                        <span class="text-danger"> {{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                        @if($errors->has('email'))
                        <span class="text-danger"> {{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id=""
                            rows="4">{{old('description')}}</textarea>
                        @if($errors->has('description'))
                        <span class="text-danger"> {{$errors->first('description')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image" value="{{old('image')}}">
                        @if($errors->has('image'))
                        <span class="text-danger"> {{$errors->first('image')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="progress" value="complete"
                                {{ old('progress') === 'complete' ? 'checked' : '' }}>
                            Complete
                        </label>

                        <label>
                            <input type="radio" name="progress" value="incomplete"
                                {{ old('progress') === 'incomplete' ? 'checked' : '' }}>
                            Incomplete
                        </label>

                        <label>
                            <input type="radio" name="progress" value="inprogress"
                                {{ old('progress') === 'inprogress' ? 'checked' : '' }}>
                            Inprogress
                        </label>

                        @if ($errors->has('progress'))
                        <span class="text-danger">{{ $errors->first('progress') }}</span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="">Due Date</label>
                        <input type="date" class="form-control" name="duedate" value="{{old('duedate')}}">
                        @if($errors->has('duedate'))
                        <span class="text-danger"> {{$errors->first('duedate')}}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection