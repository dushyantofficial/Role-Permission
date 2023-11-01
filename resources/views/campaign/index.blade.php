<!DOCTYPE html>
<html>
<style>
    /*
        Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
        */

    body {
        counter-reset: my-sec-counter;
        font-family: 'Open Sans', sans-serif;
        font-size: 12px;
    }

    #DataTable {
        position: relative;
        padding: 15px;
        box-sizing: border-box;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #333;
        color: white;
        font-weight: bold;
        cursor: cell;
    }

    td, th {
        padding: 6px;
        border: 1px solid #ccc;
        text-align: left;
        box-sizing: border-box;
    }

    tr:nth-of-type(odd) {
        background: #eee;
    }

    @media only screen
    and (max-width: 760px), (min-device-width: 768px)
    and (max-device-width: 1024px) {

        table {
            margin-top: 106px;
        }

        /* Force table to not be like tables anymore */
        table, thead, tbody, th, td, tr {
            display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            margin: 0 0 1rem 0;
            overflow: auto;
            border-bottom: 1px solid #ccc;
        }


        tbody tr:before {
            counter-increment: my-sec-counter;
            content: "";
            background-color: #333;
            display: block;
            height: 1px;
        }


        tr:nth-child(odd) {
            background: #ccc;
        }

        td {
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee;
            margin-right: 0%;
            display: block;
            border-right: 1px solid #ccc;
            border-left: 1px solid #ccc;
            box-sizing: border-box;
        }

        td:before {
            /* Top/left values mimic padding */
            font-weight: bold;
            width: 50%;
            float: left;
            box-sizing: border-box;
            padding-left: 5px;
        }

        /*
        Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
        */
        td:nth-of-type(1):before {
            content: "Campaign Name";
        }

        td:nth-of-type(2):before {
            content: "Start Date";
        }

        td:nth-of-type(3):before {
            content: "End Date";
        }

        td:nth-of-type(4):before {
            content: "Action";
        }

        .box ul.pagination {
            position: relative !important;
            bottom: auto !important;
            right: auto !important;
            display: block !important;
            width: 100%;
        }

        .box {
            text-align: center;
            position: fixed;
            width: 100%;
            background-color: #fff;
            top: 0px;
            left: 0px;
            padding: 15px;
            box-sizing: border-box;
            border-bottom: 1px solid #ccc;
        }

        .box ul.pagination {
            display: block;
            margin: 0px;
        }

        .box .dvrecords {
            display: block;
            margin-bottom: 10px;
        }

        .pagination > li {
            display: inline-block;
        }
    }

    .top-filters {
        font-size: 0px;
    }

    .search-field {
        text-align: right;
        margin-bottom: 5px;
    }

    .dd-number-of-recoeds {
        font-size: 12px;
    }

    .search-field,
    .dd-number-of-recoeds {
        display: inline-block;
        width: 50%;
    }

    .box ul.pagination {
        position: absolute;
        bottom: -45px;
        right: 15px;
    }

    .box .dvrecords {
        padding: 5px 0;
    }

    .box .dvrecords .records {
        margin-right: 5px;
    }
</style>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Tables</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>

    <script
        src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container">
    <!--    <h2>Simple Pagination Example using Datatables Js Library</h2>-->
    <br>
    <div class="row mb-3">
        <div class="col-8" id="table_box_bootstrap"></div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end col-4">
            {{--            <a href="{{route('tab')}}">--}}
            {{--                <button class="btn btn-primary me-md-2">Add New Question</button>--}}
            {{--            </a>--}}
        </div>
    </div>
    <table class="table table-fluid" id="myTable">
        <thead>
        <tr>
            <th>Id</th>
            <th>Campaign Name</th>
            <th>Question Name</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody class="scroll-pane">
        @foreach($campaign_ideas_indexs as $campaign_ideas_index)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>Campaign ABC</td>
                <td>{{$campaign_ideas_index->question}}</td>
                <td>{{$campaign_ideas_index->type}}</td>
                <td>
                    <button class="btn btn-info">Edit</button>
                    <button class="btn btn-primary">Show</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>
