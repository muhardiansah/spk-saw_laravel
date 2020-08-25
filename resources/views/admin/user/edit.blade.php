@extends('adminlte::page')

@section('content')

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
		 <div class="box box-info">
		  <div class="box-header with-border">
             <h3 class="box-title">Edit User</h3>
          </div>
		
		<form class="form-horizontal" action="{{ route('admin.user.update', $user->id)}}" method="post">
			{{ csrf_field()}}
				<div class="box-body">
				  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Nama User</label>
				    <div class="col-sm-8">
				 	   <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $user->name}}" required>
 				  </div>
 				</div>
				  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Username</label>
				    <div class="col-sm-8">
				 	   <input type="text" class="form-control" name="username" value="{{ old('username') ? old('username') : $user->username}}" required>
 				  </div>
 				</div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Password</label>
				    <div class="col-sm-8">
				 	   <input type="password" class="form-control" name="pass_baru" value="">
				 	   <b style="color:red;">*</b>
				 	   <i>kosongkan jika tidak mengubah password</i>
	 				  </div>
	 				</div>
	 				<div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Ulangi Password</label>
				    <div class="col-sm-8">
				 	   <input type="password" class="form-control" name="pass_confirm" value="">
				 	   <b style="color:red;">*</b>
				 	   <i>kosongkan jika tidak mengubah password</i>
	 				  </div>
	 				</div>
				   <div class="form-group">
		                <div class="col-sm-offset-4 col-sm-10">
						  <button type="submit" class="btn btn-primary">Simpan</button>
						    <a href="{{ route('admin.user.index')}}" class="btn btn-default">Batal</a>
						</div>
					</div>
				</div>
			</form>
		</div>
		  </div>
		  <div class="col-xs-12 col-sm-3 col-md-3">
		  	
		</div>
@endsection