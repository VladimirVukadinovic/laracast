@extends('layout')

@section('content')
    <h1 class="title">Create a New Projects</h1>
    <form method="post" action="/projects">
        {{csrf_field()}}

        <div class="field">
            <label class="label" for="title">Title</label>
            <div class="control">
                <input class="input {{$errors->has('title') ? 'is-danger' : ''}}" type="text"  name="title" placeholder="Project Title" value="{{old('title')}}" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>
            <textarea class="textarea {{$errors->has('description') ? 'is-danger' : ''}}" name="description" placeholder="Project Description" required>{{old('description')}}</textarea>
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-link" type="submit">Create Project</button>
            </div>
        </div>

        @if ($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection
