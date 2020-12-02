@extends('layouts.pagelayout')
@section('content')

<div class="container-fluid">
    <h1 class="mt-4">Contact Us</h1>
    <div class="row">
        <div class="col-md-6">
            <!-- map -->
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
                    <form class="text-center" style="color: #757575;" action="#!">

                        <!-- Username -->
                        <div class="md-form mt-3">
                            <input type="text" id="materialSubscriptionFormPasswords" class="form-control">
                            <label for="materialSubscriptionFormPasswords">Username</label>
                        </div>

                        <!-- E-mai -->
                        <div class="md-form">
                            <input type="email" id="materialSubscriptionFormEmail" class="form-control">
                            <label for="materialSubscriptionFormEmail">E-mail</label>
                        </div>

                        <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="your message"></textarea>

                        <!-- Send Message button -->
                        <button class="btn btn-info btn-block my-4" type="submit">Send Message</button>

                    </form>
                    <!-- Form -->

                </div>

            </div>
        </div>
    </div>

</div>

@endsection