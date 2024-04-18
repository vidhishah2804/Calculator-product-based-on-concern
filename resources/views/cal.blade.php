<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <title>Calculater</title>
</head>

<body>

    <section class="sectionCalculater">
        <div class="logo d-flex justify-content-between align-items-center px-4">
            <img src="{{ asset('assets/images/Richs_Logo.png') }}" alt="logo">
            <a href="{{ route('logout') }}" class="text-white">Logout</a>
        </div>
        <div class="formContent">
            <h2>Truffle Calculator</h2>
            <div class="formInputBox">
                <form action="{{ route('store-calculation') }}" method="GET">
                    <div class="row">
                        <div class="leftBox col-md-6">
                            <h3>Ingredients</h3>
                            <div class="mt-4">
                                <select name ="ingredients_one" class="form-select" aria-label="Default select example">
                                    <option selected disabled>select</option>
                                    <option value="Amul">Amul</option>
                                    <option value="Whipped Topping">Whipped Topping</option>
                                    <option value="Dairy Cream">Dairy Cream</option>
                                    <option value="Milk">Milk</option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <select name ="ingredients_two" class="form-select" aria-label="Default select example">
                                    <option selected disabled>select</option>
                                    <option value="Morde CO D15">Morde CO D15</option>
                                    <option value="Morde CO D16">Morde CO D16</option>
                                    <option value="2 M">2 M</option>
                                    <option value="Goodrich">Goodrich</option>
                                    <option value="Van Houten">Van Houten</option>
                                    <option value="Barry Callebaut">Barry Callebaut</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="rightBox col-md-6">
                            <h3>Price (per kg)</h3>
                            <div class="mt-4">
                                <input name="price" class="form-control" type="text" placeholder=""
                                    aria-label="default input example">
                            </div>
                            <div class="mt-4">
                                <input class="form-control" type="text" placeholder=""
                                    aria-label="default input example">
                            </div>
                        </div>

                        <div class="bottomBox col-md-12 mt-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3>Concerns</h3>
                                </div>

                                <div class="col-md-6">
                                    <select name ="product_concern" class="form-select"
                                        aria-label="Default select example">
                                        <option selected disabled>select</option>
                                        <option value="Dairy is getting burnt">Dairy is getting burnt</option>
                                        <option value="Don't want to depend on labour">Don't want to depend on labour
                                        </option>
                                        <option value="Chocolate cost is increasing">Chocolate cost is increasing
                                        </option>
                                        <option value="Truffle takes a lot of time">Truffle takes a lot of time</option>
                                        <option value="Need more variety">Need more variety</option>
                                        <option value="Want high quality truffle">Want high quality truffle</option>
                                        {{-- <option value="Others">Others</option> --}}
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

                <div class="totleBox">
                    <h2>Your total = Rs.300 (1Kg Truffle)</h2>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
