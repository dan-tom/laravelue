@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel zgłoszeniowy
	                
<!-- 	                 <a href="{{ url('/create/') }}" class="btn btn-primary pull-right">Dodaj zgłoszenie</a> -->

	             
                </div>

                <div class="panel-body">
	               	                
                    <table class="table table-bordered table-hover">
	                    <thead>
		                    <tr>
								<th>ID</th>
								<th>Temat zgłoszenia</th>
								<th>Data zgłoszenia</th>
								<th>Domena</th>
								<th>Klient</th>
								<th>Status zgłoszenia</th>
		                    </tr>
	                    </thead>
	                    <tbody>
							@foreach ($tasks as $tasks)
							<tr>
								<td>{{$tasks->id }}</td>
								<td>{{ $tasks->subject }}</td>
								<td>{{ date('F d, Y', strtotime($tasks->created_at)) }}</td>
								<td>{{ $tasks->domain }}</td>
								<td>{{ $tasks->email }}</td>

								<td>{{ $tasks->name }}</td>
							@endforeach
							</tr>
							<tr>
						<td colspan="7"><strong>Opis zgłoszenia:</strong><br />{{$tasks->description}}</td>
							</tr>
	                    </tbody>
                    </table>      
                    
                </div>
            </div>
            
            
         
         
         @foreach ($posts as $posts)
           <div class="panel panel-default">
            	<div class="panel-heading">{{$posts->name }}, <small>{{$posts->email }}</small> <span class="pull-right">{{$posts->created_at }} </div>

                <div class="panel-body">
         {{$posts->response }}
                </div>
           </div>
		   @endforeach
         
         
         
         
            <div class="panel panel-default">
            	<div class="panel-heading">Twoja odpowiedź</div>

                <div class="panel-body">
         
         
         
         
         
                            <form action="{{$tasks->id }}/poststore" method="post">  
  
    <div class="form-group">
    <label for="response" class="col-sm-2 control-label">Opis zgłoszenia</label>
    <div class="col-sm-10">
     <textarea class="form-control" name="response" placeholder="Twoja odpowiedź"
     
     
@if($tasks->close === 1)
disabled
@endif
     
     
     
     ></textarea>
    </div>
  </div>
  
  @if($tasks->close === 0)

  
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  
   <div class="form-group">
	    <input type="submit" name="submit" class="form-control btn btn-primary" value="Wyślij odpowiedź">
</div>

@endif

                </form>
                
                
                  @if($tasks->close === 0)
                                            <form action="{{$tasks->id }}/close" method="post">  
  
    <div class="form-group">
	    <div class="row">
    <div class="col-sm-3">
     <input type="hidden" class="form-control" name="close" value="1">


  
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  
  <input type="submit" name="submit" class="form-control btn btn-default" value="Zamknij zgłoszenie">
  </div>
  </div>
  </form>
       @endif  
         
         
         
         
         
                </div>
            </div>  
            
        </div>
    </div>
</div>
@endsection