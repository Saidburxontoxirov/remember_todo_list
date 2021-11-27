<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
    <style>
        div {
            margin-left: 1%;
            margin-right: 1%;
            padding-left: 1%;
            padding-right: 1%;
        }

    </style>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                let value = $(this).val().toLowerCase();
                $("#myDIV *").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

</head>

<body>

    <div class="card">
        <div class="table-responsive card-body">
            <table id="myDIV" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <button class="btn btn-success t" style="float: right; margin-bottom: 2px;" type="button"><a
                                href="{{ url('store') }}"
                                class="text-uppercase text-white text-decoration-none link-dark">Add
                                todo</a></button>
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    </tr>
                    <tr class="table-success">
                        <th colspan="12" style="text-align: center; font-size: 26px;">List of Tasks</th>
                    </tr>
                    <tr>
                        <th class="col">ID</th>
                        <th class="col" data-filter-control="true" data-sort="true">Name</th>
                        <th class="col">StartTime</th>
                        <th class="col">EndTime</th>
                        <th class="col">Complete</th>
                        <th class="col">Importance</th>
                        <th class="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todos as $todo)
                        <tr>
                            <td>{{ $todo->id }}</td>
                            <td class="fst-italic sort" data-sort="name">{{ $todo->name }}</td>
                            <td>{{ $todo->start_time }}</td>
                            <td>{{ $todo->end_time }}</td>
                            <td>{{ $todo->is_complete }}</td>
                            <td>{{ $todo->level }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-outline-primary"><a
                                            href="{{ url('todos/edit/' . $todo->id) }}"
                                            class="text-uppercase text-decoration-none link-dark">Update</a></button>
                                    {{-- <button type="submit" class="btn btn-outline-secondary"><a href="#"
                                            class="text-uppercase text-decoration-none link-dark">Edit</a></button>
                                    <button type="submit" class="btn btn-outline-success"><a href="#"
                                            class="text-uppercase text-decoration-none link-dark ">Delete</a></button> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="pagination justify-content-center">
                <tbody>
                    <tr>
                        <th>
                            @if ($todos->hasPages())
                                <div class="pagination-wrapper">
                                    {{ $todos->links() }}
                                </div>
                            @endif
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
