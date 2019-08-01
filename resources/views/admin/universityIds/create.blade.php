@extends('admin.layouts.app')
@section('content')
<section class="section">
    <form role="form" method="POST" action="/admin/university-ids">
        @csrf
        <div class="row sameheight-container">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title">Add University Ids</h4>
                            @if ($errors->any())
                            <div class="field mt-6">
                                @foreach ($errors->all() as $error)
                                    <li class="text-sm text-red">{{ $error }}</li>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="year">Year (Id starting year e.g 08)</label>
                            <input type="text" id="year" name="year" class="form-control">
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="batch">Batch</label>
                            <input type="text" id="batch" name="batch" class="form-control">
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="start">Start Id</label>
                            <input type="text" id="start" name="start" class="form-control">
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="end">End Id</label>
                            <input type="text" id="end" name="end" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Create">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection