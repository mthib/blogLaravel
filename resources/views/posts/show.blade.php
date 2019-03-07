@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Post</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Post    </div>

    <div class="panel-body">
                

        <form action="{{ url('/posts') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="post_author" class="col-sm-3 control-label">Post Author</label>
            <div class="col-sm-6">
                <input type="text" name="post_author" id="post_author" class="form-control" value="{{$model['post_author'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="post_date" class="col-sm-3 control-label">Post Date</label>
            <div class="col-sm-6">
                <input type="text" name="post_date" id="post_date" class="form-control" value="{{$model['post_date'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="post_content" class="col-sm-3 control-label">Post Content</label>
            <div class="col-sm-6">
                <input type="text" name="post_content" id="post_content" class="form-control" value="{{$model['post_content'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="post_title" class="col-sm-3 control-label">Post Title</label>
            <div class="col-sm-6">
                <input type="text" name="post_title" id="post_title" class="form-control" value="{{$model['post_title'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="post_status" class="col-sm-3 control-label">Post Status</label>
            <div class="col-sm-6">
                <input type="text" name="post_status" id="post_status" class="form-control" value="{{$model['post_status'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="post_name" class="col-sm-3 control-label">Post Name</label>
            <div class="col-sm-6">
                <input type="text" name="post_name" id="post_name" class="form-control" value="{{$model['post_name'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="post_type" class="col-sm-3 control-label">Post Type</label>
            <div class="col-sm-6">
                <input type="text" name="post_type" id="post_type" class="form-control" value="{{$model['post_type'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="post_category" class="col-sm-3 control-label">Post Category</label>
            <div class="col-sm-6">
                <input type="text" name="post_category" id="post_category" class="form-control" value="{{$model['post_category'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/posts') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection