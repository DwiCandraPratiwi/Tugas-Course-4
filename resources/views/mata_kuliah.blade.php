<html>
    <head>
        <title>Mata Kuliah // View Data</title>
    </head>
    <body>

        

        @for ($i = 0; $i < count($data); $i++)
            {{ $data[$i]->nama }}
        @endfor

        @foreach ($data as $mata_kuliah)
            {{ $mata_kuliah->nama_mata_kuliah }}
        @endforeach

    </body>
</html>