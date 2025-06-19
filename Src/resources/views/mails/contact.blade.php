<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>@lang("labels.new_contact_message") :</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>{{$data["name"]}}</th>
        </tr>
        <tr>
            <th>Email</th>
            <th>{{$data["email"]}}</th>

        </tr>

        <tr>
            <th>Title</th>
            <th>{{$data["title"]}}</th>

        </tr>

        <tr>
            <th>Message</th>
            <th>{{$data["message"]}}</th>

        </tr>

    </table>

</body>

</html>