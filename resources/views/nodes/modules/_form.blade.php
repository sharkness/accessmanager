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

<!-- Temporary -->
<div class="form-group">
   {!! Form::label('name', 'Name: ') !!}
   {!! Form::text('name', $nameAutofill, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::label('slot_number', 'Slot Number: ') !!}
   {!! Form::text('slot_number', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::label('port_count', 'Port Count: ') !!}
   {!! Form::text('port_count', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::label('notes', 'Notes: ') !!}
   {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>