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
    <title>Todo update</title>
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
            <form action="{{ url('update_todo/' . $todo->id) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <div class="card mx-auto border-primary" style="max-width: 70rem;">
                    <div class="card-header text-center  text-white bg-secondary mb-3">
                        Task Update Screen
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Task Description</label>
                            <textarea class="form-control" name="name">{{ $todo->name }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Start Time</label>
                            <input type="datetime" class="form-control" name="start_time"
                                value="{{ $todo->start_time }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">End Time</label>
                            <input type="datetime" class="form-control" name="end_time"
                                value="{{ $todo->end_time }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Task completed</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_complete" value="1"
                                    {{ $todo->is_complete == true ? 'checked' : '' }}>
                                <label class=" form-check-label" for="flexSwitchCheckChecked">YES</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_complete" value="0"
                                    {{ $todo->is_complete == false ? 'checked' : '' }}>
                                <label class=" form-check-label" for="flexSwitchCheckChecked">NO</label>
                            </div>
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
                            <button type="submit" class="btn btn-danger "><a
                                    href="{{ url('update_todo/' . $todo->id) }}"></a>
                                Update</button>
                            <button type="submit" class="btn btn-success">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
