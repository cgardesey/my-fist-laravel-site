@extends('projects.layout')

@section('content')

    <h1 class="title">Create a New Project</h1>

    <form method="POST" action="/projects" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        {{ csrf_field() }}

        <div class="field">
            <label class="label" for="title">Project Title</label>

            <div class="control">
                <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" value="{{ old('title') }}" v-model="form.title">
                <span class="help is-danger" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></span>
            </div>

        </div>

        <div class="field">
            <label class="label" for="description">Project Description</label>

            <div class="control">
                <textarea name="description" placeholder="Project description" class="textarea {{ $errors->has('title') ? 'is-danger' : '' }}" v-model="form.description">{{ old('description') }}</textarea>
                {{--span.help:empty {display: none}--}}
                <span class="help is-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button" :disabled="form.errors.any()">Create Project</button>
            </div>
        </div>

        {{--@include('errors')--}}
    </form>

@endsection