<div class="form-group">
       @if ($errors->any())
          <ul class="alert alert-danger">
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
          </ul>
       @endif
<hr>    
</div>
<div class="form-group">
   {!! Form::label('title', 'Topic: ') !!}
   {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::label('body', 'Please explain: ') !!}
   {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>