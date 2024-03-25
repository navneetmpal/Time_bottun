<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Date and Time Picker</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                Date formats: yyyy-mm-dd, yyyymmdd, dd-mm-yyyy, dd/mm/yyyy, ddmmyyyyy
            </div>
            <br />
            <div class="row">
                <div class='col-sm-3'>
                    <div class="form-group">
                        <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" name="time" id="time" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <button type="submit">Set</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div id="applyButtonContainer" style="display: none;">
            <button id="applyButton">Apply</button>
        </div> -->

        @foreach($targetTimes as $index => $targetTime)
            <div class="applyButtonContainer" id="applyButtonContainer{{ $index }}" style="display: none;">
                <button class="applyButton"><a href="{{route('show',['id' => $index])}}">Apply</a></button>
            </div>
        @endforeach

        <script>
            $(function () {
                var bindDatePicker = function() {
                    $(".date").datetimepicker({
                    format:'YYYY-MM-DD HH:mm',
                        icons: {
                            time: "glyphicon glyphicon-time",
                            date: "glyphicon glyphicon-calendar",
                            up: "glyphicon glyphicon-chevron-up",
                            down: "glyphicon glyphicon-chevron-down"
                        }
                    }).find('input:first').on("blur",function () {
                        // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
                        // update the format if it's yyyy-mm-dd
                        var date = parseDate($(this).val());

                        if (! isValidDate(date)) {
                            //create date based on momentjs (we have that)
                            date = moment().format('YYYY-MM-DD HH:mm');
                        }

                        $(this).val(date);
                    });
                }

                var isValidDate = function(value, format) {
                    format = format || false;
                    // lets parse the date to the best of our knowledge
                    if (format) {
                        value = parseDate(value);
                    }

                    var timestamp = Date.parse(value);

                    return isNaN(timestamp) == false;
                }

                var parseDate = function(value) {
                    var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
                    if (m)
                        value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

                    return value;
                }

                bindDatePicker();
            });

            // $(document).ready(function() {
            //     var targetTime = new Date("#");
            //     var currentTime = new Date();

            //     if (currentTime >= targetTime) {
            //         $('#applyButtonContainer').show();
            //     }
            // });

            $(document).ready(function() {
                var currentTimes = new Date();
                @foreach($targetTimes as $index => $targetTime)
                    var targetTime{{ $index }} = new Date("{{ $targetTime }}");
                    if (currentTimes >= targetTime{{ $index }}) {
                        $('#applyButtonContainer{{ $index }}').show();
                    }
                @endforeach
            });
        </script>
    </body>
</html>
