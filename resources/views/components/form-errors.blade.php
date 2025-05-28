@if($errors->all())
<ul>
    @foreach($errors->all() as $error)
    <li class="text text-danger">{{ $error }}</li>
    @endforeach
</ul>
@endif