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
   {!! Form::label('name', 'Name: ') !!}
   {!! Form::text('name', $nameAutofill, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::label('port_number', 'Port Number: ') !!}
   {!! Form::text('port_number', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::label('notes', 'Notes: ') !!}
   {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>