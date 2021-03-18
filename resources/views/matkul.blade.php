<html>
    <head>
        <title>View</title>
    </head>
    <body>
        <form action="/matakuliah" method="POST">
            {{-- csrf untuk security --}}
            @csrf  
            <table>
            <tr>
                <td>
                    <label for="name">Nama Mata Kuliah</label>
                    <input type="text" name="nama_mata_kuliah">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">SKS</label>
                    <input type="text" name="sks">
                </td>
            </tr>
        </table>
            <br><br>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>