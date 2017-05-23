@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel zgłoszeniowy
	             
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
								<th>Akcja</th>
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
								<td><a href="{{ url('/tasks/') }}/{{$tasks->id }}" class="btn btn-default">Pokaż</a></td>
							@endforeach
							</tr>
	                    </tbody>
                    </table>      
                    
               
                

	                @if($tasks->level === 3)
	                 <a href="{{ url('/create/') }}" class="btn btn-primary pull-right">Dodaj zgłoszenie</a>
					  @endif
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
