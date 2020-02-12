
@extends('layouts.header')

@section('content')
    <div class="container">
        @if(count($errors))

                <div class="alert alert-danger">

                        <strong>Whoops!</strong> There were some problems with your input.

                        <br/>

                        <ul>

                                @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                                @endforeach

                        </ul>

                </div>

        @endif
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Update Form</h3>
			 			</div>
			 			<div class="panel-body">
                                                    <form role="form" method="post" action="{{route('user.update', $user_detail[0]['id'])}}">
                                            {{csrf_field()}}
                                            {{ method_field('patch') }}
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                                                    <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username" value="{{$user_detail[0]['name']}}">
			    					</div>
			    				</div>
                                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                    <input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="{{$user_detail[0]['email']}}">
                                                            </div>
                                                        </div>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" value="{{$user_detail[0]['password']}}">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password" value="{{$user_detail[0]['password']}}">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
@stop