<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

     table , tr , td{
        border-collapse: collapse;
     }
     img{display:block;}

     p{
       color:#000;  
     }

     .brumadinho2{
         display:none;
     }

    
     @media screen and (max-width: 500px){
    
        .primeira{
            display:none;
        }

        .container{
            height:auto !important;
            background-image:none !important;
        }

        h2{
            font-size: 20pt !important;
        }

        a{ text-decoration:none;}

        .brumadinho1{
            display:none;
        }

        .brumadinho2{
            display:table;
        }
     }
</style>
</head>

<body>
    <!-- [if mso]
 <table style=" text-align: center; vertical-align:middle" width="100%">
     <tr>
         <td style=" text-align: center; vertical-align:middle" >
    <![endif]-->
<table style="
    width:550px;
    max-width:800px;
    margin:auto;
    background-color:rgb(8,100,116);
">
    <tr>
        <td style="width:100%; vertical-align:middle; height:150px;" colspan="2">
        <h2  class="titulo" style="
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        color: white;
        font-size: 30pt;
        width:100% ;
        margin:0;
        text-align:center;
        ">
        Olá {{$cliente->nome}}! </h2>
        </td>
    </tr>
    <tr class="container" style="
                background-size: contain;
                background-repeat: no-repeat;
                height: 250px; ">
        <td  class="primeira"style="width:50%;" width="50%"><img src="http://auditabil.j2desenvolvimento.com.br/imagens/fundo-email-depo.png" width='100%' height='300'></td>
        <td  class="segunda"style="width: 40%;" width="50%">
           <table width="100%">
                <tr>
                    <td style="
                        background-color: white;
                        padding: 20px;
                        text-align: center;
                        vertical-align:middle;
                    ">
                        <img src="http://auditabil.j2desenvolvimento.com.br/imagens/logo.png" style="width:50px; margin:auto"/>
                        <h3 style="
                                text-align: justify;
                                font-size: 15pt ;
                                display: block;
                                color:#000000;
                        "
                        >Nós da Auditabil gostaríamos de saber sua opinião sobre nossa empresa e publica-la em nosso site.</h3>
                        <a href="http://localhost:4200/depoimentos/{{$cliente->id}}" target="_blank"
                        style="
                            border: solid 3px rgb(8,100,116);
                            padding: 10px;
                            color:rgb(8,100,116);
                            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                            font-weight: bold;
                            text-decoration: none;
                            display:block;
                        ">Dar minha Opinião</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr >
        <td  class="sarzedo" 
        style="
            background-color:#000000;
            font-family: Arial;
            text-align:center;
            vertical-align:middle;
            padding:3%;
        " colspan="2">
            <h3 style="color:#FFFFFF !important; font-size:10pt;">Sarzedo</h3>
            <span style="color:#ffffff !important; font-size:8pt;">Endereço:</br> Rodovia, MG-040, 336 Sala 02 - Central Parque - Sarzedo - MG</span>
            <span style="color:#ffffff !important; font-size:8pt;"></br>Telefones:</br> (31)3522-9361</br> (31)98476-1359</br> (31)97148-9635</span>
        </td>
    </tr>
    <tr>
        <td  
        style="
            background-color:#000000;
            font-family: Arial;
            text-align:center;
            vertical-align:middle;
            padding:3%;
        " colspan="2">
            <h3 style="color:#fff !important; font-size:10pt;">Brumadinho</h3>
            <span style="color:#fff !important; font-size:8pt;">Endereço:</br>Rua Aristides Passos, 290 - Centro - Brumadinho - MG</span>

            <span style="color:#fff !important; font-size:8pt;"></br>Telefones:</br> (31)3571-2405</br> (31)4117-6380</span>
        </td>
    </tr>
    <tr>
    <td colspan="2" class="desenvolvimneto "
    style="background-color: #999;
            color:#ffffff !important;
            font-family:Arial;
            font-size:8pt;
            text-align: center;
            vertical-align:middle;
            height: 30px;
            padding:3%;">
            <span style="color:#ffffff !important; font-size:8pt;">Este email foi enviado por Auditabil contabilidade para {{$cliente->email}} se você não é o destinatário por favor exclua-o </span>
            <span style="color:#ffffff ! important" >AdiminSite - Desenvolvido por <a href="http://www.j2desenvolvimento.com.br">J2 Desenvolvimento Web e Mobile</a></span>
        </td>
    </tr>
</table>
 <!-- [if mso]>
            </td>
        </tr>
    </table>
   <![endif] -->
</body>
</html>