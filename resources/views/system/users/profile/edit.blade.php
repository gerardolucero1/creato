@extends('layouts.backend')

@section('content')
<div class="bg-image bg-image-bottom" style="background-image: url('assets/media/photos/photo13@2x.jpg');">
    <div class="bg-black-op-75 py-30">
        <div class="content content-full text-center">
            <div class="mb-15">
                <a class="img-link" href="be_pages_generic_profile.php">
                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="assets/media/avatars/avatar15.jpg" alt="">
                </a>
            </div>
            <h1 class="h3 text-white font-w700 mb-10">John Smith</h1>
            <h2 class="h5 text-white-op">
                Product Manager <a class="text-primary-light" href="javascript:void(0)">@GraphicXspace</a>
            </h2>
            <a href="be_pages_generic_profile.php" class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5">
                <i class="fa fa-arrow-left mr-5"></i> Back to Profile
            </a>
        </div>
    </div>
</div>

<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-user-circle mr-5 text-muted"></i> User Profile
            </h3>
        </div>
        <div class="block-content">
            <form action="be_pages_generic_profile.edit.php" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Your account’s vital info. Your username will be publicly visible.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-username">Username</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-username" name="profile-settings-username" placeholder="Enter your username.." value="john.doe" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-name">Name</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-name" name="profile-settings-name" placeholder="Enter your name.." value="John Doe">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-email">Email Address</label>
                                <input type="email" class="form-control form-control-lg" id="profile-settings-email" name="profile-settings-email" placeholder="Enter your email.." value="john.doe@example.com">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10 col-xl-6">
                                <div class="push">
                                    <img class="img-avatar" src="assets/media/avatars/avatar15.jpg" alt="">
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input js-custom-file-input-enabled" id="profile-settings-avatar" name="profile-settings-avatar" data-toggle="custom-file-input">
                                    <label class="custom-file-label" for="profile-settings-avatar">Choose new avatar</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-share-alt mr-5 text-muted"></i> Connections
            </h3>
        </div>
        <div class="block-content">
            <form action="be_pages_generic_profile.edit.php" method="post" onsubmit="return false;">
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            You can connect your account to third party networks to get extra features.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="form-group row">
                            <div class="col-sm-10 col-md-8 col-xl-6">
                                <a class="btn btn-sm btn-hero btn-block text-left btn-alt-danger bg-transparent" href="javascript:void(0)">
                                    <i class="fa fa-google mr-5"></i> john_doe
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-4 col-xl-6 mt-5 d-flex align-items-center">
                                <a class="text-muted" href="javascript:void(0)">
                                    <i class="fa fa-pencil mr-5"></i> Edit Google Connection
                                </a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 col-md-8 col-xl-6">
                                <a class="btn btn-sm btn-hero btn-block text-left btn-alt-info bg-transparent" href="javascript:void(0)">
                                    <i class="fa fa-twitter mr-5"></i> @john_doe
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-4 col-xl-6 mt-5 d-md-flex align-items-md-center">
                                <a class="text-muted" href="javascript:void(0)">
                                    <i class="fa fa-pencil mr-5"></i> Edit Twitter Connection
                                </a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 col-md-8 col-xl-6">
                                <a class="btn btn-sm btn-hero btn-block text-left btn-alt-primary" href="javascript:void(0)">
                                    <i class="fa fa-facebook mr-5"></i> Connect to Facebook
                                </a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 col-md-8 col-xl-6">
                                <a class="btn btn-sm btn-hero btn-block text-left btn-alt-warning" href="javascript:void(0)">
                                    <i class="fa fa-instagram mr-5"></i> Connect to Instagram
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-asterisk mr-5 text-muted"></i> Change Password
            </h3>
        </div>
        <div class="block-content">
            <form action="be_pages_generic_profile.edit.php" method="post" onsubmit="return false;">
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Changing your sign in password is an easy way to keep your account secure.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-password">Current Password</label>
                                <input type="password" class="form-control form-control-lg" id="profile-settings-password" name="profile-settings-password" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-password-new">New Password</label>
                                <input type="password" class="form-control form-control-lg" id="profile-settings-password-new" name="profile-settings-password-new" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-password-new-confirm">Confirm New Password</label>
                                <input type="password" class="form-control form-control-lg" id="profile-settings-password-new-confirm" name="profile-settings-password-new-confirm" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-paypal mr-5 text-muted"></i> Billing Information
            </h3>
        </div>
        <div class="block-content">
            <form action="be_pages_generic_profile.edit.php" method="post" onsubmit="return false;">
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Your billing information is never shown to other users and only used for creating your invoices.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-company">Company Name (Optional)</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-company" name="profile-settings-company">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="profile-settings-firstname">Firstname</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-firstname" name="profile-settings-firstname">
                            </div>
                            <div class="col-6">
                                <label for="profile-settings-lastname">Lastname</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-lastname" name="profile-settings-lastname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-street-1">Street Address 1</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-street-1" name="profile-settings-street-1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-street-2">Street Address 2</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-street-2" name="profile-settings-street-2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-city">City</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-city" name="profile-settings-city">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="profile-settings-postal">Postal code</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-postal" name="profile-settings-postal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="profile-settings-vat">VAT Number</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-vat" name="profile-settings-vat" value="IA00000000" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        $(function() {
            Codebase.layout('header_style_glass');
        });
    </script>
    
@endsection
