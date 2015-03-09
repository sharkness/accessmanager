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
   {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::label('location', 'Location: ') !!}
   {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::label('mgmt_ip', 'IP Address: ') !!}
   {!! Form::text('mgmt_ip', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::label('model_number', 'Model: ') !!}
   {!! Form::select('model_number', ['ICX6610' => 'ICX6610', 'SX800' => 'SX800'], 'SX800') !!}
</div>
<div class="form-group">
   {!! Form::label('notes', 'Notes: ') !!}
   {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>