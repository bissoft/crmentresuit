
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <!-- <link rel="icon" href=" " type="image/png" /> -->
    <!--plugins-->
    <link href="{{asset('dash-assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('dash-assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('dash-assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('dash-assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('dash-assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('dash-assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dash-assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{asset('dash-assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('dash-assets/css/icons.css')}}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('dash-assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('dash-assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset('dash-assets/css/header-colors.css')}}" />
    <title>EntreSuite CRM</title>
    <style>
        .clear-data2 {
            position: absolute;
            right: 0px;
            padding: 1px;
            background-color: #C00;
            color: #FFF;
            cursor: pointer;
            top: 0;
            font-weight: 900;
            width: 27px;
            z-index: 8;
            margin: auto;
            text-align: center;
            font-size: 16px;
        }
        .new-review{
            position: relative;
            margin-top:10px
        }
    </style>
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

                        <div class="card">
                            <div class="card-header card bg-success text-white">
                                <b> Custom Fields </b>
                            </div>
                            <div class="card-body">
                                <div class="green">
                                    <div class="form-rows green-rows">
                                        @php
                                        // dd($intake->custom_field);
                                        $res = (isset($intake) and $intake->custom_field !="" ) ? json_decode($intake->custom_field , true) : array();
                                        $g_text = (count($res)==0) ? 0 : count($res) - 1;
                                        for ($n=0; $n <=$g_text; $n++){ $custom_name=(isset($res[$n]["custom_name"])) ? $res[$n]["custom_name"]: "" ; $custom_value=(isset($res[$n]["custom_value"])) ? $res[$n]["custom_value"]: "" ; @endphp 
                                        <div class="new-review border row">
                                            <span class="clear-data2">x</span>
                                            <div class="col-lg-12">
                                                <p class="mx-auto text-center"><b> Custom Field {{ $n+1 }}</b></p>
                                                <div class="form-group">
                                                    <label>Custom Field Name</label>
                                                    <input type="text" name="custom_name[]" placeholder="Name..." class="form-control" value="{{ $custom_name }}" />
                                                    <div class="text-danger"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Custom Field value</label>
                                                    <textarea rows="1" name="custom_value[]" class="form-control" placeholder="value..."> {{ $custom_value }} </textarea>
                                                    <div class="text-danger"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php } @endphp
                                    </div>
                                    <div style="text-align:right; margin-top:10px">
                                        <a href="" class="btn btn-info add-green"><b>Add More</b></a>
                                    </div>
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
    <script src="{{asset('dash-assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('dash-assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('dash-assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('dash-assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('dash-assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <!--app JS-->
    <script src="{{asset('dash-assets/js/app.js')}}"></script>

    <script>
        $(document).ready(function() {
            var cloneg = '<div class="new-review border row">' +
                '<span class="clear-data2">x</span>' +
                '<p class="mx-auto text-center"><b> Custom Field <span class="no"></span> </b></p>' +
                '<div class="col-lg-12">' +
                    '<div class="form-group">' +
                        '<label>Custom Field Name</label>' +
                        '<input type="text" name="custom_name[]" placeholder="Name..." class="form-control" value=""/>' +
                        '<div class="text-danger"> </div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label>Custom field value</label>' +
                        '<textarea rows="1" name="custom_value[]" class="form-control oneditor" placeholder="value..." ></textarea>' +
                        '<div class="text-danger"> </div>' +
                    '</div>' +
                '</div>' +
            '</div>'
        $(".add-green").click(function(e) {
            e.preventDefault();
            var html_obj = cloneg;
            var ln = $(".form-rows .row").length;
            // $(html_obj).find("input").each(function() {
            // $(this).attr("value", "");
            // });
            // $(html_obj).find("textarea").each(function() {
            // $(this).text("");
            // });
            // $(html_obj).find("img").remove();
            $(".green .form-rows").append(html_obj);
            var n = $(".green .form-rows").find(".new-review").length;
            var el = $(".green .form-rows .new-review:nth-child(" + n + ")");
            el.find(".no").text(n);
            _full_Ed();
            return false;
            });


          
                $(document).on("click", ".clear-data2", function () {
                    var v = window.confirm("Do you want to delete data?");
                    if (v) {
                        $(this).closest(".row").remove();
                    }
                });
        });
    </script>
</body>

</html>