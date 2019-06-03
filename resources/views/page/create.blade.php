@extends('layouts.app')
@section('content')
<a href='/Product'>back</a>
    <div class="container">
        <form>
            <div class="form-group row">
                <label for="inputName" class="col-sm-1-12 col-form-label">name</label>
                <div class="col-sm-1-12">
                <input type="text" class="form-control" name="inputName" id="inputName" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                    <label for="inputName" class="col-sm-1-12 col-form-label">price</label>
                    <div class="col-sm-1-12">
                    <input type="text" class="form-control" name="inputName" id="inputName" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="button" class="btn btn-primary">upload</button>
                            <i class="fa fa-file" aria-hidden="true">image</i>
                        </div>
                    </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Action</button>
                </div>
            </div>
        </form>
    </div>
@endsection