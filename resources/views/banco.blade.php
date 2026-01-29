<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bàn Cờ Vua</title>
    <style>
        
        .board {
            width: 400px;
            height: 400px;
            border: 5px solid #333;
            margin: 50px auto;
            display: grid;
            grid-template-columns: repeat({{ $n }}, 1fr);
            grid-template-rows: repeat({{ $n }}, 1fr);
        }
        
       
        .square {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

       
        .white { background-color: #f0d9b5; }
        .black { background-color: #b58863; color: white; }
    </style>
</head>
<body>

    <h2 style="text-align: center">Bàn Cờ Vua {{$n}} x {{$n}}</h2>

    <div class="board">
       
        @for ($row = 0; $row < $n; $row++)
            
            
            @for ($col = 0; $col < $n; $col++)
                
               
                @php
                    $isWhite = ($row + $col) % 2 == 0;
                    $colorClass = $isWhite ? 'white' : 'black';
                @endphp

                <div class="square {{ $colorClass }}">
                 
                </div>

            @endfor

        @endfor
    </div>

</body>
</html>