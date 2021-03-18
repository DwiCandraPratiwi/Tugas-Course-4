<html>
    <head>
        <title>View</title>
    </head>
    <body>
        <form action="/rec" method="POST">
            {{-- csrf untuk security --}}
            @csrf  
            <table>
            <tr>
                <td>
                    <label for="name">Nama</label>
                    <input type="text" name="nama">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Alamat</label>
                    <input type="text" name="alamat">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Nik</label>
                    <input type="text" name="nik">
                </td>
            </tr>
        </table>
            <br><br>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>