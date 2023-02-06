@if (\Session::has('success'))
	<div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
	</div>
@endif

@if (\Session::has('error'))
	<div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
	</div>
@endif

@if(isset($errors) && count ($errors)>0)
<div class="text-center p-2 alert alert-danger">
    @foreach($errors->all() as $erro)
        {{$erro}}<br>
    @endforeach
</div>
@endif  