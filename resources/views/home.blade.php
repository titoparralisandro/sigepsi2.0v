@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('plugins.Toastr', true)

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

<hr>
<button type="button" class="btn btn-secondary toastrDefaultSuccess">toastr</button>
<hr>
<button type="button" class="btn btn-primary sweetalert2DefaultSuccess">sweetalert2</button>
<hr>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<!-- page script -->
<script>
    //toastr.success("Hello World!");
    
    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.sweetalert2DefaultSuccess').click(function() {
        //alert('Test');
        Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
        )
    });
    
</script>
    <script> console.log('Hi!'); </script>
@stop




