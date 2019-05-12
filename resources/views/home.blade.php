@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @include('inc.messages')

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button 
                        class="btn btn-primary btn-lg" 
                        type="button" 
                        name="button" 
                        data-toggle="modal" 
                        data-target="#addModal">
                        Add Bookmark
                    </button>
                    <hr>
                    <h3>My Bookmarks</h3>
                    <ul class="list-group ">
                        @foreach ($bookmarks as $bookmark)
                            <li class="list-group-item shadow-sm p-3 mb-5 bg-white rounded clearfix">
                                <a href="{{$bookmark->url}}" target="_blank" style="position:absolute; top:30%;">
                                    {{$bookmark->name}}
                                    <span class="badge badge-secondary">
                                        {{$bookmark->description}}
                                    </span>
                                </a>
                                <span class="float-right btn-group">
                                <button type="button" class="btn btn-danger delete-bookmark" name="button" data-id="{{$bookmark->id}}" >
                                        <span class="glyphicon glyphicon-remove"> Delete </span>
                                    </button>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Bookmark</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
        <form action="{{ route('bookmarks.store') }}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="">
                    Bookmark Name
                </label>
                <input type="text" name="name" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">
                    Bookmark Url
                </label>
                <input type="text" name="url" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">
                    Website Description
                </label>
                <textarea name="description" id="description" cols="72" rows="6"></textarea>
            </div>
            <input type="submit" value="Submit" name="submit" class="btn button-primary">
        </form>

        </div>
      </div>
    </div>
  </div>
@endsection
