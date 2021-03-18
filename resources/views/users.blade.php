<html>
    <head>
        <title>View</title>
    </head>
    <body>
        <form action="/login" method="POST">
            {{-- csrf untuk security --}}
            @csrf  
            <table>
            <tr>
                <td>
                    <label for="">Email</label>
                    <input type="email" name="email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Password</label>
                    <input type="password" name="password">
                </td>
            </tr>
        </table>
            <br><br>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>