@extends('layouts.app');
@section('title', 'Content CRUD')
@section('content')

    <h1>Create Content</h1>
    <form action="{{ empty($content->id) ? route('store') : url('/content/'.$content->id) }}" method="POST">
        @if (!empty($content->id))
            @method('put')
        @endif
        @csrf
        <div class="form-group">
            <div class="mb-3">
                <label for="topic" class="form-label">หัวข้อ</label>
                <input type="text" class="form-control" id="topic" name="topic" value="{{ old('topic',$content->topic) }}">
                @error('topic')
                <div class="invalid-feedback d-block">{{ $errors->first('topic') }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">รายละเอียด</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description',$content->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback d-block">{{ $errors->first('description') }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tag</label>
                <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags',$content->tags) }}">
            </div>

            <button type="submit" class="btn btn-outline-primary">Save</button>
            <a href="{{ url('/content') }}" class="btn btn-outline-danger" role="button">Back</a>
        </div>
    </form>

@endsection
