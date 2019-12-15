@if(count($errors))
<div class="alert alert-warning">
    @foreach($errors->all() as $error)
    <li style=" list-style-type:none; ">{{ $error }}</li>
    @endforeach
</div>
@endif