@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Zgłoszenie do supportu</div>

                <div class="panel-body">
                   
                   <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div>
                   
                   
                   <form action="store" method="post">

<div class="form-group">
    <label for="subject" class="col-sm-2 control-label">Temat zgłoszenia</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="subject" placeholder="Temat">
    </div>
  </div>
  <div class="form-group">
    <label for="domain" class="col-sm-2 control-label">Domena</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="domain" placeholder="http://example.com">
    </div>
  </div>
  
  
  
    <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Opis zgłoszenia</label>
    <div class="col-sm-10">
     <textarea class="form-control" name="description" placeholder="Twój opis zgłoszenia"></textarea>
    </div>
  </div>
  
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  
   <div class="form-group">
	    <input type="submit" name="submit" class="form-control btn btn-primary" value="Wyślij zgłoszenie">
</div>

                </form>

                   
                   
                   
                                       
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
