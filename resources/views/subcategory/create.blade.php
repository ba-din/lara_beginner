@extends('layouts.master')

@section('title')

    <title>Create a Subcategory</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/subcategory'>Subcategories</a></li>
        <li class='active'>Create</li>
    </ol>

    <h2>Create a New Subcategories</h2>

    <hr/>

    <form class="form" role="form" method="POST" action="{{ url('/subcategory') }}">

    {{ csrf_field() }}

    <!-- name Form Input -->

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label class="control-label">Subcategories Name</label>

            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

            @if ($errors->has('name'))

                <span class="help-block">

                <strong>{{ $errors->first('name') }}</strong>

                </span>

            @endif

        </div>

        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">

           <label for="category_id">Category Name:</label>

           <select class="form-control" name="category_id">

           <option value="">Please Choose One</option>

           @foreach($categories as $category)

               <option value="{{ $category->id }}">{{ $category->name }}</option>

               @endforeach

               </select>

           @if ($errors->has('category_id'))

               <span class="help-block">

               <strong>{{ $errors->first('category_id') }}</strong>

               </span>

           @endif

        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">

                Create

            </button>

        </div>

    </form>

@endsection