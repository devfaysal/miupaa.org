@extends('laravel-admin::layouts.app')
@section('content')
<section id="app" class="section">
    <form role="form" method="POST" action="/admin/options">
        @csrf
        <div class="row">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title">Create New Option</h4>
                            @if ($errors->any())
                            <div class="field mt-6">
                                @foreach ($errors->all() as $error)
                                    <li class="text-sm text-red">{{ $error }}</li>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="key">Option Key</label>
                            <input type="text" id="key" name="key" class="form-control">
                        </div>
                        <div class="form-group has-success" v-for="(input,k) in inputs" :key="k">
                            <label class="control-label" for="value">Option Value</label>
                            <div class="row">
                                <div class="col-md-11">
                                    <input type="text" id="value" name="value[]" class="form-control" v-model="inputs[k]">
                                </div>
                                <div class="col-md-1">
                                    <h4 class="pt-1" style="cursor:pointer"><i class="text-danger fa fa-times-circle" @click="remove(k)" v-show="k || ( !k && inputs.length > 1)"></i></h4>
                                </div>
                            </div>
                            <h4 class="pt-1" style="cursor:pointer"><i class="text-success fa fa-plus-circle" @click="add(k)" v-show="k == inputs.length-1"></i></h4>
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
@section('javascript')
    <script>
        new Vue({
            el: '#app',
            data() {
                return {
                    inputs: ['']
                    }
                },
                methods: {
                    add(index) {
                        this.inputs.push('');
                        console.log( this.inputs)
                    },
                    remove(index) {
                        this.inputs.splice(index, 1);
                    },
                }
            })
    </script>
@endsection