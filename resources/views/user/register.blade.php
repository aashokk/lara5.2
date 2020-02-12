
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
			    		<h3 class="panel-title">Registration Form</h3>
			 			</div>
			 			<div class="panel-body">
                                                    <form role="form" method="post" action="/create_user">
                                            {{csrf_field()}}
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                                                    <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username">
			    					</div>
			    				</div>
                                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                    <input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                                                            </div>
                                                        </div>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
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