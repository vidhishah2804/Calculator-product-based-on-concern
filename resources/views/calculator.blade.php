<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <title>Calculator</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
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
        <div class="formContent">
            <h2 class="text-center mb-4">Truffle Calculator</h2>
            <div class="col-lg-8" style="margin: 0px auto;">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form id="calculationForm" action="{{ route('store-calculation') }}" method="POST">
                <!-- <form action="{{ route('store-calculation') }}" method="POST"> -->
                    @csrf
                    <div class="row">
                        <div class="leftBox col-md-6">
                            <h3 class="text-light">Ingredients</h3>
                            <div class="mt-4">
                                <select name="ingredients_one" class="form-select" aria-label="Default select example" required>
                                    <option selected disabled>select</option>
                                    @foreach($ingredientsListOne as $ingredient)
                                    <option value="{{ $ingredient->id }}" {{ old('ingredients_one') == $ingredient->id ? 'selected' : '' }}>{{ $ingredient->name }}</option>
                                    @endforeach
                                </select>
                                {{-- @error('ingredients_one')
        <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
                            <div class="mt-4">
                                <select name="ingredients_two" class="form-select" aria-label="Default select example" required>
                                    <option selected disabled>select</option>
                                    @foreach($ingredientsListTwo as $ingredient)
                                    <option value="{{ $ingredient->id }}" {{ old('ingredients_two') == $ingredient->id ? 'selected' : '' }}>{{ $ingredient->name }}</option>
                                    @endforeach
                                </select>
                                {{-- @error('product_concern')
        <span class="text-danger">{{ $message }}</span>
                                @enderror--}}
                            </div>
                        </div>
                        <div class="rightBox col-md-6">
                            <h3 class="text-light">Price (per kg)</h3>
                            <div class="mt-4">
                                <input id="price_one" name="price_one" class="form-control" type="text" placeholder="" aria-label="default input example" onkeypress="return isNumberKey(event)" value="{{ old('price_one') }}" required>
                            </div>
                            <div class="mt-4">
                                <input id="price_two" name="price_two" class="form-control" type="text" placeholder="" aria-label="default input example" onkeypress="return isNumberKey(event)" value="{{ old('price_two') }}" required>
                            </div>


                        </div>
                    </div>
                    <div class="bottomBox col-md-12 mt-4 text-center">
                        <div class="row">
                            <div class="col-md-5">
                                <h3 class="text-light">Concerns</h3>
                                <select name="product_concern" class="form-select" aria-label="Default select example" required>
                                    <option selected disabled>Select</option>
                                    @foreach($productConcerns as $concern)
                                    <option value="{{ $concern->id }}" {{ old('product_concern') == $concern->id ? 'selected' : '' }}>{{ $concern->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 py-5 text-center">
                        <button type="submit" class="submitbutn">Submit</button>
                        <button type="clear" class="submitbutn" onclick="clearForm()">Clear</button>
                    </div>

                </form>
                <div class="totalBox">

                    <h2 id="total" >Your total = Rs. {{ session('totalPrice', '0.00') }} (Adding 5% based on Wasteage)</h2>
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
    <script>
        // Calculate total when price inputs change
        const priceOneInput = document.getElementById('price_one');
        const priceTwoInput = document.getElementById('price_two');
        const totalDisplay = document.getElementById('total');

        priceOneInput.addEventListener('input', calculateTotal);
        priceTwoInput.addEventListener('input', calculateTotal);

        function calculateTotal() {
            const priceOne = parseFloat(priceOneInput.value) || 0;
            const priceTwo = parseFloat(priceTwoInput.value) || 0;
            const totalWithoutAddition = priceOne + priceTwo;
            const totalWithAddition = totalWithoutAddition * 1.05; // Add 5%
          
            totalDisplay.textContent = `Your total = Rs.${totalWithAddition.toFixed(2)} (Adding 5% based on Wasteage)`;
            
        }

        function clearForm() {
            document.getElementById('price_one').value = '';
            document.getElementById('price_two').value = '';
            document.querySelector('select[name="ingredients_one"]').selectedIndex = 0;
            document.querySelector('select[name="ingredients_two"]').selectedIndex = 0;
            document.querySelector('select[name="product_concern"]').selectedIndex = 0;

            totalDisplay.textContent = `Your total = Rs.0 (Adding 5% based on Wasteage)`;
        }

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
</body>

</html>