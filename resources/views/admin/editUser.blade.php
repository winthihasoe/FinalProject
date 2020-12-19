<x-adminlayout>
@section('title','Update User')


<div class="container-fluid">
    
    <div class="row">
        

        <div class="col-md-12">
            <!-- contact form  -->
            <div class="card">
 
                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Update User</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="{{route('admin.updateUser',$updateUser->id)}}" method='post'>
                        @csrf

                        <!-- Name -->
                        <div class="md-form mt-3">
                            <input type="text" id="materialSubscriptionFormPasswords" class="form-control" value="{{$updateUser->name}}" name="name">
                            <label for="materialSubscriptionFormPasswords">Name</label>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <!-- E-mail -->
                        <div class="md-form"> 
                            <input type="email" id="materialSubscriptionFormEmail" class="form-control" value="{{$updateUser->email}}" name="email">
                            <label for="materialSubscriptionFormEmail">E-mail</label>
                            @error('email')
                                <div class="text-danger"> {{$message}}</div>
                            @enderror
                        </div>

                        
                        <label for="materialSubscriptionFormEmail">Is Admin</label>
                        <select name="isAdmin" class="form-control" id="">
                            <option value="1" {{$updateUser->isAdmin=='1'? 'selected' : ''}}>Yes</option>
                            <option value="0" {{$updateUser->isAdmin=='0'? 'selected' : ''}}>No</option>
                        </select>
                        <hr>

                        <label for="materialSubscriptionFormEmail">Is Premium</label>
                        <select name="isPremium" class="form-control" id="">
                            <option value="1" {{$updateUser->isPremium=='1'? 'selected' : ''}}>Yes</option>
                            <option value="0" {{$updateUser->isPremium=='0'? 'selected' : ''}}>No</option>
                        </select>
                  

                        <!-- Send Message button -->
                        <button class="btn btn-info btn-block my-4" type="submit">Update User</button>

                    </form>
                    <!-- Form -->

                </div>

            </div>
        </div>
    </div>

</div>

</x-adminlayout>