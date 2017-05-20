@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel zgłoszeniowy
	                
	                 <a href="{{ url('/create/') }}" class="btn btn-primary pull-right">Dodaj zgłoszenie</a>

	             
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
								<th>Przypisany agent</th>
								<th>Status zgłoszenia</th>
		                    </tr>
	                    </thead>
	                    <tbody>
							@foreach ($tasks as $tasks)
							<tr>
								<td>{{ $tasks->id }}</td>
								<td>{{ $tasks->subject }}</td>
								<td>{{ date('F d, Y', strtotime($tasks->created_at)) }}</td>
								<td>{{ $tasks->domain }}</td>
								<td>{{ $tasks->email }}</td>
								<td>{{ $tasks->id_agent }}</td>
								<td>{{ $tasks->name }}</td>
							@endforeach
							</tr>
	                    </tbody>
                    </table>      
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
