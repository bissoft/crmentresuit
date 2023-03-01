
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <!-- <link rel="icon" href=" " type="image/png" /> -->
    <!--plugins-->
    <link href="/public/dash-assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/public/dash-assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/public/dash-assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="/public/dash-assets/css/pace.min.css" rel="stylesheet" />
    <script src="/public/dash-assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="/public/dash-assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/dash-assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="/public/dash-assets/css/app.css" rel="stylesheet">
    <link href="/public/dash-assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="/public/dash-assets/css/dark-theme.css" />
    <link rel="stylesheet" href="/public/dash-assets/css/semi-dark.css" />
    <link rel="stylesheet" href="/public/dash-assets/css/header-colors.css" />
    <title>EntreSuite CRM</title>
</head>

<body>
    <!--wrapper-->

    <section class="login mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-12 mx-auto">

                    @if(count($errors) > 0 )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="p-0 m-0" style="list-style: none;">
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card    form_forder">
                        <div class="card-body p-5">
                            <div class="card-title text-center">
                                <img class="logo_form" src="/public/dash-assets/images/logov2.png" alt="">

                            </div>

                            <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="intake_id" value="{{$intake->id}}">
                                @csrf
                                <div class="col-md-12">
                                    <label for=" " class="form-label"> Upload logo</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="logo" >

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for=" " class="form-label">Enter Client Name</label>
                                    <div class="input-group input-group-lg">
                                        <input type="text" value="{{old('name') ?? $intake->name }}" class="form-control " id=" " placeholder=" Client Name" name="name" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for=" " class="form-label">Enter Address</label>
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control" value="{{ old('address') ?? $intake->address  }}" id=" " placeholder="  Address" required name="address"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for=" " class="form-label">Enter Phone </label>
                                    <div class="input-group input-group-lg">
                                        <input type="tel" class="form-control " id=" " placeholder="Phone" value="{{old('phone') ?? $intake->phone  }}" required name="phone"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for=" " class="form-label">Enter Email </label>
                                    <div class="input-group input-group-lg">
                                        <input type="tel" class="form-control " id=" " placeholder="Email" value="{{ old('email') ?? $intake->email  }}" name="email" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for=" " class="form-label">Enter Date of Birth</label>
                                    <div class="input-group input-group-lg">
                                        <input type="date" class="form-control" id="" value="{{ old('date_of_birth') ?? $intake->date_of_birth }}" name="date_of_birth" placeholder="Date of Birth" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for=" " class="form-label">Enter Emergency Contact</label>
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control " id=" "
                                            placeholder="  Emergency Contact" value="{{ old('emergency') ?? $intake->emergency  }}" name="emergency" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for=" " class="form-label">Mailing Address (if different)</label>
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control " id=" "
                                            placeholder="  Emergency Contact" value="{{ old('contact') ?? $intake->contact }}" name="contact"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for=" " class="form-label"> How may we help you today ?</label>
                                    <div class="input-group input-group-lg">
                                        <textarea class="form-control" name="help" id="exampleFormControlTextarea1"
                                            rows="3">{{old('help') ?? $intake->help}}</textarea>
                                    </div>
                                </div>
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn theme_btn btn-lg px-5"> Submit</button>
                            </div>
                        </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>
        </div>

    </section>

    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="/public/dash-assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="/public/dash-assets/js/jquery.min.js"></script>
    <script src="/public/dash-assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="/public/dash-assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/public/dash-assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--app JS-->
    <script src="/public/dash-assets/js/app.js"></script>
</body>

</html>