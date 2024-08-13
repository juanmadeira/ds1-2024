<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="img/cd.ico">
        <link rel="stylesheet" type="text/css" media="all" href="css/app.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <title>CDRealm</title>
    </head>
    <body>
        <header>
            <h1><a href="/">CDRealm</a></h1>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="insert">Insert</a></li>
                </ul>
            </nav>
        </header>
            <main>
            @if (session()->has('success'))
                <p class="successAlert">{{ session('success'); }}</p>
            @endif
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th class="toolCell">Tools</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($cdList as $my_data)
                    <tr>
                        <td>{{ $my_data['id']}}</td>
                        <td>{{ $my_data['name'] }}</td>
                        <td>{{ $my_data['desc'] }}</td>
                        <td>R${{ number_format($my_data['price'], 2, ",") }}</td>
                        <td class="toolCell">
                            <form method="post" action="{{ url('remove')}}">
                                @csrf
                                <input type="hidden" name="id_for_removing" value="{{ $my_data['id']}}">
                                <button type="submit" class="tool"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </main>
    </body>
</html>
