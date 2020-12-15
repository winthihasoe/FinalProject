<x-pagelayout>
@section('title','Contact')


<div class="container-fluid">
    <h1 class="mt-4">Contact Us</h1>
    <div class="row">
        <div class="col-md-6">
            <!-- map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118427.17692136722!2d96.00561245254141!3d21.94034499028367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb6d23f0d27411%3A0x24146be01e4e5646!2sMandalay!5e0!3m2!1sen!2smm!4v1606928981483!5m2!1sen!2smm" width="600" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

        <div class="col-md-6">
            <!-- contact form  -->
            <div class="card">

                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Contact Us</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="{{route('post_contact_message')}}" method='post'>
                    @csrf

                        <!-- Username -->
                        <div class="md-form mt-3">
                            <input type="text" id="materialSubscriptionFormPasswords" class="form-control" name="username">
                            <label for="materialSubscriptionFormPasswords">Username</label>
                            @error('username')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <!-- E-mai -->
                        <div class="md-form">
                            <input type="email" id="materialSubscriptionFormEmail" class="form-control" name="email">
                            <label for="materialSubscriptionFormEmail">E-mail</label>
                            @error('email')
                                <div class="text-danger"> {{$message}}</div>
                            @enderror
                        </div>
                        

                        <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="your message"></textarea>
                        @error('message')
                            <div class="text-danger"> {{$message}}</div>
                        @enderror

                        <!-- Send Message button -->
                        <button class="btn btn-info btn-block my-4" type="submit">Send Message</button>

                    </form>
                    <!-- Form -->

                </div>

            </div>
        </div>
    </div>

</div>

</x-pagelayout>