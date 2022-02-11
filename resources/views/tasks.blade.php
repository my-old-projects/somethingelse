<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Task Planning</title>
</head>

<body>
    <div class="container mt-2 mb-2">
        <div class="row mt-4 mb-3">
            <div class="col-12">
                <span class="text-danger">Average weeks to complete all jobs: {{$plans['average_week_for_all_jobs']}}</span>
            </div>
        </div>
        @foreach(array_keys($plans['tasks']) as $week)
        <div class="row">
            <div class="col-12">
                <h3>{{$week}}</h3>
            </div>
            <div class="col-12">
                <div class="row mb-2">
                    @foreach($plans['tasks'][$week] as $key => $developerTasks)
                    @foreach($developerTasks as $task)
                    <div class="col-3">
                        <strong class="me-2">{{$key}}:</strong>
                        <span>{{$task}}</span>
                    </div>
                    @endforeach
                    <hr />
                    @endforeach

                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>