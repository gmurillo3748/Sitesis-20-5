<html>

    <head>
        <style>

            header {
                position: fixed;
                top: 0mm;
                left: 0mm;
                right: 0mm;
                height: 55mm;
                /*                background-color: #00f;   */
            }

            footer {
                position: fixed;
                left: 0mm;
                bottom: -10mm;
                right: 0mm;
                height: 40mm;
                margin-top: 10mm;
                /*                background-color: #f00;   */
            }

            .page:after {
                content: counter(page);
            }

            body {
                left: 0mm;
                right: 0mm;
            }

            #cuerpo {
                position: relative;
                top: 70mm;
                height: 170mm;
                width: 186mm;
                left: 0mm;
                margin-bottom: 20mm;
                /*
                                border-left: 2px solid black;
                                border-right: 2px solid black;
                                border-bottom: 2px solid black;
                                background-color: #0f0;
                */
            }
            
            table, th, td{
                border:1px solid black;
                padding:10px;
            }
            
            table{
                border-collapse: collapse;
                width:100%
            }
            
            img{
                width:25%;
            }
            
            

        </style>
    </head>

    <body>

        <header>
            <img src="{{ url('/images/logo_2.png') }}" alt="logo INS Camí de Mar">
            
            <div style="position:absolute; top:0mm; left:110mm;">
                <h1>Ins Camí de Mar</h1>
            </div>

        </header>

        <div id="cuerpo">
            <div>
                <h2>Comptes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Compte</th>
                            <th>FUC</th>
                            <th>Clau</th>
                        </tr>
                    </thead>
                    <tbody style="font-size:12;">
                        @foreach ($comptes as $compte)
                        <tr>
                            <td>{{$compte->id}}</td>
                            <td>{{$compte->compte}}</td>
                            <td>{{$compte->fuc}}</td>
                            <td>{{$compte->clau}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <footer>


            <div style="position:relative; top:15mm; font-size:14px; text-align:center;">
                <p>Ins Camí de Mar - Calafell</p>
            </div>

        </footer> 

    </body>

</html>


