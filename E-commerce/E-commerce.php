<!DOCTYPE html>
<html>

<head>
    <style>
        *{
            border: 1px solid cyan;
        }
        form{
            max-width:fit-content
        }
        .container {
            border-width: 10px;
            max-width: fit-content;
            display: flex;
            justify-content: space-between;
        }

        .input-field {
            flex: 1;
            margin: 10px;
        }
    </style>
</head>

<body>

    <form action="/submit" method="post">
        <div class="container">
            <div class="input-field">
                <label for="fname">First Name:</label><br>
                <input type="text" id="fname" name="fname"><br>
            </div>
            <div class="input-field">
                <label for="lname">Last Name:</label><br>
                <input type="text" id="lname" name="lname"><br>
            </div>
        </div>
        <input type="submit" value="Submit">
    </form>

</body>

</html>