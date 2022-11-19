<div class="flash-error">
    <b>There has been an error in your submission</b>
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
</div>
