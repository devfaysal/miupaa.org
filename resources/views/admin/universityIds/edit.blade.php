@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <form role="form" method="POST" action="/admin/university-ids/{{$universityId->id}}">
        @csrf
        @method('PATCH')
        <div class="row sameheight-container">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title">Edit University Id</h4>
                            @if ($errors->any())
                            <div class="field mt-6">
                                @foreach ($errors->all() as $error)
                                    <li class="text-sm text-red">{{ $error }}</li>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="number">University Id</label>
                            <input type="text" id="number" value="{{$universityId->number}}" name="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Update">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection