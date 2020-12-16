<x-adminlayout>
@section('title','Contact')


<div class="container-fluid">
    
    <div class="row">
        

        <div class="col-md-12">
            <!-- contact form  -->
            <div class="card">
 
                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Edit Message</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="{{route('updateMessage',$updateMessage->id)}}" method='post'>
                    @csrf

                        <!-- Username -->
                        <div class="md-form mt-3">
                            <input type="text" id="materialSubscriptionFormPasswords" class="form-control" value="{{$updateMessage->username}}" name="username">
                            <label for="materialSubscriptionFormPasswords">Username</label>
                            @error('username')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <!-- E-mai -->
                        <div class="md-form"> 
                            <input type="email" id="materialSubscriptionFormEmail" class="form-control" value="{{$updateMessage->email}}" name="email">
                            <label for="materialSubscriptionFormEmail">E-mail</label>
                            @error('email')
                                <div class="text-danger"> {{$message}}</div>
                            @enderror
                        </div>
                        

                        <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="your message">{{$updateMessage->message}}</textarea>
                        @error('message')
                            <div class="text-danger"> {{$message}}</div>
                        @enderror

                        <!-- Send Message button -->
                        <button class="btn btn-info btn-block my-4" type="submit">Update Message</button>

                    </form>
                    <!-- Form -->

                </div>

            </div>
        </div>
    </div>

</div>

</x-adminlayout>