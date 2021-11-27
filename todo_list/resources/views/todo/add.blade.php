<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Todo Add </title>
    <style>
        div {
            margin: 1%;
            padding: 1%;
        }

        .card {
            margin: 0 auto;
            /* Added */
            float: none;
            /* Added */
            margin-bottom: 10px;
            /* Added */
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <form action="{{ route('add_todo') }}" method="post">
                @csrf
                <div class="card mx-auto border-primary" style="max-width: 70rem;">
                    <div class="card-header text-center  text-white bg-secondary mb-3">
                        Task Add Screen
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Task Description</label>
                            <textarea class="form-control" name="name" value=""
                                placeholder="Necessitatibus aperiam earum laborum aliquid voluptatem veniam. Accusantium quis impedit eveniet dolorem sed voluptates quia temporibus. Quibusdam et ut dignissimos tempore tenetur."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Start Time</label>
                            <input type="date" class="form-control" name="start_time" value=""
                                placeholder="2021-11-19 08:00:00">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">End Time</label>
                            <input type="date" class="form-control" name="end_time" value=""
                                placeholder="2021-11-19 08:00:00">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">End Time</label>
                            <input type="time" class="form-control" name="time" value="" placeholder="08:00 PM">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">End Time</label>
                            <input type="time" class="form-control" name="time1" value="" placeholder="08:00 AM">
                        </div>
                        <div>
                            <select class="form-select" aria-label="Default select example" name="level">
                                <option value="1" selected>One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                                <option value="5">Five</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" role="group"
                            aria-label="Basic mixed styles example">
                            <button type="submit" class="btn btn-danger "><a href="{{ route('add_todo') }}"></a>
                                Add</button>
                            <button type="submit" class="btn btn-success">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
