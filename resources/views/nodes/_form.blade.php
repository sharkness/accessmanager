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
   <!-- {!! Form::text('name', $nameAutofill, ['class' => 'form-control']) !!} -->
   {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Placeholder']) !!}
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
    @if( isset($node->model_number))
        {!! Form::select('model_number', ['ICX6610' => 'ICX6610', 'SX800' => 'SX800'], $node->model_number) !!}
    @else
        {!! Form::select('model_number', ['ICX6610' => 'ICX6610', 'SX800' => 'SX800'], 'SX800') !!}
    @endif
</div>
<div class="form-group">
   {!! Form::label('host_object_id', 'Nagios host_object_id: ') !!}
   {!! Form::text('host_object_id', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::label('notes', 'Notes: ') !!}
   {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>