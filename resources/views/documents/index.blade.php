@extends('layouts.dashboard')
@section('styles')
    <style>
        /*the container must be positioned relative:*/
        .autocomplete {
            position: relative;
            display: inline-block;
        }

        input {
            border: 1px solid transparent;
            background-color: #f1f1f1;
            padding: 10px;
            font-size: 16px;
        }

        input[type=text] {
            background-color: #f1f1f1;
            width: 100%;
        }

        input[type=submit] {
            background-color: DodgerBlue;
            color: #fff;
            cursor: pointer;
        }

        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
            background-color: DodgerBlue !important;
            color: #ffffff;
        }
    </style>
@endsection
@section('content')
    <div class="row gigs main_content_iner overly_inner ">
        <div class="col-xl-9 col-xxl-12">
            <div class="p-2 bg-white rounded shadow mb-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="font-accent ml-2 mb-3 mt-3 ">Document Groups</h1>
                    <div>
                        <div class=" justify-content-end d-flex">
                            <div class="dropdown mr-3">
                                <!-- <button class="btn bg-transparent dropdown-toggle border-primary text-primary"
                                        type="button"
                                        id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon icon-download text-primary"></i> Upload
                                </button> -->
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button" data-toggle="modal"
                                            data-target="#addNewDocument"> Upload Doc
                                    </button>
                                </div>
                                <div class="modal fade" id="addNewDocument" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Upload Documents</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('document.store')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <select name="folder_id" class="form-control" required>
                                                        <option value="">Select Folders</option>
                                                        @foreach($folders as $folder)
                                                            <option value="{{$folder->id}}">
                                                                {{$folder->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="custom-file mt-3">
                                                        <input type="file" class="custom-file-input" id="documentFile"
                                                               accept="application/pdf" name="file" required>
                                                        <label class="custom-file-label" for="customFile"
                                                               id="imgthumbnail">
                                                            Choose file
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn border-primary bg-transparent"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn bg-transparent  border-primary text-primary"
                                    data-toggle="modal"
                                    data-target="#newFolderUpload"><i class="icon icon-folder"></i>
                                New Folder
                            </button> -->

                            <!-- Modal -->
                            <div class="modal fade" id="newFolderUpload" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-light">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Create Folder</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('folder.store')}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Folder Name</label>
                                                    <input class="form-control" type="text" name="name"
                                                           placeholder="Enter Folder Name" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button type="button" class="btn border-primary bg-transparent"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="editFolderUpload" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Folder</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('folder.update')}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="folder_id" id="folder_id" value=""
                                                       required>
                                                <div class="form-group">
                                                    <label for="name">Folder Name</label>
                                                    <input class="form-control" id="folderName" type="text" name="name"
                                                           placeholder="Enter Folder Name" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body px-2">
                        <div class="row">
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                @if (session()->has('danger'))
                                    <div class="alert alert-danger">
                                        {{session('danger')}}
                                    </div>
                                @endif
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{session('message')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-12 col-md-4">
                                <form action="{{route('folder.search')}}" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" id="SearchInput" class="form-control"
                                               value="{{(isset($_POST['search'])?$_POST['search']:'')}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-search p-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-responsive-sm mb-0">
                                <thead>
                                <tr style="background-color:#fcfcfc;">
                                    <!-- <th>Action</th> -->
                                    <th>Type</th>
                                    <!-- <th>Index</th> -->
                                    <!-- <th>Sign</th> -->
                                    <th>Name</th>
                                    <!-- <th>Pages</th> -->
                                    <th>Data Size</th>
                                    <th>Uploaded Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($folders as $index => $folder)
                                    <tr>
                                        <!-- <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-success light sharp"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu" x-placement="top-start"
                                                     style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-90px, -53px, 0px);">
                                                    <a class="dropdown-item"
                                                       onclick="return confirm('Are you sure! You want to delete folder and it files?')"
                                                       href="{{route('folder.remove',$folder->id)}}">
                                                        Delete
                                                    </a>
                                                    <button type="button" class="dropdown-item" data-toggle="modal"
                                                            data-target="#editFolderUpload"
                                                            onclick="editFolder('{{$folder->id}}')">Update
                                                    </button>
                                                </div>
                                            </div>
                                        </td> -->
                                        <td>
                                            @if($folder->document_number == 0)
                                                <i style="font-size: 28px;" class="fa fa-envelope-open"></i>
                                            @else
                                                <i style="font-size: 28px;" class="fa fa-envelope-open-text"></i>
                                            @endif
                                        </td>
                                        <!-- <td>{{$index+1}}</td> -->
                                        <!-- <td></td> -->
                                        <td>
                                            <a href="{{route('document.create',$folder->id)}}" style="font-size: 14px">
                                                <b>{{$folder->name}}</b>
                                            </a>
                                            <br>
                                            <small> {{$folder->document_number}} Documents</small>
                                        </td>
                                        <!-- <td></td> -->
                                        <td>{{App\Helpers\HumanReadable::bytesToHuman($folder->size)}}</td>
                                        <td>{{date('m/d/Y',strtotime($folder->uploaded_date))}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End lined tabs -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var base_url = $('meta[name="base-url"]').attr('content');
        $(function () {
            $('#documentFile').on('change', function () {
                var file = $(this).get(0).files;
                $("#imgthumbnail").html(file[0].name);
            });
        });

        function editFolder(id) {
            // alert(id);
            $.ajax({
                type: 'GET',
                url: base_url + '/folder/details/' + id,
                success: function (response) {
                    // console.log(response.name);
                    $('#folder_id').val(response.id)
                    $('#folderName').val(response.name)
                }
            });
        }

        function deleteFolder(id) {
            // alert(id);
            if (confirm("Are you sure! You want to delete folder and it files?")) {
                $.ajax({
                    type: 'GET',
                    url: base_url + '/folder/remove/' + id,
                    success: function (response) {
                        // console.log(response.name);
                    }
                });
            }
        }
    </script>
    <script>
        function autocomplete(inp) {
            // alert(inp);
            var arr;
            var formData = new FormData();
            formData.append("name", inp);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{route('folder.suggestion.search')}}",
                method: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    // console.log(data)
                    arr = data;

                    /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
                    var currentFocus;
                    /*execute a function when someone writes in the text field:*/
                    inp.addEventListener("input", function (e) {
                        var a, b, i, val = this.value;
                        /*close any already open lists of autocompleted values*/
                        closeAllLists();
                        if (!val) {
                            return false;
                        }
                        currentFocus = -1;
                        /*create a DIV element that will contain the items (values):*/
                        a = document.createElement("DIV");
                        a.setAttribute("id", this.id + "autocomplete-list");
                        a.setAttribute("class", "autocomplete-items");
                        /*append the DIV element as a child of the autocomplete container:*/
                        this.parentNode.appendChild(a);
                        /*for each item in the array...*/
                        for (i = 0; i < arr.length; i++) {
                            /*check if the item starts with the same letters as the text field value:*/
                            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                                /*create a DIV element for each matching element:*/
                                b = document.createElement("DIV");
                                /*make the matching letters bold:*/
                                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                                b.innerHTML += arr[i].substr(val.length);
                                /*insert a input field that will hold the current array item's value:*/
                                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                                /*execute a function when someone clicks on the item value (DIV element):*/
                                b.addEventListener("click", function (e) {
                                    /*insert the value for the autocomplete text field:*/
                                    inp.value = this.getElementsByTagName("input")[0].value;
                                    /*close the list of autocompleted values,
                                    (or any other open lists of autocompleted values:*/
                                    closeAllLists();
                                });
                                a.appendChild(b);
                            }
                        }
                    });
                    /*execute a function presses a key on the keyboard:*/
                    inp.addEventListener("keydown", function (e) {
                        var x = document.getElementById(this.id + "autocomplete-list");
                        if (x) x = x.getElementsByTagName("div");
                        if (e.keyCode == 40) {
                            /*If the arrow DOWN key is pressed,
                            increase the currentFocus variable:*/
                            currentFocus++;
                            /*and and make the current item more visible:*/
                            addActive(x);
                        } else if (e.keyCode == 38) { //up
                            /*If the arrow UP key is pressed,
                            decrease the currentFocus variable:*/
                            currentFocus--;
                            /*and and make the current item more visible:*/
                            addActive(x);
                        } else if (e.keyCode == 13) {
                            /*If the ENTER key is pressed, prevent the form from being submitted,*/
                            // e.preventDefault();
                            if (currentFocus > -1) {
                                /*and simulate a click on the "active" item:*/
                                if (x) x[currentFocus].click();
                            }
                        }
                    });

                    function addActive(x) {
                        /*a function to classify an item as "active":*/
                        if (!x) return false;
                        /*start by removing the "active" class on all items:*/
                        removeActive(x);
                        if (currentFocus >= x.length) currentFocus = 0;
                        if (currentFocus < 0) currentFocus = (x.length - 1);
                        /*add class "autocomplete-active":*/
                        x[currentFocus].classList.add("autocomplete-active");
                    }

                    function removeActive(x) {
                        /*a function to remove the "active" class from all autocomplete items:*/
                        for (var i = 0; i < x.length; i++) {
                            x[i].classList.remove("autocomplete-active");
                        }
                    }

                    function closeAllLists(elmnt) {
                        /*close all autocomplete lists in the document,
                        except the one passed as an argument:*/
                        var x = document.getElementsByClassName("autocomplete-items");
                        for (var i = 0; i < x.length; i++) {
                            if (elmnt != x[i] && elmnt != inp) {
                                x[i].parentNode.removeChild(x[i]);
                            }
                        }
                    }

                    /*execute a function when someone clicks in the document:*/
                    document.addEventListener("click", function (e) {
                        closeAllLists(e.target);
                    });
                }
            })
        }

        /*An array containing all the country names in the world:*/
        var countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua & Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia & Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central Arfrican Republic", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cuba", "Curacao", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauro", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre & Miquelon", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "St Kitts & Nevis", "St Lucia", "St Vincent", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad & Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks & Caicos", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];

        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
        autocomplete(document.getElementById("SearchInput"));
    </script>
@endsection