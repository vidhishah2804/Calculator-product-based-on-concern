<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <title>Output</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .outContent h2 {
            text-align: center;
            color: #fff;
            font-size: 45px;
            font-weight: bold;
        }

        .sectionCalculater {
            padding: 50px 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 800px;
        }



        .formContent {
            margin-top: 30px;
        }

        .formInputBox {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .formInputBox h2,
        .formInputBox h3 {
            color: #343a40;
        }

        .bgrec {
            background-repeat: no-repeat;
            background-image: linear-gradient(90deg, rgb(244 130 31 / 86%) 0%, rgb(194 15 37 / 74%) 100%), url(assets/images/Visual_Identity.png);
            background-size: contain;
            background-position: right;
        }

        .form-control {
            font-size: 1rem;
            border-radius: 15px;
            padding: 20px 10px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .formContent h2 {
            color: #fff;
            font-size: 37px;
            padding-bottom: 50px;
            text-transform: capitalize;
            font-weight: bold;
            text-align: center;
        }

        .form-select {
            display: block;
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 17px 10px;
            font-size: 20px;
            color: #000000;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 15px;
        }
    </style>
</head>

<body class="bgrec">

    <section class="container py-5">
        <div class="logo d-flex justify-content-between align-items-center px-4">
            <img src="{{ asset('assets/images/Richs_Logo.png') }}" alt="logo">
            <a href="{{ route('logout') }}" class="text-white">Logout</a>
        </div>
        <div class="outContent">
            <h2 class="text-center mb-4">Output</h2>
            <div class="outputBox">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="totleBox">
                            <h2>Your Current Cost = <b>Rs.{{ $total_price }}</b></h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="richBox">
                            <h2>Rich’s Cost = <b>Rs.{{ $product_concern_rate }}</b></h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-center justify-content-between py-5">
                    <div class="col-md-3">
                        <div class="richBox">
                            <h3>Rich’s<br> Truffle <br>Suggestion</h3>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        @if($selectedConcern->isNotEmpty())
                        @foreach($selectedConcern as $concern)
                        @if($concern->product_image)
                        <img src="{{ asset($concern->product_image) }}" alt="{{ $concern->name }}">
                        @else
                        <p>No image available</p>
                        @endif
                        @endforeach
                        @else
                        <p>No concerns available</p>
                        @endif

                    </div>
                    <div class="col-md-3">
                        <ul>
                            @foreach($products as $product)
                            <li>{{ $product->products }} - Rs.{{ $product->rate }}</li>
                            @endforeach
                        </ul>


                        <ul>
                            @foreach($features as $feature)
                            <li>{{ $feature->feature_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="richBox">

                    <h2>Rich’s Product = <b>{{ $product->products }}</b></h2>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>